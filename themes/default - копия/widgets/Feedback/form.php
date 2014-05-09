<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'contact-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array('class' => 'contact-form'),
        ));
?>

    <p class="contact-name">
        <?php echo $form->textField($model, 'name', array('id'=>'contact_name', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'namePlaceholder'))); ?>
    </p>
    <p class="contact-email">
        <?php echo $form->textField($model, 'email', array('id'=>'contact-email', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'emailPlaceholder'))); ?>
    </p>
    <p class="contact-message">
        <?php echo $form->textArea($model,'body',array('rows'=>15, 'cols'=>40, 'id' => 'contact_message', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'textPlaceholder'))); ?>        
    </p>
    <p class="contact-submit">
        <a id="contact-submit" class="submit" href="#"><?php echo FrontEditFields::getSettings('FeedbackSettings', 'sendBtnText'); ?></a>
    </p>

    <div id="response">

    </div>
<?php $this->endWidget(); ?>