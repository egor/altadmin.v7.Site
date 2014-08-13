<?php
$this->breadcrumbs = array(
    'Галерея' => '/altadmin/gallery',
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
    <?php echo $form->labelEx($model, 'menuName'); ?>
    <?php echo $form->textField($model, 'menuName', array('class' => 'span12')); ?>
    <?php echo $form->error($model, 'menuName'); ?>
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
if (isset($edit)) {
    //$this->widget('application.modules.altadmin.widgets.DeleteOperations', array('method' => 'deleteImage', 'data'=>array('id'=>$model->id, 'url'=>'/altadmin/news/default/deleteImage', 'body'=>'<p>Вы уверены что хотите удалить изображение списка?</p>', 'pathToImage' => '/images/news/list/'.$model->image)));
}
if ($edit == 1) { ?>
<script>
    pathToActionChangeOrder = '/altadmin/gallery/default/changeOrder';
    pathToActionDeleteImage = '/altadmin/gallery/default/deleteImage';
    pathToActionEditMetaImage = '/altadmin/gallery/default/editMetaImage';
</script>
<br />
<div class="images-list well form-vertical" id="images-list">
<?php $this->widget('ImagesListWidget', array('pid'=>$model->id,'folder'=>'gallery','model'=>'GalleryItem','pidField' => 'galleryId', 'modelId' => 'id')); ?>
</div>
<div class="images-list well form-vertical">
<?php $this->widget('UploadifyWidget', array('model' => 'GalleryItem', 'pidField' => 'galleryId', 'pid' => $model->id, 'folder' => 'gallery', 'modelId' => 'id')); ?>
</div>
<?php 

//$this->widget('application.modules.altadmin.widgets.DeleteConfirmationWindow', array('method' => 'deleteImage', 'data'=>array('id'=>$model->dishes_id, 'url'=>'/altadmin/dishes/deleteImage', 'body'=>'<p>Вы уверены что хотите удалить изображение списка?</p>', 'pathToImage' => '/images/dishes/'.$model->image)));

} else { ?>
<div class="images-list well form-vertical">
    <h4>Для загрузки картинок сохраните страницу</h4>
</div>
<?php } 
