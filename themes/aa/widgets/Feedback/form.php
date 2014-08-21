<div class="contact-us container">
    <div class="row">
        <div class="contact-form span7">
            <h3 style="margin-left: -30px;">Форма обратной связи</h3>
            <div class="inner-1">
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
                <div class="row col-md-12"><?php echo Yii::app()->user->getFlash('contact'); ?></div>
                <div class="row col-md-6 inner-1">
                    <div class="form-group">
                        <?php // echo $form->labelEx($model,'name'); ?>
                        <?php echo $form->textField($model, 'name', array('id' => 'contact_name', 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'namePlaceholder'))); ?>
                        <?php echo $form->error($model, 'name'); ?>
                        <br clear='all' />
                        <br clear='all' />
                    </div>
                    <div class="form-group">
                        <?php // echo $form->labelEx($model,'email'); ?>
                        <?php echo $form->textField($model, 'email', array('id' => 'contact-email', 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'emailPlaceholder'))); ?>
                        <?php echo $form->error($model, 'email'); ?>
                        <br clear='all' />
                        <br clear='all' />
                    </div>
                    <div class="form-group">
                        <?php // echo $form->labelEx($model,'body'); ?>
                        <?php echo $form->textArea($model, 'body', array('rows' => 15, 'cols' => 40, 'id' => 'contact_message', 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('FeedbackSettings', 'textPlaceholder'))); ?>
                        <?php echo $form->error($model, 'body'); ?>
                        <br clear='all' />
                        <br clear='all' />
                    </div>

                    <div class="buttons-wrapper">
                        <?php echo CHtml::submitButton(FrontEditFields::getSettings('FeedbackSettings', 'sendBtnText'), array('class' => 'btn btn-1')); ?>
                    </div>
                </div>
                <?php
                $this->endWidget();
                ?>
            </div>
        </div>
    </div>
</div>