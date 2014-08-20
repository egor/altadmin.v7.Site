<?php
/* @var $this DefaultController */
$this->breadcrumbs = array(
    'Виджеты' => '#',
    'Слайдер на главной' => '/altadmin/widget/sliderMainPage',
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
    <?php echo $form->labelEx($model, 'header'); ?>
    <?php echo $form->textField($model, 'header', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'header'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'text'); ?>
    <?php echo $form->textField($model, 'text', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'text'); ?>
</div>

<div class="control-group">
    <?php echo $form->labelEx($model, 'btnText'); ?>
    <?php echo $form->textField($model, 'btnText', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'btnText'); ?>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'link'); ?>
    <?php echo $form->textField($model, 'link', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'link'); ?>
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
                    <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['mainPage']['slide']['image']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['mainPage']['slide']['image']['height']; ?> px</small>
                </div>                
            </td>
            <td class="span3">
                <?php
                if (!empty($model->image)) {
                    echo '<div id="image-preview"><img src="/images/slider/mainPage/' . $model->image . '" width="150px" /><br /><a href="#" onclick="myModalDeleteImage(); return false;" rel="tooltip" title="удалить картинку" class="i-remove"><i class="icon-remove"></i></a></div>';
                } else {
                    echo '<div id="image-preview"><div class="image-preview-empty">нет фото</div></div>';
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
        <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['mainPage']['slide']['image']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['mainPage']['slide']['image']['height']; ?> px</small>
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
    $this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteImage', 'data' => array('id' => $model->id, 'url' => '/altadmin/widget/sliderMainPage/deleteImage', 'body' => '<p>Вы уверены что хотите удалить фото?</p>', 'pathToImage' => '/images/slider/mainPage/' . $model->image)));
}