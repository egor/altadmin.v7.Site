<?php

/**
 * ALTNewsSection. Модель для CMS таблицы NewsSection
 * 
 * @package CMS
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTNewsSection extends NewsSection {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function deleteRecord($id) {
        $model = ALTNewsSection::model()->findByPk($id);
        if ($model && $id!=1) {
            $news = ALTNews::model()->findAll(array('condition'=>'newsSectionId="' . $id . '"'));
            if ($news) {
                foreach ($news as $value) {
                    ALTNews::model()->deleteRecord($value->id);
                }
            }
            $model->delete();
            return true;
        }
        return false;
    } 
}
