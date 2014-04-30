<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Авторизация</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'login-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array('role' => 'form'),
                    ));
                    ?>
                        <fieldset>
                            <div class="form-group">                                
                                <?php //echo $form->labelEx($model, 'email'); ?>
                                <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Э-почта')); ?>
                                <?php echo $form->error($model, 'email'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Пароль', 'type' => 'email')); ?>
                                <?php echo $form->error($model, 'password'); ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                                    <?php echo $form->label($model,'rememberMe'); ?>
                                    <?php //echo $form->error($model,'rememberMe'); ?>
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <?php echo CHtml::submitButton('Войти', array('class'=>'btn btn-lg btn-success btn-block')); ?>
                        </fieldset>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>