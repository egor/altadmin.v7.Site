<?php

/**
 * ALTUser. Модель для CMS таблицы User
 * 
 * @package CMS
 * @category User
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTUser extends User {

    /**
     * Название старого изображения
     * 
     * @var string
     */
    public $oldImage = '';

    /**
     * Старый пароль пользователя
     * 
     * @var string
     */
    public $oldPassword = '';

    public $passwordToMd5 = false;
    
    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return ALTUser статическая модель класса
     */
    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
            //работа с изображениями
            'ImageDataBehavior' => array(
                'class' => 'ImageDataBehavior',
                'modelName' => 'ALTUser',
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
        if ($this->password == '' && !$this->isNewRecord) {
            $this->password = $this->oldPassword;
            $this->date = time();
        } else {
            $this->passwordToMd5 = true;
        }
        return parent::beforeValidate();
    }

    /**
     * Действия перед сохранением записи
     * 
     * @return boolean
     */
    protected function beforeSave() {
        if ($this->passwordToMd5) {
            $this->password = md5($this->password);
        }
        return parent::beforeSave();
    }

    /**
     * Действия после сохранения записи
     * 
     * @return boolean
     */
    protected function afterSave() {
        parent::afterSave();
        if ($this->isNewRecord) {
            ALTLoger::saveLog('Добавление пользователя', 'Пользователь успешно добавлен. id: ' . $this->id . ', имя: ' . $this->name . ' ' . $this->surname .'.', 1, 'add', 'user');
        } else {
            ALTLoger::saveLog('Редактирование пользователя', 'Пользователь успешно отредактирован. id: ' . $this->id . ', имя: ' . $this->name . ' ' . $this->surname . '.', 1, 'edit', 'user');
        }
        $this->image = $this->uploadImage($this->id, 'image', '/images/user/list/', Yii::app()->params['altadmin']['modules']['user']['image']['list']['width'], Yii::app()->params['altadmin']['modules']['user']['image']['list']['height'], $this->oldImage);
        return true;
    }

    /**
     * Действия перед удалением записи
     * 
     * @return boolean
     */
    protected function beforeDelete() {
        parent::beforeDelete();
        $this->deleteImage($this->id, 'image', '/images/user/list/');
        return true;
    }

    protected function afterDelete() {
        parent::afterDelete();
        ALTLoger::saveLog('Удаление пользователя', 'Пользователь успешно удален. id: ' . $this->id . ', имя: ' . $this->name . ' ' . $this->surname .'.', 1, 'delete', 'user');
        return true;
    }
}
