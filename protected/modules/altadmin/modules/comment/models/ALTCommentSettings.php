<?php

/**
 * ALTCommentSettings. Модель для работы с таблицей "commentSettings"
 * 
 * @package CMS
 * @category Comment
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTCommentSettings extends CommentSettings {

    /**
     * Возвращает статическую модель указанного класса AR.
     * @param string $className AR имя класса.
     * @return ALTCommentSettings статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function afterSave() {
        if (parent::afterSave()) {
            ALTLoger::saveLog('Настройка комментариев', 'Редактирование настроек комментариев. название: ' . $this->name .'.', 1, 'edit', 'comment');
            return true;
        }
        return false;
    }
}
