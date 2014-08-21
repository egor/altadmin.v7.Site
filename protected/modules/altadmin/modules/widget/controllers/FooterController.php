<?php

/**
 * FooterController. Управление подвалом
 * 
 * @package CMS
 * @category Main
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class FooterController extends Controller {

    public function actionIndex() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Настройка';
        ALTLoger::saveLog('Настройка подвала', 'Просмотр списка настроек.', 1, 'list', 'footer');
        $this->render('index', array('modelName' => 'ALTFooterSettings', 'linkToEdit' => '/altadmin/widget/footer/edit/'));
    }
    
    public function actionEdit($id) {
        $model = ALTFooterSettings::model()->findByPk($id);
        if ($_POST['ALTFooterSettings']) {
            $model->attributes = $_POST['ALTFooterSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Редактирование прошло успешно.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/widget/footer/');
                } else {
                    Yii::app()->request->redirect('/altadmin/widget/footer/edit/' . $model->id);
                }
            } else {
                ALTLoger::saveLog('Настройка подвала', 'Ошибка при редактировании настройки. название: ' . $model->name .'.', 0, 'edit', 'footer');
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование настройки';
        $this->pageAddHeader = $model->name;
        $this->render('_form', array('modelName' => 'ALTFooterSettings', 'editId' => $id));
    }
}
