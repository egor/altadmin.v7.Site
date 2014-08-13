<?php

/**
 * SiteComment. Модель для работы с таблицей "comment"
 * 
 * @package Site
 * @category Gallery
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SiteGalleryRelations extends GalleryRelations {

    /**
     * Возвращает статическую модель указанного класса AR.
     * @param string $className AR имя класса.
     * @return SiteGalleryRelations статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
