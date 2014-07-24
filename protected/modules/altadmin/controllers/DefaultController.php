<?php

class DefaultController extends Controller {

    public function actionIndex($key = '') {
        $visible = 'auth';
        if (Yii::app()->user->isGuest) {
            $this->layout='//layouts/login';
            $this->pageTitle = 'Авторизация';
            $model = new LoginForm;
            $restorePassword = new ALTUserRestorePassword;
            //авторизация
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                if ($model->validate() && $model->login()) {
                    ALTLoger::saveLog('Авторизация пользователя', 'Пользователь успешно авторизирован', 1, 'login', 'user');
                    $this->redirect('/altadmin');
                }
            }
            //восстановление
            if (isset($_POST['ALTUserRestorePassword'])) {
                $visible = 'restore';
                $restorePassword->attributes = $_POST['ALTUserRestorePassword'];
                if ($restorePassword->confirmPasswordChange()) {
                    $this->render('login', array('model' => $model, 'restorePassword' => $restorePassword, 'visible' => $visible, 'passwordChange' => 'На указанную э-почту выслано письмо с подтверждением смены пароля.'));
                    exit;
                }
            }            
            $this->render('login', array('model' => $model, 'restorePassword' => $restorePassword, 'visible' => $visible));
        } else {
            $this->pageHeader = $this->pageTitle = 'Здравствуйте, ' . Yii::app()->user->title;
            $this->breadcrumbsTitle = 'Главная';
            $this->render('index');
        }
    }
    
    public function actionRestorePassword($key) {
        if (Yii::app()->user->isGuest) {
            $this->layout = '//layouts/login';
            $this->pageTitle = 'Смена пароля';
            $model = ALTUserRestorePassword::model()->find(array('condition' => '`str`="' . $key . '"'));            
            if ($model && $model->saveNewPassword()) {
                $this->render('restorePassword', array('status' => true));
            } else {
                $this->render('restorePassword', array('status' => false));
            }
        } else {
            throw new CHttpException(404,'Указанная запись не найдена');
        }
    }

}
