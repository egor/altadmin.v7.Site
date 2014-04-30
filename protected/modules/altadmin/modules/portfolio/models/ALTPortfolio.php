<?php

/**
 * ALTPortfolio. Модель для CMS таблицы Portfolio
 * 
 * @package CMS
 * @category Portfolio
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTPortfolio extends Portfolio {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Удаление изображения портфолио
     * 
     * @param int $id - id записи портфолио
     * @return boolean
     */
    public function deleteImage($id) {
        $model = ALTPortfolio::model()->findByPk($id);
        if ($model) {
            if (ImagesBasicOperations::delete($id, '/images/portfolio/list/', 'ALTPortfolio', 'image')) {
                $model->image = '';
                $model->imageAlt = '';
                $model->imageTitle = '';
                $model->save();
            }
            return true;
        }
        return false;
    }

    /**
     * Удаление записи портфолио и ее данных
     * 
     * @param int $id - id записи портфолио
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTPortfolio::model()->findByPk($id);
        if ($model) {
            if (ALTPortfolio::deleteImage($id)) {
                $model->delete();
                return true;
            }
        }
        return false;
    }

}