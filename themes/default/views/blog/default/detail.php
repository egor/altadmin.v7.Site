<?php
$this->breadcrumbs = array(
    $page->menuName => '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'],
    $this->breadcrumbsTitle
);
?>
<h1><?php echo $this->pageHeader; ?><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleRecordDetail', 'data' => array('moduleName' => 'blog', 'id' => $model->id, 'edit' => '/altadmin/blog/default/edit/' . $model->id, 'delete' => '/altadmin/blog/default/delete'))); ?></h1>
<span class="label label-primary"><?php echo date('d.m.Y', $model->date); ?></span> <span class="label label-default"><?php echo $model->blogSection->name; ?></span><br /><br />
<?php
$tags = '';
if ($model->tagsRelations) {
    foreach ($model->tagsRelations as $value) {
        $tags .= '<a href="/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/tags/' . $value->tags->id . '">' . $value->tags->name . '</a>, ';
    }
}
echo $model->text;

if (Yii::app()->params['altadmin']['modules']['gallery']['work'] && Yii::app()->params['altadmin']['modules']['blog']['gallery']) {
    ?>
    <div id="galleryList">    
    <?php    
    $this->widget('application.widgets.SGallery', array('method' => 'printGallery', 'data' => array('type' => 'blog', 'recordId' => $model->id)));
    ?>
    </div>
    <?php    
}

if (!empty($tags)) {
    ?>
    <br /><small><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo substr($tags, 0, -2); ?></small>
<?php 
}
if (FrontEditFields::getSettings('CommentSettings', 'workBlog') && Yii::app()->params['altadmin']['modules']['comment']['work'] && Yii::app()->params['altadmin']['modules']['blog']['comment']) {
    ?>
    <div id="commentList">    
    <?php    
    $this->widget('application.widgets.SComment', array('method' => 'printComment', 'data' => array('type' => 'blog', 'recordId' => $model->id)));
    ?>
    </div>
    <?php    
    $this->widget('application.widgets.SComment', array('method' => 'printForm', 'data' => array('pid' => 0, 'type' => 'blog', 'recordId' => $model->id)));
}