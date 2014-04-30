<?php

class PageOperations extends CWidget
{

    public $method;
    /**
     * Вывод основного меню
     */
    public function init()
    {
        $method = $this->method;
        $this->$method();
    }
    
    protected function deletePage() {
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.PageOperations.deletePage', array());
    }
}