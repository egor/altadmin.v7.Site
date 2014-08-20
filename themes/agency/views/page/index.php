<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <div class="row-fluid">
                <div class="span12">
                    <h1><?php echo $this->pageHeader; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
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
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading"><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a></h4>
            <?php echo $value->shortText; ?>
        </div>
    </div>
<?php
}