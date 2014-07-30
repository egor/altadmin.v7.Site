<script type="text/javascript" src="/js/admin/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/admin/includeEditor.js"></script>
<?php
$this->breadcrumbs = array(
    'Страницы' => '/altadmin/page/index',
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
                    echo $form->checkBox($model, 'visibility', array('class' => 'ace-switch'));
                    ?>
                    <span class="lbl"><?php echo $form->label($model, 'visibility', array('style' => 'float:left; margin-left:10px;')); ?></span>
                </label>
            </div>        
        </div>
    </div>
</div>
<?php if ($model->level == 3) { ?>
    <div class="control-group">    
        <div class="controls">
            <div class="row-fluid">
                <div class="span3">
                    <label>
                        <?php
                        echo $form->checkBox($model, 'inMenu', array('class' => 'ace-switch'));
                        ?>
                        <span class="lbl"><?php echo $form->label($model, 'inMenu', array('style' => 'float:left; margin-left:10px;')); ?></span>
                    </label>
                </div>        
            </div>
        </div>
    </div>
<?php } ?>
<?php if (Yii::app()->params['altadmin']['modules']['page']['comment'] == 1 && Yii::app()->params['altadmin']['modules']['comment']['work']) { ?>
    <div class="control-group">    
        <div class="controls">
            <div class="row-fluid">
                <div class="span4">
                    <label>
                        <?php
                        echo $form->checkBox($model, 'comment', array('class' => 'ace-switch'));
                        ?>
                        <span class="lbl"><?php echo $form->label($model, 'comment', array('style' => 'float:left; margin-left:10px;')); ?></span>
                    </label>
                </div>        
            </div>
        </div>
    </div>
<?php } ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'menuName'); ?>
    <?php echo $form->textField($model, 'menuName', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'menuName'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'header'); ?>
    <?php echo $form->textField($model, 'header', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'header'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'url'); ?>
    <?php
    if (array_search($model->id, Yii::app()->params['altadmin']['systemPageId'])) {
        echo $form->textField($model, 'url', array('class' => 'span12', 'disabled' => 'disabled'));
    } else {
        echo $form->textField($model, 'url', array('class' => 'span12'));
    }
    ?>
    <?php echo $form->error($model, 'url'); ?>
    <small>Если оставить поле пустым, то url будет сгенерирован автоматически путем транслитерации из поля "Краткий заголовок"</small><br /><br />
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'metaTitle'); ?>
    <?php echo $form->textField($model, 'metaTitle', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'metaTitle'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'metaKeywords'); ?>
    <?php echo $form->textField($model, 'metaKeywords', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'metaKeywords'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'metaDescription'); ?>
    <?php echo $form->textField($model, 'metaDescription', array('class' => 'span12', 'rows' => 3)); ?>
    <?php echo $form->error($model, 'metaDescription'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'shortText'); ?>
    <?php echo $form->textArea($model, 'shortText', array('class' => 'span12', 'rows' => 7, 'id' => 'editor-desc')); ?>
    <?php echo $form->error($model, 'shortText'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'text'); ?>
    <?php echo $form->textArea($model, 'text', array('class' => 'span12', 'rows' => 7, 'id' => 'editor-text')); ?>
    <?php echo $form->error($model, 'text'); ?>
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