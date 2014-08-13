<?php
/* @var $this /protected/modules/altadmin/modules/user/controllers/DefaultController */
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
<p><a href="/altadmin/user/default/add" rel="tooltip" title="добавить" class="btn btn-primary b-add"><i class="icon-plus"></i> добавить пользователя</a></p>
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
            <td><i class="icon-user"></i> Имя</td>
            <td><i class="icon-envelope-alt"></i> Э-почта</td>
            <td><i class="icon-calendar"></i> Дата</td>
            <td><i class="icon-coffee"></i> Роль</td>
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
                        <input type="checkbox" name="<?php echo $value->id; ?>" id="chtr-<?php echo $value->id; ?>" class="chtr"><span class="lbl"></span>
                    </div>
                </td>
                <td><a href="/altadmin/user/default/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><?php echo $value->name.' '.$value->surname; ?></a></td>
                <td><?php echo $value->email; ?></td>
                <td><?php echo date('d.m.Y H:i:s', $value->date); ?></td>
                <td><?php echo $value->role; ?></td>                
                <td>
                    <nobr>
                        <a href="/altadmin/user/default/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><i class="icon-pencil"></i></a>&nbsp;
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
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteTrRecord', 'data'=>array('url'=>'/altadmin/user/default/delete', 'body'=>'<p>Вы уверены что хотите удалить пользователя <b>"<span id="recordName"></span>"</b>?</p>', 'td' => 6)));
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteMassRecord', 'data'=>array('url'=>'/altadmin/user/default/deleteMass', 'body'=>'<p>Вы уверены что хотите удалить выбранные записи?</p>', 'reload' => '/altadmin/user')));