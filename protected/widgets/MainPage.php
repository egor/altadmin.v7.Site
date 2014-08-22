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
        $model = SliderMainPage::model()->findAll(array('condition' => 'visibility=1', 'order'=>'position'));
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.MainPage.slider', array('model' => $model));
    }
    
    protected function portfolio() {
        $section = PortfolioSection::model()->findAll(array('condition' => 'visibility="1"', 'order' => 'position'));
        $portfolio = Portfolio::model()->with('portfolioSection')->findAll(array('condition' => 't.visibility="1"', 'order'=>'t.date DESC, t.menuName DESC'));
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.MainPage.portfolio', array('section' => $section, 'portfolio' => $portfolio));
    }
    
    protected function bestPage() {
        $model = Page::model()->findAll(array('condition' => 'visibility=1 AND inMain=1', 'order'=>'lft'));
        if (!empty($model)) {
            $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.MainPage.bestPage', array('model' => $model));
        }
    }    
}