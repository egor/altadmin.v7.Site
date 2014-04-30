<?php
/* @var $this DefaultController */
$this->breadcrumbs = array(
    'Пользователи' => '/altadmin/user',
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
    <?php echo $form->labelEx($model, 'email'); ?>
    <?php echo $form->textField($model, 'email', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'email'); ?>
</div>
<div class="control-group" style="overflow: hidden;">
    <div style="float: left; width: 50%;">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'span11')); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    <div style="float: left; width: 50%;">
        <?php echo $form->labelEx($model, 'password2'); ?>
        <?php echo $form->passwordField($model, 'password2', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'password2'); ?>
    </div>
</div>
<div class="control-group" style="overflow: hidden;">
    <div style="float: left; width: 50%;">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('class' => 'span11')); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div style="float: left; width: 50%;">
        <?php echo $form->labelEx($model, 'surname'); ?>
        <?php echo $form->textField($model, 'surname', array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'surname'); ?>
    </div>
</div>
<div class="control-group" style="overflow: hidden;">
    <div style="float: left; width: 33%;">
        <?php echo $form->labelEx($model, 'role'); ?>
        <?php echo $form->dropDownList($model, 'role', array('user' => 'Пользователь', 'admin' => 'Администратор'), array('class' => 'span11')); ?>
        <?php echo $form->error($model, 'role'); ?>
    </div>
    <div style="float: left; width: 33%;">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('0' => 'Ожидает проверки', '1' => 'Проверен'), array('class' => 'span11')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>
    <div style="float: left; width: 33%;">
        <?php echo $form->labelEx($model, 'sex'); ?>
        <?php echo $form->dropDownList($model, 'sex', array('male' => 'Мужской', 'female' => 'Женский'), array('class' => 'span12')); ?>
        <?php echo $form->error($model, 'sex'); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model, 'phone'); ?>
    <?php echo $form->textField($model, 'phone', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'phone'); ?>
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
                    <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['user']['image']['list']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['user']['image']['list']['height']; ?> px</small>
                </div>                
            </td>
            <td class="span3">
                <?php
                if (!empty($model->image)) {
                    echo '<div id="image-preview"><img src="/images/user/list/' . $model->image . '" width="150px" /><br /><a href="#" onclick="myModalDeleteImage(); return false;" rel="tooltip" title="удалить картинку" class="i-remove"><i class="icon-remove"></i></a></div>';
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
        <small>Размер изображения: <?php echo Yii::app()->params['altadmin']['modules']['user']['image']['list']['width'] . 'x' . Yii::app()->params['altadmin']['modules']['user']['image']['list']['height']; ?> px</small>
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
    $this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteImage', 'data' => array('id' => $model->id, 'url' => '/altadmin/user/default/deleteImage', 'body' => '<p>Вы уверены что хотите удалить фото?</p>', 'pathToImage' => '/images/user/list/' . $model->image)));
}