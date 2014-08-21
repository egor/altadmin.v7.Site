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
<div class="inner-1">
    <ul class="list-blog">
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
            <li id="blogRecord-<?php echo $value->id; ?>">
                <h3><?php echo $value->menuName; ?><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleRecordList', 'data' => array('moduleName' => 'blog', 'id' => $value->id, 'moduleCssId' => 'blogRecord-', 'edit' => '/altadmin/blog/default/edit/' . $value->id, 'delete' => '/altadmin/blog/default/delete'))); ?></h3>
                <time datetime="<?php echo date('Y-m-d', $value->date); ?>" class="date-1"><?php echo date('d.m.Y', $value->date); ?></time>                                
                <?php if (!empty($tags)) { ?>
                    &nbsp;&nbsp;<small><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo substr($tags, 0, -2); ?></small>
                <?php } ?>
                <div class="clear"></div>
                <a href="<?php echo $url; ?>"><?php echo $img; ?></a>
                <?php echo $value->shortText; ?>

                <a href="<?php echo $url; ?>" class="btn btn-1">Подробнее...</a>          
            </li> 
            <?php
        }
        ?>
    </ul>
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
