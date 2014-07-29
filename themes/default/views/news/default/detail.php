<?php
$this->breadcrumbs = array(
    $page->menuName => '/' . Yii::app()->params['altadmin']['modules']['news']['baseUrl'],
    $model->menuName
);
?>
<h1><?php echo $this->pageHeader; ?>
<?php 
$this->widget('application.widgets.AdminBtn', 
        array(
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
</h1>
<span class="label label-primary"><?php echo date('d.m.Y', $model->date); ?></span> <span class="label label-default"><?php echo $model->newsSection->name; ?></span>
<?php
echo $model->text;
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