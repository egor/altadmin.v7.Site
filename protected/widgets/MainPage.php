<?php

class MainPage extends CWidget
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
    
    protected function slider() {
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.MainPage.slider');
    }
    
    protected function portfolio() {
        $section = PortfolioSection::model()->findAll(array('condition' => 'visibility="1"', 'order' => 'position'));
        $portfolio = Portfolio::model()->with('portfolioSection')->findAll(array('condition' => 't.visibility="1"', 'order'=>'t.date DESC, t.menuName DESC'));
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.MainPage.portfolio', array('section' => $section, 'portfolio' => $portfolio));
    }
}