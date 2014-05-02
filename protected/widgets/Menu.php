<?php

class Menu extends CWidget
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
    
    public function horizontalMenu()
    {
        $menu = Page::model()->findAll(array('condition' => 'level="3" AND inMenu="1" AND visibility="1"'));
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.Menu.horizontalMenu', array('menu' => $menu));
    }
    
    public function footerMenu()
    {
        $menu = Page::model()->findAll(array('condition' => 'level="3" AND inMenu="1" AND visibility="1"'));
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.Menu.footerMenu', array('menu' => $menu));
    }
}