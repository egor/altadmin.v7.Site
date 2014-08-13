<?php
/* @var $this SectionController */
$this->breadcrumbs = array(
    'Блог' => '/altadmin/blog',
    'Разделы' => '/altadmin/blog/section',
    $this->breadcrumbsTitle
);
?>
<small>Поля отмеченные <span class="required">*</span> обязательны  для заполнения</small><br /><br />
<?php
$form = $this->beginWidget('CActiveForm', array(
    'focus' => array($model, 'email'),
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
            <div class="span3">
                <label>
                    <?php
                    if (!isset($edit) || $edit != 1) {
                        echo $form->checkBox($model, 'visibility', array('checked' => 'checked', 'class' => 'ace-switch'));
                    } else {
                        echo $form->checkBox($model, 'visibility', array('class' => 'ace-switch'));
                    }
                    ?>
                    <span class="lbl"><?php echo $form->label($model, 'visibility', array('style' => 'float:left; margin-left:10px;')); ?></span>
                </label>
            </div>        
        </div>
    </div>
</div>   
<div class="control-group">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'name'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'url'); ?>
    
    <?php if ($model->id == 1) { 
        echo $form->textField($model, 'url', array('class' => 'span12', 'disabled' => 'disabled'));
    } else {
        echo $form->textField($model, 'url', array('class' => 'span12'));
    }
    ?>
    <?php echo $form->error($model, 'url'); ?>
    <small>Если оставить поле пустым, то url будет сгенерирован автоматически путем транслитерации из поля "Краткий заголовок"</small><br /><br />
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'position'); ?>
    <?php echo $form->textField($model, 'position', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'position'); ?>
</div>
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