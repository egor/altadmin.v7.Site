<?php
/* @var $this NewsController */
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
    <p><a href="#" onclick="myModalAdd(); return false;" rel="tooltip" title="добавить" class="btn btn-primary b-add"><i class="icon-plus"></i> добавить галерею</a></p>
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
                        <input type="checkbox" name="<?php echo $value->id; ?>" id="chtr-<?php echo $value->id; ?>" class="chtr"><span class="lbl"></span>
                    </div>
                </td>
                <td><a href="/altadmin/gallery/default/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><?php echo $value->menuName; ?></a></td>
                <td><?php echo ($value->visibility == 1 ? '<a rel="tooltip" title="Да"><i class="icon-ok-sign"></i></a>' : '<a rel="tooltip" title="Нет"><i class="icon-minus-sign"></i></a>'); ?></td>                
                <td>
                    <nobr>
                        <a href="/altadmin/gallery/default/edit/<?php echo $value->id; ?>" title="Редактировать" rel="tooltip"><i class="icon-pencil"></i></a>&nbsp;
                        <a href="#" onclick="myModalDeleteTrRecord(<?php echo $value->id; ?>, '<?php echo $value->menuName; ?>');return false;" title="Удалить" rel="tooltip"><i class="icon-remove"></i></a>                                               
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
    echo '<p>Список пуст</p>';
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
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteTrRecord', 'data'=>array('url'=>'/altadmin/news/default/delete', 'body'=>'<p>Вы уверены что хотите удалить галерею <b>"<span id="recordName"></span>"</b>?</p>', 'td' => 6)));
$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteMassRecord', 'data'=>array('url'=>'/altadmin/news/default/deleteMass', 'body'=>'<p>Вы уверены что хотите удалить выбранные записи?</p>', 'reload' => '/altadmin/gallery')));
?>
<script>
    function myModalAdd() {
        $('#myModalAdd').modal('show');
    }
    
    function addGallery() {
        $.ajax({
            type: "POST",
            url: '/altadmin/gallery/default/add',
            data: $("#addGalleryForm").serialize(),
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.error == 0) {
                    document.location.href = '/altadmin/gallery/default/edit/' + obj.id;
                } else {
                    //$('#<?php echo $data['prefix']; ?>myModalDeleteImageError').modal('show');                    
                }
            },
            error: function() {
                //$('#<?php echo $data['prefix']; ?>myModalDeleteImageError').modal('show');
                //$('#<?php echo $data['prefix']; ?>myModalDeleteImageErrorText').html('Неизвестная ошибка :(');
            }
        });
        //$('#<?php echo $data['prefix']; ?>myModalDeleteImage').hide();
        return false;
    }
    
</script>    
<div id="myModalAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-norm-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-plus icon-animated-hand-pointer blue"></i>&nbsp;&nbsp;&nbsp;Добавление галерии</h3>
    </div>
    <div class="modal-body">
        <?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'addGalleryForm',
    'focus' => array($addForm, 'menuName'),
    'htmlOptions' => array(
        'class' => 'details contact-form',
        'enctype' => 'multipart/form-data'
    ),
    'clientOptions' => array(
        'validateOnSubmit' => false,
        'validateOnChange' => true,
        'validateOnType' => false,
        'errorCssClass' => 'parent-error',
    ),
        //'errorMessageCssClass' => 'error-txt',
        ));
?>
<div class="control-group">    
    <div class="controls">
        <div class="row-fluid">
            <div class="span7">
                <label>
                    <?php echo $form->checkBox($addForm, 'visibility', array('checked' => 'checked', 'class' => 'ace-switch')); ?>
                    <span class="lbl"><?php echo $form->label($addForm, 'visibility', array('style' => 'float:left; margin-left:10px;')); ?></span>
                </label>
            </div>        
        </div>
    </div>
</div>   

<div class="control-group">
    <?php echo $form->labelEx($addForm, 'menuName'); ?>
    <?php echo $form->textField($addForm, 'menuName', array('class' => 'span12')); ?>
    <?php echo $form->error($addForm, 'menuName'); ?>
</div>
        <?php
$this->endWidget();
?>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Нет, это была случайность</button>
        <button class="btn btn-primary" id="test" onclick="addGallery();
        return false;" data-dismiss="modal" aria-hidden="true" >Да, добавить</button>
    </div>
</div>

<!-- Сообщение о том что изображение успешно удалено -->
<div id="<?php echo $data['prefix']; ?>myModalDeleteImageSuccess" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-success-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-ok icon-animated-hand-pointer green"></i> Успех!</h3>
    </div>
    <div class="modal-body">
        <p>Изображение успешно удалено!</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Продолжить</button>    
    </div>
</div>

<!-- Сообщение об ошибке -->
<div id="<?php echo $data['prefix']; ?>myModalDeleteImageError" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-error-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-bolt icon-animated-hand-pointer red"></i> Ошибка!</h3>
    </div>
    <div class="modal-body" id="<?php echo $data['prefix']; ?>myModalDeleteImageErrorText">

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>    
    </div>
</div>