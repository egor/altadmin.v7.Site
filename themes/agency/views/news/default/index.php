<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <div class="row-fluid">
                <div class="span12">
                    <h1><?php echo $this->pageHeader; ?>
                        <?php
                        $this->widget('application.widgets.AdminBtn', array('method' => 'moduleMain',
                            'data' => array(
                                'moduleName' => 'news',
                                'add' => '/altadmin/news/default/add',
                                'edit' => '/altadmin/page/edit/' . Yii::app()->params['altadmin']['systemPageId']['news'],
                                'list' => '/altadmin/news/default',
                                'settings' => '/altadmin/news/settings'
                            )
                                )
                        );
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->breadcrumbs = array(
    $page->menuName,
);
echo $page->text;
?>
<div class="work">
    <div class="row">
        <div class="span12">
            <div id="portfolio" class="row">
                <?php
                foreach ($model as $value) {
                    $col = 0;
                    $url = '/' . Yii::app()->params['altadmin']['modules']['news']['baseUrl'] . '/' . $value->url;
                    $img = '<img data-src="holder.js/100x100" class="media-object">';
                    if ($value->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/news/list/' . $value->image)) {
                        $img = '<img src="/images/news/list/' . $value->image . '" class="media-object">';
                    }
                    ?>


                    <div class="span4  work-item graphics" id="newsRecord-<?php echo $value->id; ?>">
                        <h2><a href="<?php echo $url; ?>"><?php echo StringOperations::cutString($value->menuName, 20, '...'); ?></a>
                            <?php
                            $this->widget('application.widgets.AdminBtn', array(
                                'method' => 'moduleRecordList',
                                'data' => array(
                                    'moduleName' => 'news',
                                    'id' => $value->id,
                                    'moduleCssId' => 'newsRecord-',
                                    'edit' => '/altadmin/news/default/edit/' . $value->id,
                                    'delete' => '/altadmin/news/default/delete'
                                )
                                    )
                            );
                            ?>
                        </h2>
                        <?php echo StringOperations::cutString($value->shortText, 180, '...'); ?>
                        <div class="sample work-item-image-container">
                            <small><?php echo date('d.m.Y', $value->date); ?></small>, <small><?php echo $value->newsSection->name; ?></small><br />                            
                            <?php if (!empty($tags)) { ?>
                                <small><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo substr($tags, 0, -2); ?></small>
                            <?php } ?>
                        </div>
                    </div> 
                    <?php
                    $col++;
                }
                ?>
            </div>
        </div>
    </div>
</div>
<hr class="soften">
<div class="pagination">
    <?php
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
    ?>
</div>