<?php
/* @var $this BfwwStorageController */

$this->breadcrumbs = array(
    'Виджеты' => '#',
    'Кнопка ФОС' => '#',
    'Сообщения' => '#',
    $this->breadcrumbsTitle
);
if ($model) {
?>
<table class="table table-striped table-bordered table-hover">
    <tr><td>Дата: </td><td><?php echo date('d.m.Y H:i:s', $model->date);?></td></tr>
    <tr><td>Имя: </td><td><?php echo $model->name;?></td></tr>    
    <tr><td>Э-почта: </td><td><?php echo $model->email;?></td></tr>
    <tr><td>Телефон: </td><td><?php echo $model->phone;?></td></tr>
    <tr><td colspan="2">Текст сообщения: <br /><br /><?php echo $model->text;?></td></tr>
    <tr><td colspan="2">Дополнительная информация: <br /><br /><?php echo $model->addInfo;?></td></tr>
</table>
<?php } else { ?>
<p>нет такой записи.</p>
<?php } ?>
<div class="form-actions" style="text-align: right;">
    <a href="/altadmin/widget/feedback" class="btn btn-info">
        <i class="icon-ok bigger-110"></i>
        Назад к списку сообщений
    </a>
</div>