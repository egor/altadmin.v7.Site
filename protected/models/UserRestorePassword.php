<?php

/**
 * UserRestorePassword. Восстановление пароля пользователя
 * 
 * @package Front
 * @category User
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class UserRestorePassword extends CActiveRecord {

    /**
     * Имя текущей таблицы
     * 
     * @return строка соответствующим именем таблицы базы данных
     */
    public function tableName() {
        return 'userRestorePassword';
    }

    /**
     * Правила валидации
     * 
     * @return array правила проверки для атрибутов модели
     */
    public function rules() {
        return array(
            array('email, date, password, userId, str', 'required'),
            array('email, password, str', 'length', 'max' => 255),
            array('date, userId', 'length', 'max' => 10),
            array('id, email, date, password, userId, str', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array связи таблицы
     */
    public function relations() {
        return array(
        );
    }

    /**
     * Метки атрибутов
     * 
     * @return array индивидуальные метки атрибутов (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'date' => 'Date',
            'password' => 'Password',
            'userId' => 'User',
            'str' => 'Str',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('userId', $this->userId, true);
        $criteria->compare('str', $this->str, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return UserRestorePassword статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Сохранение запроса о смене пароля пользователя
     * 
     * @param string $email - email пользователя
     * @param string $newPassword - новый пароль пользователя
     * @param string $str - ключ подтверждения смены пароля
     * @return boolean
     */
    public static function saveRestoreString($email, $newPassword = '', $str = '') {
        $user = User::model()->find(array('condition' => '`email`="' . $email . '"'));
        if ($user) {
            $model = new UserRestorePassword;
            $model->email = $email;
            $model->date = time();
            if (empty($newPassword)) {
                $model->password = '';
            } else {
                $model->password = md5($newPassword);
            }
            $model->userId = $user->id;
            if (empty($newPassword)) {
                $model->str = GenerateString::generateIdString($user->id, 50);
            } else {
                $model->str = $str;
            }            
            if ($model->validate()) {
                $model->save();
                return true;
            }
        }
        return false;
    }
    
    /**
     * Подтверждение смены пароля
     * 
     * @return boolean
     */
    public function saveNewPassword() {
        $user = User::model()->findByPk($this->userId);
        if ($user) {
            $user->password = $this->password;        
            if ($user->save()) {
                $this->delete();
                return true;
            }
        }
        return false;
    }
}
