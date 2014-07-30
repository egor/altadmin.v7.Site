<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ace/datepicker.css" />
<?php
$this->breadcrumbs = array(
    'Комментарии' => '/altadmin/comment',
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
if ($model->user) {
    $userName = '<a href="/altadmin/user/default/edit/' . $model->user->id . '">' . $model->user->name . ' ' . $model->user->surname . '</a>';
} else {
    $userName = $model->userName;
}
if ($model->blog) {
    $linkToPage = '<a href="/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/' . $model->blog->url . '#comment-' . $model->id .'" target="_blnak">' . $model->blog->menuName . '</a>';
} elseif ($model->news) {
    $linkToPage = '<a href="/' . Yii::app()->params['altadmin']['modules']['news']['baseUrl'] . '/' . $model->blog->url . '#comment-' . $model->id .'" target="_blnak">' . $model->news->menuName . '</a>';
} elseif ($model->page) {
    $pageUrl = Page::getUrl($model->page->id);
    $linkToPage = '<a href="' . $pageUrl . '#comment-' . $model->id .'" target="_blnak">' . $model->page->menuName . '</a>';
}
?>
<p>Автор комментария: <?php echo $userName; ?></p>
<p>Перейти к страинце с комментарием: <?php echo $linkToPage; ?></p>
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
    <?php echo $form->labelEx($model, 'text'); ?>
    <?php echo $form->textArea($model, 'text', array('class' => 'span12', 'rows' => 5, 'id' => 'editor-text')); ?>
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