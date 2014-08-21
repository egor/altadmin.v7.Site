<div class="page-title">
    <div class="container">
        <div class="row">
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
    ?></h1>
            </div>
        </div>
    </div>
</div>

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
?>

<!-- About Us Text -->
        <div class="about-us container">
            <div class="row">
                <div class="about-us-text span12">
                    
                            <?php
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
            ?>
            <div id="blogRecord-<?php echo $value->id; ?>">
                <h4><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleRecordList', 'data' => array('moduleName' => 'blog', 'id' => $value->id, 'moduleCssId' => 'blogRecord-', 'edit' => '/altadmin/blog/default/edit/' . $value->id, 'delete' => '/altadmin/blog/default/delete'))); ?></h4>
                <p><small><?php echo date('d.m.Y', $value->date); ?></small>
                <?php if (!empty($tags)) { ?>
                    &nbsp;&nbsp;<small> | &nbsp;&nbsp;<?php echo substr($tags, 0, -2); ?></small>
                <?php } ?></p>
                <div class="clear"></div>
                <p><a href="<?php echo $url; ?>"><?php echo $img; ?></a></p>
                <?php echo $value->shortText; ?>
            <br clear="all" />
            </div> 
            <?php
        }
        ?>
                </div>
            </div>
        </div>
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
