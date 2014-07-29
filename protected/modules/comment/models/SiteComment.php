<?php

/**
 * SiteComment. Модель для работы с таблицей "comment"
 * 
 * @package Site
 * @category Comment
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SiteComment extends Comment {

    /**
     * Возвращает статическую модель указанного класса AR.
     * @param string $className AR имя класса.
     * @return ALTComment статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeValidate() {
        if ($this->isNewRecord) {
            $this->date = time();
            $this->info = '';
            $this->new = 1;
            if (!Yii::app()->user->isGuest) {
                $this->userId = Yii::app()->user->uid;                
            }
            if (Yii::app()->user->isGuest && FrontEditFields::getSettings('CommentSettings', 'moderation') == 1) {
                $this->visibility = 0;
            } else {
                $this->visibility = 1;
            }
        }
        return parent::beforeValidate();
    }
}
