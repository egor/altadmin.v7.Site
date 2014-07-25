<?php
$this->breadcrumbs = array(
    $page->menuName => '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'],
    $this->breadcrumbsTitle
);
?>
<h1><?php echo $this->pageHeader; ?></h1>
<span class="label label-primary"><?php echo date('d.m.Y', $model->date); ?></span> <span class="label label-default"><?php echo $model->blogSection->name; ?></span><br /><br />
<?php
$tags = '';
if ($model->tagsRelations) {
    foreach ($model->tagsRelations as $value) {
        $tags .= '<a href="/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/tags/' . $value->tags->id . '">' . $value->tags->name . '</a>, ';
    }
}
echo $model->text;
if (!empty($tags)) {
    ?>
    <br /><small><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo substr($tags, 0, -2); ?></small>
<?php 
}