<?php
/* @var $this BfwwStorageController */

$this->breadcrumbs = array(
    'Виджеты' => '#',
    'Кнопка ФОС' => '#',
    $this->breadcrumbsTitle,
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
if ($model) {
    ?>
    <form id="formTable">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <td class="td-checkbox">
                <div class="controls">
                    <input type="checkbox" name="chtr-all" class="chtr-all" id="chtr-all"><span class="lbl"></span>
                </div>
            </td>
            <td><a rel="tooltip" title="Дата"><i class="icon-calendar"></i> Дата</a></td>
            <td><a rel="tooltip" title="Имя"><i class="icon-font"></i> Имя</a></td>
            <td><a rel="tooltip" title="Просмотренное"><i class="icon-eye-open"></i></a></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($model as $value) {
            ?>
            <tr id="tr-<?php echo $value->id; ?>" class="<?php echo ($value->new == 1 ? 'success' : ''); ?>">
                <td>
                    <div class="controls">
                        <input type="checkbox" name="<?php echo $value->id; ?>" class="chtr" id="chtr-<?php echo $value->id; ?>"><span class="lbl"></span>
                    </div>
                </td>
                <td><a href="/altadmin/widget/feedback/detail/<?php echo $value->id; ?>" title="Просмотреть" rel="tooltip"><?php echo date('d.m.Y H:i:s', $value->date); ?></a></td>
                <td><?php echo $value->name; ?></td>
                <td><?php echo ($value->new == 1 ? '<a rel="tooltip" title="Нет"><i class="icon-minus-sign"></i></a>' : '<a rel="tooltip" title="Да"><i class="icon-ok-sign"></i></a>'); ?></td>                
                <td>
            <nobr>
                <a href="/altadmin/widget/feedback/detail/<?php echo $value->id; ?>" title="Просмотреть" rel="tooltip"><i class="icon-eye-open"></i></a>&nbsp;
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
    echo '<p>Нет сообщений</p>';
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
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteTrRecord', 'data'=>array('url'=>'/altadmin/widget/feedback/toTrash', 'body'=>'<p>Вы уверены что хотите удалить сообщение <b>"<span id="recordName"></span>"</b>?</p>', 'td' => 5)));
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteMassRecord', 'data'=>array('url'=>'/altadmin/widget/feedback/toTrashMass', 'body'=>'<p>Вы уверены что хотите удалить выбранные сообщения?</p>', 'reload' => '/altadmin/widget/feedback')));