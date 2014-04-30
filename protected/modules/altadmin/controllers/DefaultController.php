<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		if (Yii::app()->user->isGuest) {            
            $this->layout='//layouts/guest';
            $this->pageTitle = 'Авторизация';
            $model = new LoginForm;
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];                
                if ($model->validate() && $model->login()) {                
                    $this->redirect('/altadmin');
                }
            }
            $this->render('login', array('model' => $model));
        } else {
            $this->pageHeader = $this->pageTitle = 'Здравствуйте, ' . Yii::app()->user->title;
            $this->breadcrumbsTitle = 'Главная';
            $this->render('index');
        }
	}
}