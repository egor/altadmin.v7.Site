<?php
/* @var $this SectionController */
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
<p><a href="/altadmin/blog/section/add" rel="tooltip" title="добавить" class="btn btn-primary b-add"><i class="icon-plus"></i> добавить раздел</a></p>
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
            <td><i class="icon-font"></i> Название</td>
            <td><i class="icon-indent-right"></i> Записи</td>
            <td><a rel="tooltip" title="Выводить"><i class="icon-eye-open"></i></a></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($model as $value) {
            ?>
            <tr id="tr-<?php echo $value->id; ?>">
                <td>
                    <div class="controls">
                        <input type="checkbox" name="<?php echo $value->id; ?>" <?php echo ($value->id == 1 ? ' disabled="disabled" ' : ' class="chtr" '); ?> id="chtr-<?php echo $value->id; ?>"><span class="lbl"></span>
                    </div>
                </td>
                <td><a href="/altadmin/blog/section/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><?php echo $value->name; ?></a></td>
                <td><?php echo $value->blogCount; ?></td>
                <td><?php echo ($value->visibility == 1 ? '<a rel="tooltip" title="Да"><i class="icon-ok-sign"></i></a>' : '<a rel="tooltip" title="Нет"><i class="icon-minus-sign"></i></a>'); ?></td>                
                <td>
                    <nobr>
                        <a href="/altadmin/blog/section/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><i class="icon-pencil"></i></a>&nbsp;                                                
                        <a href="#" onclick="myModalDeleteTrRecord(<?php echo $value->id; ?>, '<?php echo $value->name; ?>');return false;" title="Удалить" rel="tooltip"><i class="icon-remove"></i></a>                                               
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
    echo '<p>Нет разделов</p>';
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
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteTrRecord', 'data'=>array('url'=>'/altadmin/blog/section/delete', 'body'=>'<p>Вы уверены что хотите удалить раздел <b>"<span id="recordName"></span>"</b>?</p><p>Все записи блога этого раздела будут удалены навсегда.</p>', 'td' => 5)));
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteMassRecord', 'data'=>array('url'=>'/altadmin/blog/section/deleteMass', 'body'=>'<p>Вы уверены что хотите удалить выбранные разделы?</p><p>Все записи блога этих разделов будут удалены навсегда.</p>', 'reload' => '/altadmin/blog/section')));