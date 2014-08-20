<div class="row">
            <div class="box">
<?php
$this->breadcrumbs = array(
    $page->menuName => '/' . Yii::app()->params['altadmin']['modules']['news']['baseUrl'],
    $model->menuName
);
?>
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php echo $this->pageHeader; ?>
                        <?php
    $this->widget('application.widgets.AdminBtn', array(
        'method' => 'moduleRecordDetail',
        'data' => array(
            'moduleName' => 'news',
            'id' => $model->id,
            'edit' => '/altadmin/news/default/edit/' . $model->id,
            'delete' => '/altadmin/news/default/delete'
        )
            )
    );
    ?>
                    </h2>
                    <hr>
                </div>

<small><?php echo date('d.m.Y', $model->date); ?></small>, <small><?php echo $model->newsSection->name; ?></small>
<?php
echo $model->text;
?>
</div>
</div>
<?php
if (Yii::app()->params['altadmin']['modules']['news']['work'] && Yii::app()->params['altadmin']['modules']['news']['gallery']) {
    ?>

    <div id="galleryList">    
        <?php
        $this->widget('application.widgets.SGallery', array('method' => 'printGallery', 'data' => array('type' => 'news', 'recordId' => $model->id)));
        ?>
    </div>
    <?php
}
if (FrontEditFields::getSettings('CommentSettings', 'workNews') && Yii::app()->params['altadmin']['modules']['comment']['work'] && Yii::app()->params['altadmin']['modules']['news']['comment']) {
    ?>
    <div id="commentList">    
        <?php
        $this->widget('application.widgets.SComment', array('method' => 'printComment', 'data' => array('type' => 'news', 'recordId' => $model->id)));
        ?>
    </div>
    <?php
    $this->widget('application.widgets.SComment', array('method' => 'printForm', 'data' => array('pid' => 0, 'type' => 'news', 'recordId' => $model->id)));
}
?>
          