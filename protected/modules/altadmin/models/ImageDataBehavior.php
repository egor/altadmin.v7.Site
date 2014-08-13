<?php

/**
 * ImageDataBehavior. Управляния изображениями
 * 
 * @todo перенести код работы с данными в модели
 * @package CMS
 * @category Image
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ImageDataBehavior extends CActiveRecordBehavior {
    
    /**
     * Имя модели
     * 
     * @var string 
     */
    public $modelName;
    
    /**
     * Имя id таблицы
     * @var string
     */
    public $aiName;
    /**
     * Загрузка изображения
     * 
     * @param int $id - id записи
     * @param string $fieldName - название поля автора
     * @param string $folder - путь к папке изображения
     * @param int $width - ширина изображения
     * @param int $height - высота изображения
     * @param string $oldImage - название старого изображения
     */
    public function uploadImage($id, $fieldName, $folder, $width, $height, $oldImage) {
        $pic = ImagesBasicOperations::upload($id, $folder, $this->modelName, $fieldName, $width, $height, $oldImage, false);
        $model = new $this->modelName;
        $model::model()->updateByPk($id, array($fieldName => $pic));
        return $pic;
    }
    
    /**
     * Удаление изображения
     * 
     * @param int $id - id автора
     * @param string $fieldName - название поля изображения
     * @param string $folder - путь к папке изображения
     * @return boolean
     */
    public function deleteImage($id, $fieldName, $folder) {
        return ImagesBasicOperations::delete($id, $folder, $this->modelName, $fieldName);
    }
    
    public function deleteGalleryImage($folder, $file) {

        //$model = new $modelName;
        //$fileName = $model->findByPk($id);
        //$model->updateByPk($id, array($fieldName => ''));
        
        //if (!empty($this->image) && file_exists(Yii::getPathOfAlias('webroot') . $folder . $this->image)) {
        //    unlink(Yii::getPathOfAlias('webroot') . $folder . $this->image);
        //}
        if (file_exists(Yii::getPathOfAlias('webroot') . $folder . 'small/' . $file)) {
            unlink(Yii::getPathOfAlias('webroot') . $folder . 'small/' . $file);
        }
        if (file_exists(Yii::getPathOfAlias('webroot') . $folder . 'big/' . $file)) {
            unlink(Yii::getPathOfAlias('webroot') . $folder . 'big/' . $file);
        }
        if (file_exists(Yii::getPathOfAlias('webroot') . $folder . 'real/' .$file)) {
            unlink(Yii::getPathOfAlias('webroot') . $folder . 'real/' . $file);
        }
        return true;
    }
}
