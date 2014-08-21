<?php
$this->breadcrumbs = array(
    $page->menuName,
);
?>
<h1><?php echo $this->pageHeader; ?>
<?php $this->widget('application.widgets.AdminBtn', 
            array('method' => 'moduleMain', 
                'data' => array(
                    'moduleName' => 'news', 
                    'add' => '/altadmin/news/default/add', 
                    'edit' => '/altadmin/page/edit/' . Yii::app()->params['altadmin']['systemPageId']['news'],
                    'list' => '/altadmin/news/default',
                    'settings' => '/altadmin/news/settings'
            )
                )
            ); ?>
</h1>
<?php
echo $page->text;
$this->widget('CLinkPager', array(
    'pages' => $paginator,
    'id'=>'',
    'header'=>'',
    'htmlOptions' => array('class' => 'pagination'),
    'maxButtonCount'=>'8',
    'selectedPageCssClass' => 'active',
    'prevPageLabel' => '&lsaquo;',
    'nextPageLabel' => '&rsaquo;',
    'firstPageLabel' => '&laquo;',
    'lastPageLabel' => '&raquo;',
));
?>
<div class="inner-1">
<?php
foreach ($model as $value) {
    $url = '/' . Yii::app()->params['altadmin']['modules']['news']['baseUrl'] . '/' . $value->url;
    $img = '<img data-src="holder.js/100x100" class="media-object">';
    if ($value->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/news/list/' . $value->image)) {
        $img = '<img src="/images/news/list/' . $value->image . '" class="media-object">';
    }
    ?>
    <div class="media" id="newsRecord-<?php echo $value->id; ?>">
        <a href="<?php echo $url; ?>" class="pull-left"><?php echo $img; ?></a>
        <div class="media-body">
            <h3><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a>
                <?php $this->widget('application.widgets.AdminBtn', 
                        array(
                            'method' => 'moduleRecordList', 
                            'data' => array(
                                'moduleName' => 'news', 
                                'id' => $value->id, 
                                'moduleCssId' => 'newsRecord-', 
                                'edit' => '/altadmin/news/default/edit/' . $value->id, 
                                'delete' => '/altadmin/news/default/delete'
                                )
                            )
                        ); ?>
            </h3>
            <small><?php echo date('d.m.Y', $value->date); ?></small> | <small><?php echo $value->newsSection->name; ?></small>
            <?php echo $value->shortText; ?>
        </div>
    </div>
    <?php
}
?>
</div>
    <?php
$this->widget('CLinkPager', array(
    'pages' => $paginator,
    'id'=>'',
    'header'=>'',
    'htmlOptions' => array('class' => 'pagination'),
    'maxButtonCount' => $maxButtonCount,
    'selectedPageCssClass' => 'active',
    'prevPageLabel' => '&lsaquo;',
    'nextPageLabel' => '&rsaquo;',
    'firstPageLabel' => '&laquo;',
    'lastPageLabel' => '&raquo;',
));