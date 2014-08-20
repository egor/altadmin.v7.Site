<?php

/**
 * ALTSliderMainPage. Модель для работы с таблицей "sliderMainPage"
 * 
 * @package CMS
 * @category MainPage
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTSliderMainPage extends SliderMainPage {

    /**
     * Имя старого изображения списка
     * 
     * @var string
     */
    public $oldImage = '';

    public function behaviors() {
        return array(
            //работа с изображениями
            'ImageDataBehavior' => array(
                'class' => 'ImageDataBehavior',
                'modelName' => __CLASS__,
                'aiName' => $this->primaryKey,
            ),
            //работа с базовыми данными
            'DefaultDataBehavior' => array(
                'class' => 'DefaultDataBehavior',
            ),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Действия после сохранения записи
     * 
     * @return boolean
     */
    protected function afterSave() {
        parent::afterSave();
        $this->image = $this->uploadImage($this->id, 'image', '/images/slider/mainPage/', Yii::app()->params['altadmin']['modules']['mainPage']['slide']['image']['width'], Yii::app()->params['altadmin']['modules']['mainPage']['slide']['image']['height'], $this->oldImage);
        if ($this->isNewRecord) {
            ALTLoger::saveLog('Добавление слайда', 'Слайд успешно добавлен. id: ' . $this->id . '.', 1, 'add', 'slider');
        } else {
            ALTLoger::saveLog('Редактирование слайда', 'Слайд успешно отредактирован. id: ' . $this->id . '.', 1, 'edit', 'slider');
        }
        return true;
    }

    /**
     * Действия перед удалением записи
     * 
     * @return boolean
     */
    protected function beforeDelete() {
        parent::beforeDelete();
        $this->deleteImage($this->id, 'image', '/images/slider/mainPage/');
        return true;
    }

    protected function afterDelete() {
        parent::afterDelete();
        ALTLoger::saveLog('Удаление слайда', 'Слайд успешно удален. id: ' . $this->id . '.', 1, 'delete', 'slider');
        return true;
    }

    /**
     * Удаление записи блога и ее данных
     * 
     * @param int $id - id записи
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTSliderMainPage::model()->findByPk($id);
        if ($model) {
            if (ALTSliderMainPage::deleteImage($id)) {
                $model->delete();
                return true;
            }
        }
        return false;
    }

}
