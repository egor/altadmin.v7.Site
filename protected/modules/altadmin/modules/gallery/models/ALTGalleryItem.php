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
class ALTGalleryItem extends GalleryItem {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

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

    /**
     * Действия перед проверкой данных
     * 
     * @return boolean
     */
    protected function beforeValidate() {
        parent::beforeValidate();        
        return true;
    }

    /**
     * Действия перед сохранением записи
     * 
     * @return boolean
     */
    protected function beforeSave() {
        parent::beforeSave();        
        return true;
    }

    /**
     * Действия после сохранения записи
     * 
     * @return boolean
     */
    protected function afterSave() {
        parent::afterSave();
        return true;
    }

    /**
     * Действия перед удалением записи
     * 
     * @return boolean
     */
    protected function beforeDelete() {
        if (!empty($this->image)) {
            $this->deleteGalleryImage('/images/gallery/', $this->image);
        }
        parent::beforeDelete();
        return true;
    }
    
    protected function afterDelete() {
        parent::afterDelete();
        //ALTLoger::saveLog('Удаление новости', 'Новость успешно удалена. id: ' . $this->id . ', заголовок: ' . $this->menuName .'.', 1, 'delete', 'news');
        return true;
    }

}