<?php
/* @var $this NewsController */
?>
<script type="text/javascript" src="/js/admin/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/admin/includeEditor.js"></script>
<script type="text/javascript" src="/js/admin/news/edit.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/datepicker.css" />
<?php
$this->breadcrumbs = array(
    'Новости' => '/altadmin/news',
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
<div class="control-group"
<?php echo $form->labelEx($model, 'portfolioSectionId'); ?>
<?php
echo $form->dropDownList($model, 'portfolioSectionId', CHtml::listData(ALTPortfolioSection::model()->findAll(array('order' => 'position')), 'id', 'menuName'), array('class' => 'span12', 'disabled'=>(!Yii::app()->params['altadmin']['modules']['portfolio']['section'] ? 'disabled' : '')));
?>
     <?php echo $form->error($model, 'portfolioSectionId'); ?>
</div>
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
    <?php echo $form->textField($model, 'url', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'url'); ?>
    <small>Если оставить поле пустым, то url будет сгенерирован автоматически путем транслитерации из поля "Краткий заголовок"</small><br /><br />
</div>

<div class="row-fluid input-append">
    <?php echo $form->labelEx($model, 'date'); ?>
    <?php
    if (isset($edit)) {
        echo $form->textField($model, 'date', array('class' => 'span10 date-picker', 'data-date-format' => 'dd.mm.yyyy', 'id' => 'id-date-picker-1'));
    } else {
        echo $form->textField($model, 'date', array('class' => 'span10 date-picker', 'value' => date('d.m.Y'), 'data-date-format' => 'dd.mm.yyyy', 'id' => 'id-date-picker-1'));
    }
    echo '<span class="add-on"><i class="icon-calendar"></i></span>';
    ?>
    <?php echo $form->error($model, 'date'); ?>
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
    <?php echo $form->textArea($model, 'shortText', array('class' => 'span12', 'rows' => 10, 'id' => 'editor-desc')); ?>
    <?php echo $form->error($model, 'shortText'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'text'); ?>
    <?php echo $form->textArea($model, 'text', array('class' => 'span12', 'rows' => 20, 'id' => 'editor-text')); ?>
    <?php echo $form->error($model, 'text'); ?>
</div>

<h4>Изображение</h4>
<?php
if (isset($edit) && $edit == 1) {
    ?>

    <table class="image-form-table">
        <tr>
            <td class="span9">
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'image'); ?>
                    <?php echo $form->fileField($model, 'image', array('class' => 'span12')); ?>
                    <?php echo $form->error($model, 'image'); ?>
                    <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['height']; ?> px</small>
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'imageAlt'); ?>
                    <?php echo $form->textField($model, 'imageAlt', array('class' => 'span12', 'id' => 'image-alt')); ?>
                    <?php echo $form->error($model, 'imageAlt'); ?>
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'imageTitle'); ?>
                    <?php echo $form->textField($model, 'imageTitle', array('class' => 'span12', 'id' => 'image-title')); ?>
                    <?php echo $form->error($model, 'imageTitle'); ?>
                </div>
            </td>
            <td class="span3">
                <?php
                if (!empty($model->image)) {
                    echo '<div id="image-preview"><img src="/images/portfolio/list/' . $model->image . '" width="150px" /><br /><a href="#" onclick="myModalDeleteImage(); return false;" rel="tooltip" title="удалить картинку" class="i-remove"><i class="icon-remove"></i></a></div>';
                } else {
                    echo '<div id="image-preview"><div class="image-preview-empty">нет фото</div></div>';
                }
                ?>
            </td>
        </tr>
    </table>

<table class="image-form-table">
        <tr>
            <td class="span9">
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'imageDetail'); ?>
                    <?php echo $form->fileField($model, 'imageDetail', array('class' => 'span12')); ?>
                    <?php echo $form->error($model, 'imageDetail'); ?>
                    <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['height']; ?> px</small>
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'imageDetailAlt'); ?>
                    <?php echo $form->textField($model, 'imageDetailAlt', array('class' => 'span12', 'id' => 'image-alt')); ?>
                    <?php echo $form->error($model, 'imageDetailAlt'); ?>
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'imageDetailTitle'); ?>
                    <?php echo $form->textField($model, 'imageDetailTitle', array('class' => 'span12', 'id' => 'image-title')); ?>
                    <?php echo $form->error($model, 'imageDetailTitle'); ?>
                </div>
            </td>
            <td class="span3">
                <?php
                if (!empty($model->imageDetail)) {
                    echo '<div id="detailimage-preview" class="image-preview"><img src="/images/portfolio/detail/' . $model->imageDetail . '" width="150px" /><br /><a href="#" onclick="detailmyModalDeleteImage(); return false;" rel="tooltip" title="удалить картинку" class="i-remove"><i class="icon-remove"></i></a></div>';
                } else {
                    echo '<div id="detailimage-preview" class="image-preview"><div class="image-preview-empty">нет фото</div></div>';
                }
                ?>
            </td>
        </tr>
    </table>
    <?php
} else {
    ?>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'image'); ?>
        <?php echo $form->fileField($model, 'image', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'image'); ?>
        <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['height']; ?> px</small>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'imageAlt'); ?>
        <?php echo $form->textField($model, 'imageAlt', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'imageAlt'); ?>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'imageTitle'); ?>
        <?php echo $form->textField($model, 'imageTitle', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'imageTitle'); ?>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'imageDetail'); ?>
        <?php echo $form->fileField($model, 'imageDetail', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'imageDetail'); ?>
        <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['height']; ?> px</small>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'imageDetailAlt'); ?>
        <?php echo $form->textField($model, 'imageDetailAlt', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'imageDetailAlt'); ?>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'imageDetailTitle'); ?>
        <?php echo $form->textField($model, 'imageDetailTitle', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'imageDetailTitle'); ?>
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
if (isset($edit)) {
    $this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteImage', 'data'=>array('id'=>$model->id, 'url'=>'/altadmin/portfolio/default/deleteImage', 'body'=>'<p>Вы уверены что хотите удалить изображение списка?</p>', 'pathToImage' => '/images/portfolio/list/'.$model->image)));
    $this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteImage', 'data'=>array('id'=>$model->id, 'url'=>'/altadmin/portfolio/default/deleteImage', 'body'=>'<p>Вы уверены что хотите удалить изображение подробного описания?</p>', 'pathToImage' => '/images/portfolio/detail/'.$model->imageDetail, 'prefix' => 'detail')));
}