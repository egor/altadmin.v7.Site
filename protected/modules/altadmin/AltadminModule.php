<?php

class AltadminModule extends CWebModule
{
	public function init()
	{
        Yii::app()->theme = 'altadmin';
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'altadmin.models.*',            
			'altadmin.components.*',
            'altadmin.modules.user.models.*',
		));
        $this->modules=array('news', 'portfolio', 'widget', 'user');
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
            //Если гость или не имеет роль админа то на главную CMS
            if ((Yii::app()->user->isGuest || (Yii::app()->user->role != 'admin')) && Yii::app()->controller->id != 'default') {
                Yii::app()->request->redirect('/altadmin');
            }
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
