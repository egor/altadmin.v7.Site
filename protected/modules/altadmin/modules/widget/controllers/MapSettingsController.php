<?php

/**
 * MapController. Настройка карты проезда
 * 
 * @package Widget
 * @category Map
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class MapSettingsController extends Controller {

    /**
     * Список настроек
     */
    public function actionIndex() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Настройка карты проезда';
        ALTLoger::saveLog('Настройка карты проезда', 'Просмотр списка настроек.', 1, 'list', 'map');
        $this->render('index', array('modelName' => 'ALTMapSettings', 'linkToEdit' => '/altadmin/widget/mapSettings/edit/'));
    }
    
    /**
     * Редактирование настройки
     * 
     * @param integer $id - id записи
     */
    public function actionEdit($id) {
        $model = ALTMapSettings::model()->findByPk($id);
        if ($_POST['ALTMapSettings']) {
            $model->attributes = $_POST['ALTMapSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Редактирование прошло успешно.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/widget/mapSettings/');
                } else {
                    Yii::app()->request->redirect('/altadmin/widget/mapSettings/edit/' . $model->id);
                }
            } else {
                ALTLoger::saveLog('Настройка карты проезда', 'Ошибка при редактировании настройки. название: ' . $model->name .'.', 0, 'edit', 'map');
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование настройки';
        $this->pageAddHeader = $model->name;
        $this->render('_form', array('modelName' => 'ALTMapSettings', 'editId' => $id));
    }
}
