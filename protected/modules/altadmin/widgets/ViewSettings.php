<?php

/**
 * ViewSettings Вывод уведомлений
 * 
 * @package CMS
 * @category Other
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ViewSettings extends CWidget {

    public $method = '';
    
    public $data = array();
    
    public function init() {
        if (!empty($this->method)) {
            $method = $this->method;
            $this->$method();
        }
    }

    private function startView() {
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.ViewSettings.' . __FUNCTION__, array('cmsViewSettings' => $this->data['cmsViewSettings']));
    }
    
    private function saveDataScript() {
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.ViewSettings.' . __FUNCTION__);
    }
    
    //startView
}