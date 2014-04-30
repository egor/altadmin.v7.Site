<?php

/**
 * ALTPortfolioSection. Модель для CMS таблицы PortfolioSection
 * 
 * @package CMS
 * @category Portfolio
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTPortfolioSection extends PortfolioSection {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function deleteRecord($id) {
        $model = ALTPortfolioSection::model()->findByPk($id);
        if ($model && $id!=1) {
            $portfolio = ALTPortfolioSection::model()->findAll(array('condition'=>'portfolioSectionId="' . $id . '"'));
            if ($portfolio) {
                foreach ($portfolio as $value) {
                    ALTPortfolio::model()->deleteRecord($value->id);
                }
            }
            $model->delete();
            return true;
        }
        return false;
    } 
}
