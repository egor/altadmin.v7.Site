<script>
    function saveComment() {
            data = $("#uComment").serialize();
            $.ajax({
            type: "POST",
            url: '/comment/default/saveComment',
            data: data,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.error == 0) {
                    $('#<?php echo $this->data['moduleCssId'] ?>'+id).hide(500);
                } else {
                    alert('Ошибка!');
                }
            },
            error: function() {
                alert('Ошибка!');
            }
        });            
    }
</script>
<?php

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'uComment',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array('class' => 'contact-form', 'role' => 'form'),
        ));
?>
<?php echo $form->hiddenField($model, 'pid', array('value' => $this->data['pid'])); ?>
<?php echo $form->hiddenField($model, 'type', array('value' => $this->data['type'])); ?>
<?php echo $form->hiddenField($model, 'recordId', array('value' => $this->data['recordId'])); ?>
<?php echo $form->labelEx($model, 'userName'); ?>
<?php echo $form->textField($model, 'userName', array('class' => 'form-control', 'placeholder' => 'Введите Ваше имя')); ?>
<?php echo $form->error($model, 'userName'); ?>
<?php echo $form->labelEx($model, 'userEmail'); ?>
<?php echo $form->textField($model, 'userEmail', array('class' => 'form-control', 'placeholder' => 'Введите Вашe э-почту')); ?>
<?php echo $form->error($model, 'userEmail'); ?>
<?php echo $form->labelEx($model, 'text'); ?>
<?php echo $form->textArea($model, 'text', array('rows' => 3, 'cols' => 40, 'class' => 'form-control', 'placeholder' => 'Введите комментарий')); ?>
<?php echo $form->error($model, 'text'); ?>
<?php echo CHtml::submitButton('Отправить', array('class'=>'btn btn-success alt-right', 'onclick'=>'saveComment(); return false;')); ?>
<?php

$this->endWidget();
