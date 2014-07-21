<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'contact-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array('class' => 'contact-form', 'role' => 'form'),
        ));
?>
<h3>Форма обратной связи</h3>
<div class="row col-md-6">
    <div class="form-group">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model, 'name', array('id'=>'contact_name', 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'namePlaceholder'))); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model, 'email', array('id'=>'contact-email', 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'emailPlaceholder'))); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'body'); ?>
        <?php echo $form->textArea($model,'body',array('rows'=>15, 'cols'=>40, 'id' => 'contact_message', 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'textPlaceholder'))); ?>
        <?php echo $form->error($model,'body'); ?>
    </div>
    <div class="form-group">
		<?php echo CHtml::submitButton(FrontEditFields::getSettings('FeedbackSettings', 'sendBtnText'), array('class'=>'btn btn-success alt-right')); ?>
	</div>
</div>
<?php 
$this->endWidget();