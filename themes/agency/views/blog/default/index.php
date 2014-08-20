<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <div class="row-fluid">
                <div class="span12">
                    <h1><?php echo $this->pageHeader; ?>
                        <?php
                        $this->widget('application.widgets.AdminBtn', array('method' => 'moduleMain',
                            'data' => array(
                                'moduleName' => 'blog',
                                'add' => '/altadmin/blog/default/add',
                                'edit' => '/altadmin/page/edit/' . Yii::app()->params['altadmin']['systemPageId']['blog'],
                                'list' => '/altadmin/blog/default',
                                'settings' => '/altadmin/blog/settings'
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
echo $page->text;
?>
<div class="work">
    <div class="row">
        <div class="span12">
            <div id="portfolio" class="row">
                <?php
                $col = 0;
                foreach ($model as $value) {
                    $url = '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/' . $value->url;
                    $img = '';
                    if ($value->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/blog/list/' . $value->image)) {
                        $img = '<img src="/images/blog/list/' . $value->image . '" class="media-object">';
                    }
                    $tags = '';
                    if ($value->tagsRelations) {
                        foreach ($value->tagsRelations as $tag) {
                            $tags .= '<a href="/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/tags/' . $tag->tags->id . '">' . $tag->tags->name . '</a>, ';
                        }
                    }
                    if ($col % 3 == 0) {
                        echo '<div class="span12">&nbsp;</div>';
                    }
                    ?>
                    <div class="span4  work-item graphics" id="blogRecord-<?php echo $value->id; ?>">
                        <h2><a href="<?php echo $url; ?>"><?php echo StringOperations::cutString($value->menuName, 20, '...'); ?></a><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleRecordList', 'data' => array('moduleName' => 'blog', 'id' => $value->id, 'moduleCssId' => 'blogRecord-', 'edit' => '/altadmin/blog/default/edit/' . $value->id, 'delete' => '/altadmin/blog/default/delete'))); ?></h2>
                        <?php echo StringOperations::cutString($value->shortText, 180, '...'); ?>
                        <div class="sample work-item-image-container">
                            <small><?php echo date('d.m.Y', $value->date); ?></small>, <small><?php echo $value->blogSection->name; ?></small><br />

                            <a href="<?php echo $url; ?>"><?php echo $img; ?></a>
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
    ?>
</div>