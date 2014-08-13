<?php
$this->breadcrumbs = array(
    $this->breadcrumbsTitle
);
if ($model) {
?>
<div class="pagination pagination-centered">
<?php
if ($paginator) {
    $this->widget('CLinkPager', array(
        'pages' => $paginator,
        'id' => '',
        'header' => '',
        'selectedPageCssClass' => 'active',
        'hiddenPageCssClass' => 'disabled',
        'nextPageLabel' => '<span>&raquo;</span>',
        'prevPageLabel' => '<span>&laquo;</span>',
        'lastPageLabel' => '<span>&raquo;&raquo;</span>',
        'firstPageLabel' => '<span>&laquo;&laquo;</span>',
        'htmlOptions' => array('class' => 'paginator'),
    ));
}
?>
</div>

    <div class="widget-box ">
        <div class="widget-header">
            <h4 class="lighter smaller">
                <i class="icon-comment blue"></i>
                Последние действия
            </h4>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <div class="dialogs">
                    <?php
                    foreach ($model as $value) {
                        ?>
                        <div class="itemdiv dialogdiv">
                            <div class="user">
                                <?php
                                if ($value->user->image != '') {
                                    $userImage = '/images/user/list/' . $value->user->image;
                                } else {
                                    $userImage = '/images/user/default.jpg';
                                }
                                ?>
                                <img src="<?php echo $userImage; ?>" />
                            </div>

                            <div class="body">
                                <div class="time">
                                    <i class="icon-time"></i>
                                    <span class="<?php echo ($value->date > (time() - 86400) ? 'green' : ($value->date > (time() - 259200) ? 'orange' : 'red') ); ?>"><?php echo date('d.m.Y H:i:s', $value->date); ?></span>
                                </div>

                                <div class="name">                                    
                                    <a href="/altadmin/user/default/edit/<?php echo $value->user->id; ?>"><?php echo $value->user->name . ' ' . $value->user->surname; ?></a>
                                    <span class="label label-info arrowed arrowed-in-right"><?php echo $value->module; ?></span>
                                    <?php
                                    if (strpos($value->type, 'add') !== false) {
                                        ?>
                                        <span class="label label-success arrowed arrowed-in-right">добавление</span>
                                        <?php
                                    } else if (strpos($value->type, 'edit') !== false) {
                                        ?>
                                        <span class="label label-info arrowed arrowed-in-right">редактирование</span>
                                        <?php
                                    } else if (strpos($value->type, 'delete') !== false) {
                                        ?>
                                        <span class="label label-important arrowed arrowed-in-right">удаление</span>
                                        <?php
                                    } else if (strpos($value->type, 'list') !== false) {
                                        ?>
                                        <span class="label label-success arrowed arrowed-in-right">список</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="label arrowed arrowed-in-right">другое</span>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($value->status == 1) {
                                        ?>
                                        <span class="label label-success arrowed arrowed-in-right">успех</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="label label-important arrowed arrowed-in-right">ошибка</span>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <div class="text">
                                    <?php echo $value->header; ?><br />
                                    <i><small><?php echo $value->info; ?></small></i>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div><!--/widget-main-->
        </div><!--/widget-body-->
    </div><!--/widget-box-->

<!--
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ace/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
                        $(function() {
                            $('.dialogs,.comments').slimScroll({
                                height: '300px'
                            });
                        });
</script>
-->
<div class="pagination pagination-centered">
<?php
if ($paginator) {
    $this->widget('CLinkPager', array(
        'pages' => $paginator,
        'id' => '',
        'header' => '',
        'selectedPageCssClass' => 'active',
        'hiddenPageCssClass' => 'disabled',
        'nextPageLabel' => '<span>&raquo;</span>',
        'prevPageLabel' => '<span>&laquo;</span>',
        'lastPageLabel' => '<span>&raquo;&raquo;</span>',
        'firstPageLabel' => '<span>&laquo;&laquo;</span>',
        'htmlOptions' => array('class' => 'paginator'),
    ));
}
?>
</div>
<?php
} else {
    ?>
<p>Нет логов.</p>
<?php
}
