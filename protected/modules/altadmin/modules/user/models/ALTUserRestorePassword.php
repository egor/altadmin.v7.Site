<?php

/**
 * ALTUserRestorePassword. Восстановление пароля пользователя
 * 
 * @package CMS
 * @category User
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTUserRestorePassword extends UserRestorePassword {

    /**
     * Возвращает статическую модель указанного класса AR
     * @param string $className active record имя класса
     * @return ALTUserRestorePassword статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Смена пароля пользователя
     * 
     * Добавляет запись в таблицу UserRestorePassword
     * и отправляет письмо с уведомлением для подтверждения смены пароля
     * 
     * @return boolean
     */
    public function confirmPasswordChange() {
        if (ALTUser::issetEmail($this->email)) {
            $newPassword = GenerateString::generateIdString(0, 5);
            $key = GenerateString::generateIdString($user->id, 50);
            if ($this->saveRestoreString($this->email, $newPassword, $key)) {
                $body = '<p>Добрый день. Вы запросили сменит пароль на сайте <b>' . $_SERVER['HTTP_HOST'] . '</b></p>'
                        . '<p>Ваш логин: ' . $this->email . '</p>'
                        . '<p>Ваш новый пароль: ' . $newPassword . '</p>'
                        . '<p>Для подтверждения смены пароля перейдите по ссылке http://' . $_SERVER['HTTP_HOST'] . '/altadmin/default/restorePassword?key=' . $key . '</p>';                
                SendSiteMail::sendSimpleMail($body, 'Смена пароля на сайте ' . $_SERVER['HTTP_HOST'], $this->email);
                return true;
            }
        }
    }
    
    /**
     * Подтверждение смены пароля
     * 
     * @return boolean
     */
    public function saveNewPassword() {
        return parent::saveNewPassword();
    }
    
}
