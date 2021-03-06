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
            'altadmin.modules.loger.models.*',
            'altadmin.modules.tags.models.*',
            'altadmin.modules.comment.models.*',
            'altadmin.modules.gallery.models.*',
		));
        $this->modules=array('news', 'blog', 'portfolio', 'widget', 'user', 'loger', 'comment', 'gallery');
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
            if (Yii::app()->controller->id == 'uploadify') {
                return true;
            }
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
