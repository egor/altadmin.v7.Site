<div class="row">
    <div class="box">
        <div class="col-lg-12 text-center">
            <h1 class="brand-name"><?php echo $this->pageHeader; ?></h1>
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
            <hr class="tagline-divider">
        </div>               

        <?php
        echo $page->text;
        echo '<div class="col-lg-12 text-center">';
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
        echo '</div>';
        echo '<br clear="all" />';
        foreach ($model as $value) {
            $url = '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/' . $value->url;
            $img = '';
            if ($value->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/blog/list/' . $value->image)) {
                $img = '<img src="/images/blog/list/' . $value->image . '" class="img-responsive img-border img-full" >';
            }

            $tags = '';
            if ($value->tagsRelations) {
                foreach ($value->tagsRelations as $tag) {
                    $tags .= '<a href="/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/tags/' . $tag->tags->id . '">' . $tag->tags->name . '</a>, ';
                }
            }
            ?>
            <div class="col-lg-12 text-center">
                <a href="<?php echo $url; ?>"><?php echo $img; ?></a>
                <h2><?php echo $value->menuName; ?>
                    <br>
                    <small>
                        <?php echo date('M d, Y', $value->date); ?> - <?php echo $value->blogSection->name; ?><?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleRecordList', 'data' => array('moduleName' => 'blog', 'id' => $value->id, 'moduleCssId' => 'blogRecord-', 'edit' => '/altadmin/blog/default/edit/' . $value->id, 'delete' => '/altadmin/blog/default/delete'))); ?></small>
                </h2>
                <?php if (!empty($tags)) { ?>
                    <small><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<?php echo substr($tags, 0, -2); ?></small>
                <?php } ?>
                <?php echo $value->shortText; ?>

                <a href="<?php echo $url; ?>" class="btn btn-default btn-lg">Подробнее</a>
                <hr>
            </div>            

            <?php
        }
        echo '<br clear="all" /><div class="col-lg-12 text-center">';
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
        echo '</div>';
        ?>
    </div>
</div>


