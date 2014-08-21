<?php

class Main extends CWidget {

    public $method;

    /**
     * Вывод основного меню
     */
    public function init() {
        $method = $this->method;
        $this->$method();
    }

    public function footer() {

        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.Main.footer');
    }

}