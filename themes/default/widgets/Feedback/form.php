<div class="row col-md-6 fbWidgetForm">
<?php
/*
  $form = $this->beginWidget('CActiveForm', array(
  'id' => 'contact-form',

  'enableAjaxValidation'=>true,

  'clientOptions' => array(
  'validateOnSubmit' => true,
  'validateOnChange' => true,
  ),
  'htmlOptions' => array('class' => 'contact-form', 'role' => 'form'),
  )); */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'fb-form',
    //'action'=>'/site/testA',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>
<h3><?php echo FrontEditFields::getSettings('FeedbackSettings', 'header'); ?>
    <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleSettingsField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/widget/feedback/settings', 'title' => 'настроить ФОС', 'alt' => 'настроить ФОС'))); ?></h3>

    <?php
    $send['error'] = Yii::app()->user->getFlash('contactSendError');
    $send['success'] = Yii::app()->user->getFlash('contactSendSuccess');
    if (!empty($send['success'])) {
        ?>
        <div role="alert" class="alert alert-success fade in">
            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <?php echo $send['success']; ?>
        </div>
        <?php
    }
    if (!empty($send['error'])) {
        ?>
        <div role="alert" class="alert alert-danger fade in">
            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <?php echo $send['error']; ?>
        </div>

        <?php
    }
//echo $form->errorSummary($model); 
    ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name'); ?>
<?php echo $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'namePlaceholder'))); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'email'); ?>
<?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'emailPlaceholder'))); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'body'); ?>
<?php echo $form->textArea($model, 'body', array('rows' => 15, 'cols' => 40, 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'textPlaceholder'))); ?>
        <?php echo $form->error($model, 'body'); ?>
    </div>
    <div class="form-group">
        <?php //echo CHtml::submitButton('Login'); ?>
<?php echo CHtml::submitButton(FrontEditFields::getSettings('FeedbackSettings', 'sendBtnText'), array('class' => 'btn btn-success alt-right')); ?>
<?php //echo CHtml::ajaxSubmitButton(FrontEditFields::getSettings('FeedbackSettings', 'sendBtnText'), '', array(), array('class'=>'btn btn-success alt-right'));  ?>

    </div>
<?php
$this->endWidget();
?>
</div>
