<?php

/**
 * ALTNews. Управляние новостями
 * 
 * @package CMS
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTNews extends News {

    /**
     * Имя старого изображения списка
     * 
     * @var string
     */
    public $oldListImage = '';

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
            //работа с изображениями
            'ImageDataBehavior' => array(
                'class' => 'ImageDataBehavior',
                'modelName' => 'ALTNews',
                'aiName' => 'id',
            ),
            //работа с базовыми данными
            'DefaultDataBehavior' => array(
                'class' => 'DefaultDataBehavior',
            ),
        );
    }

    /**
     * Действия перед проверкой данных
     * 
     * @return boolean
     */
    protected function beforeValidate() {        
        parent::beforeValidate();        
        $this->url = $this->setUrl($this->url, $this->menuName);
        if (!Yii::app()->params['altadmin']['modules']['news']['section']) {
            //Если разделы новостей выключены, то родителем устанавливаем основной раздел
            $this->newsSectionId = 1;
        }
        if (Yii::app()->params['altadmin']['modules']['news']['tags']) {
            //если включены теги, то обрабатываем их
            //todo сохранение тегов
        }
        return true;
    }

    /**
     * Действия перед сохранением записи
     * 
     * @return boolean
     */
    protected function beforeSave() {
        $this->date = $this->setDate($this->date);
        parent::beforeSave();        
        //$this->hash = $this->setHash();
        return true;
    }

    /**
     * Действия после сохранения записи
     * 
     * @return boolean
     */
    protected function afterSave() {
        parent::afterSave();
        $this->image = $this->uploadImage($this->id, 'image', '/images/news/list/', Yii::app()->params['altadmin']['modules']['news']['image']['list']['width'], Yii::app()->params['altadmin']['modules']['news']['image']['list']['height'], $this->oldListImage);
        return true;
    }

    /**
     * Действия перед удалением записи
     * 
     * @return boolean
     */
    protected function beforeDelete() {
        parent::beforeDelete();
        $this->deleteImage($this->id, 'image', '/images/news/list/');
        return true;
    }

    /**
     * Удаление новости и ее данных
     * 
     * @param int $id - id новости
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTNews::model()->findByPk($id);
        if ($model) {
            if (ALTNews::deleteImage($id)) {
                $model->delete();
                return true;
            }
        }
        return false;
    }
}