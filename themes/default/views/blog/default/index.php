<?php
/* = array(
    $this->breadcrumbsTitle,
);*/
?>
<h1><?php echo $this->pageHeader; ?><?php $this->widget('application.widgets.AdminBtn', array('method' => 'blogRecord')); ?></h1>
<?php
echo $page->text;
$this->widget('CLinkPager', array(
    'pages' => $paginator,
    'id' => '',
    'header' => '',
    'htmlOptions' => array('class' => 'pagination'),
    'maxButtonCount' => '8',
    'selectedPageCssClass' => 'active',
    'prevPageLabel' => '&lsaquo;',
    'nextPageLabel' => '&rsaquo;',
    'firstPageLabel' => '&laquo;',
    'lastPageLabel' => '&raquo;',
));
echo '<br clear="all" />';
foreach ($model as $value) {
    $url = '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/' . $value->url;
    $img = '';
    if ($value->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/blog/list/' . $value->image)) {
        $img = '<img src="/images/blog/list/' . $value->image . '" class="media-object">';
    }

    $tags = '';
    if ($value->tagsRelations) {
        foreach ($value->tagsRelations as $tag) {
            $tags .= '<a href="/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/tags/' . $tag->tags->id  . '">'.$tag->tags->name . '</a>, ';
        }
    }
    ?>
    <div class="media col-md-6" id="blogRecord-<?php echo $value->id; ?>">
        <div class="media-body">
            <h4 class="media-heading"><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a><?php $this->widget('application.widgets.AdminBtn', array('method' => 'blogRecordList', 'data' => array('id' => $value->id))); ?></h4>
            <a href="<?php echo $url; ?>" class="pull-left"><?php echo $img; ?></a>
            <span class="label label-primary"><?php echo date('d.m.Y', $value->date); ?></span> <span class="label label-default"><?php echo $value->blogSection->name; ?></span><br />
            <?php if (!empty($tags)) { ?>
            <small><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo substr($tags, 0, -2); ?></small>
            <?php } ?>
            <?php echo $value->shortText; ?>
        </div>
    </div>
    <?php
}
echo '<br clear="all" />';
$this->widget('CLinkPager', array(
    'pages' => $paginator,
    'id' => '',
    'header' => '',
    'htmlOptions' => array('class' => 'pagination'),
    'maxButtonCount' => $maxButtonCount,
    'selectedPageCssClass' => 'active',
    'prevPageLabel' => '&lsaquo;',
    'nextPageLabel' => '&rsaquo;',
    'firstPageLabel' => '&laquo;',
    'lastPageLabel' => '&raquo;',
));
