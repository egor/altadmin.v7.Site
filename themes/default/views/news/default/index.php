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
            <h4 class="media-heading"><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a>
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
            </h4>
            <span class="label label-primary"><?php echo date('d.m.Y', $value->date); ?></span> <span class="label label-default"><?php echo $value->newsSection->name; ?></span>
            <?php echo $value->shortText; ?>
        </div>
    </div>
    <?php
}
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