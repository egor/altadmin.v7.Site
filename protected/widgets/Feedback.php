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
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];            
            if ($model->validate()) {
                $feedbackStorage = new FeedbackStorage;
                $feedbackStorage->name = $model->name;
                $feedbackStorage->email = $model->email;
                $feedbackStorage->text = $model->body;
                $feedbackStorage->addInfo = Yii::app()->request->requestUri;
                $feedbackStorage->date = time();
                $feedbackStorage->new = 1;
                $feedbackStorage->trash = 0;
                $feedbackStorage->save();
                $body = '<p>' . $model->body . '</p>';
                $adminEmail = FeedbackSettings::getAdminEmail();
                if ($adminEmail && $adminEmail != '') {
                    SendSiteMail::sendSimpleMail($body, 'Сообщение формы обратной связи с сайта ' . $_SERVER['HTTP_HOST'], $adminEmail);
                }
                Yii::app()->user->setFlash('contact', FrontEditFields::getSettings('FeedbackSettings', 'sendSuccess'));
                unset($_POST['ContactForm']);
                 Yii::app()->controller->refresh();
            } else {
                //Yii::app()->user->setFlash('contact', FrontEditFields::getSettings('FeedbackSettings', 'sendError'));
            }
        }
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.Feedback.form', array('model' => $model));
    }

}
