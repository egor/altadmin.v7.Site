<div class="row-fluid">
    <div class="position-relative">
        <div id="login-box" class="login-box widget-box no-border<?php echo ($visible == 'auth' ? ' visible' : ''); ?>">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header blue lighter bigger">
                        <i class="icon-coffee green"></i>
                        Авторизация
                    </h4>

                    <div class="space-6"></div>

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
                        <div class='control-group<?php echo (isset($model->errors['email']['0']) ? ' error' : ''); ?>'>
                            <label>
                                <span class="block input-icon input-icon-right error">
                                    <?php echo $form->textField($model, 'email', array('class' => 'span12', 'placeholder' => 'Э-почта')); ?>
                                    <i class="icon-user"></i>
                                </span>
                            </label>
                        </div>
                        <div class='control-group<?php echo (isset($model->errors['password']['0']) ? ' error' : ''); ?>'>
                            <label>
                                <span class="block input-icon input-icon-right">
                                    <?php echo $form->passwordField($model, 'password', array('class' => 'span12', 'placeholder' => 'Пароль')); ?>
                                    <i class="icon-lock"></i>
                                </span>
                            </label>
                        </div>

                        <div class="space"></div>

                        <div class="clearfix">
                            <label class="inline">
                                <?php echo $form->checkBox($model, 'rememberMe'); ?>
                                <span class="lbl"> Запомнить меня</span>
                            </label>
                            <?php echo CHtml::submitButton('Войти', array('class' => 'width-35 pull-right btn btn-small btn-primary')); ?>
                        </div>

                        <div class="space-4"></div>
                    </fieldset>
                    <?php $this->endWidget(); ?>

                    <div class="social-or-login center">
                        <span class="bigger-110"></span>
                    </div>

                </div><!--/widget-main-->

                <div class="toolbar clearfix">
                    <div>
                        <a href="#" onclick="show_box('forgot-box');
                                return false;" class="forgot-password-link">
                            <i class="icon-arrow-left"></i>
                            Я забыл свой пароль
                        </a>
                    </div>
                </div>
            </div><!--/widget-body-->
        </div><!--/login-box-->

        <div id="forgot-box" class="forgot-box widget-box no-border<?php echo ($visible == 'restore' ? ' visible' : ''); ?>">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header red lighter bigger">
                        <i class="icon-key"></i>
                        Восстановление пароля
                    </h4>

                    <div class="space-6"></div>
                    <?php
                    if (!isset($passwordChange)) {
                        ?>
                    
                    <p>
                        Введите адрес э-почты
                    </p>

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
                        <label>
                            <span class="block input-icon input-icon-right">
                                <?php echo $form->textField($restorePassword, 'email', array('class' => 'span12', 'placeholder' => 'Э-почта')); ?>
                                <i class="icon-envelope"></i>
                            </span>
                        </label>

                        <div class="clearfix">
                            <?php echo CHtml::submitButton('Отправить', array('class' => 'width-35 pull-right btn btn-small btn-danger')); ?>
                        </div>
                    </fieldset>
                    <?php 
                    $this->endWidget(); 
                    } else {
                        echo $passwordChange;
                    }
                    ?>
                </div><!--/widget-main-->

                <div class="toolbar center">
                    <a href="#" onclick="show_box('login-box');
                            return false;" class="back-to-login-link">
                        Вернуться к авторизации
                        <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div><!--/widget-body-->
        </div><!--/forgot-box-->

        <?php echo $content; ?>

    </div><!--/position-relative-->
</div>