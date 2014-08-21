<h1><?php echo $this->pageHeader; ?>
    <?php
    $this->widget('application.widgets.AdminBtn', array(
        'method' => 'modulePageDetail',
        'data' => array(
            'moduleName' => 'page',
            'id' => $model->id,
            'edit' => '/altadmin/page/edit/' . $model->id,
            'delete' => '/altadmin/page/remove',
            'afterDelete' => $pageUrl,
        )
            )
    );
    ?>
</h1>
<?php
echo $model->text;
if (Yii::app()->params['altadmin']['modules']['gallery']['work'] && Yii::app()->params['altadmin']['modules']['page']['gallery']) {
    ?>
    <div id="galleryList">    
        <?php
        $this->widget('application.widgets.SGallery', array('method' => 'printGallery', 'data' => array('type' => 'page', 'recordId' => $model->id)));
        ?>
    </div>
    <?php
}
if (Yii::app()->params['altadmin']['modules']['comment']['work'] && Yii::app()->params['altadmin']['modules']['page']['comment'] && $model->comment == 1) {
    ?>
    <div id="commentList">    
        <?php
        $this->widget('application.widgets.SComment', array('method' => 'printComment', 'data' => array('type' => 'page', 'recordId' => $model->id)));
        ?>
    </div>
    <?php
    $this->widget('application.widgets.SComment', array('method' => 'printForm', 'data' => array('pid' => 0, 'type' => 'page', 'recordId' => $model->id)));
}
foreach ($children as $value) {
    $url = $pageUrl . '/' . $value->url;
    ?>
    <div class="media" id="pageRecord-<?php echo $value->id; ?>">
        <div class="media-body">
            <h4 class="media-heading"><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a>
                <?php
                $this->widget('application.widgets.AdminBtn', array(
                    'method' => 'modulePageList',
                    'data' => array(
                        'moduleName' => 'page',
                        'id' => $value->id,
                        'edit' => '/altadmin/page/edit/' . $value->id,
                        'delete' => '/altadmin/page/remove',
                        'moduleCssId' => 'pageRecord-',
                    )
                        )
                );
                ?>
            </h4>
            <?php echo $value->shortText; ?>
        </div>
    </div>
    <?php
}