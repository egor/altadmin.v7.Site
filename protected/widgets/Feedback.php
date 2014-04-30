<?php

/**
 * Feedback. Форма обратной связи
 * 
 * @package Widget
 * @category Feedback
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class Feedback extends CWidget {

    /**
     * Вывод формы обратной связи
     */
    public function init() {
        $model = new ContactForm;
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.Feedback.form', array('model' => $model));
    }

}