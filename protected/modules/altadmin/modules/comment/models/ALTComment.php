<?php

/**
 * ALTComment. Модель для работы с таблицей "comment"
 * 
 * @package CMS
 * @category Comment
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTComment extends Comment {

    /**
     * Возвращает статическую модель указанного класса AR.
     * @param string $className AR имя класса.
     * @return ALTComment статическая модель класса
     */
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
        if ($this->isNewRecord) {
            ALTLoger::saveLog('Добавление комментария', 'Комментарий успешно добавлен. id: ' . $this->id . '.', 1, 'add', 'comment');
        }
        return true;
    }

    /**
     * Действия после удаления записи
     * 
     * @return boolean
     */
    protected function afterDelete() {
        parent::afterDelete();
        ALTLoger::saveLog('Удаление комментария', 'Комментарий успешно удален. id: ' . $this->id . '.', 1, 'delete', 'comment');
        return true;
    }

    /**
     * Удаление записи
     * 
     * @param int $id - id записи
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTComment::model()->findByPk($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

}
