<?php
$this->breadcrumbs = array(
    $this->breadcrumbsTitle
);
?>
<script>
    $(document).ready(function () {
        
        $('#chtr-all').on('change', function() {
            $('input.chtr').prop('checked', this.checked);
        });
    
        $('.chtr').on('change', function() {
            if ($(this).prop("checked")) {
            } else {
                $('#chtr-all').prop("checked", false);
            }
            
        });
    
    });
    </script>
<?php
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
<form id="formTable">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td class="td-checkbox">
                <div class="controls">
                    <input type="checkbox" name="chtr-all" class="chtr-all" id="chtr-all"><span class="lbl"></span>
                </div>
            </td>
            <td><i class="icon-calendar"></i> Дата</td>
            <td><i class="icon-font"></i> Пользователь</td>
            <td><i class="icon-indent-right"></i> Запись</td>
            <td><a rel="tooltip" title="Выводить"><i class="icon-eye-open"></i></a></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($model as $value) {
            $userName = ($value->userName ? $value->userName : $value->user->name . ' ' . $value->user->surname);
            $sectionName = '';
            if ($value->blog) {
                $sectionName = $value->blog->menuName;
            }
            $linkToPage = '';
            if ($value->blog) {
                $linkToPage = '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/' . $value->blog->url . '#comment-' . $value->id;
            }
            ?>
            <tr id="tr-<?php echo $value->id; ?>"class="<?php echo ($value->new == 1 ? 'success' : ''); ?>">
                <td>
                    <div class="controls">
                        <input type="checkbox" name="<?php echo $value->id; ?>" id="chtr-<?php echo $value->id; ?>" class="chtr"><span class="lbl"></span>
                    </div>
                </td>
                <td><a href="/altadmin/comment/default/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><?php echo date('d.m.Y H:i:s', $value->date); ?></a></td>
                <td><?php echo $userName; ?></td>
                <td><?php echo $sectionName; ?></td>
                <td><?php echo ($value->visibility == 1 ? '<a rel="tooltip" title="Да"><i class="icon-ok-sign"></i></a>' : '<a rel="tooltip" title="Нет"><i class="icon-minus-sign"></i></a>'); ?></td>                
                <td>
                    <nobr>
                        <a href="<?php echo $linkToPage; ?>" target="_blank"><i class="icon-eye-open"></i></a>&nbsp;
                        <a href="/altadmin/comment/default/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><i class="icon-pencil"></i></a>&nbsp;
                        <a href="#" onclick="myModalDeleteTrRecord(<?php echo $value->id; ?>, '<?php echo date('d.m.Y H:i:s', $value->date); ?>');return false;" title="Удалить" rel="tooltip"><i class="icon-remove"></i></a>
                    </nobr>
                </td>
            </tr>   
            <?php
        }
        ?>
            </tbody>
</table>
</form>
<button class="btn btn-danger btn-mini" onclick="myModalDeleteMassRecord(); return false;"><i class="icon-trash"></i> Удалить выбранные</button>
<?php
} else {
    echo '<p>Нет новостей</p>';
}
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
<?php
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteTrRecord', 'data'=>array('url'=>'/altadmin/comment/default/delete', 'body'=>'<p>Вы уверены что хотите удалить комментарий за <b>"<span id="recordName"></span>"</b>?</p>', 'td' => 6)));
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteMassRecord', 'data'=>array('url'=>'/altadmin/comment/default/deleteMass', 'body'=>'<p>Вы уверены что хотите удалить выбранные записи?</p>', 'reload' => '/altadmin/comment')));