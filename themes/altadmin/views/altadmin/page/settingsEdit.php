<?php
/* @var $this NewsWidgetSettingsController */
$this->breadcrumbs = array(
    'Страницы' => '#',
    'Настройки' => '#',
    'Общие' => '/altadmin/page/settings',
    $this->breadcrumbsTitle
);
$form = $this->beginWidget('CActiveForm', array(
    'focus' => array($model, 'email'),
    'htmlOptions' => array(
        'class' => 'details contact-form',
    ),
    'clientOptions' => array(
        'validateOnSubmit' => false,
        'validateOnChange' => true,
        'validateOnType' => false,
        'errorCssClass' => 'parent-error',
    ),
        //'errorMessageCssClass' => 'error-txt',
        ));
if ($model->type == 'area') {
    
} else if ($model->type == 'checkbox') {
?>
<div class="control-group">    
    <div class="controls">
        <div class="row-fluid">
            <div class="span3">
                <label>
                    <?php
                    if (!isset($edit) || $edit != 1) {
                        echo $form->checkBox($model, 'value', array('checked' => 'checked', 'class' => 'ace-switch'));
                    } else {
                        echo $form->checkBox($model, 'value', array('class' => 'ace-switch'));
                    }
                    ?>
                    <span class="lbl"><?php echo $form->label($model, 'value', array('style' => 'float:left; margin-left:10px;')); ?></span>
                </label>
            </div>        
        </div>
    </div>
</div>
<?php
    //echo $form->checkboxRow($model, 'value', array('class' => ''));

} else if ($model->type == 'textarea') {
?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'value'); ?>
    <?php echo $form->textArea($model, 'value', array('class' => 'span12', 'rows' => 7)); ?>
    <?php echo $form->error($model, 'value'); ?>
</div>
<?php    
} else {
?>
<div class="control-group">
    <?php echo $form->labelEx($model, 'value'); ?>
    <?php echo $form->textField($model, 'value', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'value'); ?>
</div>
<?php
}
?>
<div class="form-actions" style="text-align: right;">
    <button type="submit" name="yt0" class="btn btn-info">
        <i class="icon-ok bigger-110"></i>
        Сохранить
    </button>
    &nbsp; &nbsp; &nbsp;
    <button type="submit" class="btn btn-primary" name="yt1">
        <i class="icon-arrow-right icon-on-right bigger-110"></i>
        Сохранить и выйти
    </button>
    &nbsp; &nbsp; &nbsp;
    <button type="reset" class="btn">
        <i class="icon-undo bigger-110"></i>
        Отмена
    </button>
</div>
<?php
$this->endWidget();