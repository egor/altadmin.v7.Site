<?php

/**
 * User. Модель для работы с таблицей "user"
 * 
 * @package Front
 * @category User
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class User extends CActiveRecord {

    /**
     * Повторение пароля
     * 
     * @var string
     */
    public $password2;

    /**
     * Имя текущей таблицы
     * 
     * @return строка соответствующим именем таблицы базы данных
     */
    public function tableName() {
        return 'user';
    }

    /**
     * Правила валидации
     * 
     * @return array правила проверки для атрибутов модели
     */
    public function rules() {
        return array(
            //array('email, password, name, surname, phone, date, status, role, sex, image', 'required'),
            array('email, password, name, surname, role', 'required'),
            array('email, password, password2, name, surname, role', 'required', 'on' => 'registration'),
            array('email, password, name, surname, phone, date, status, role, sex, image', 'safe'),
            array('date, status', 'numerical', 'integerOnly' => true),
            array('email, password, name, surname, phone, image', 'length', 'max' => 255),
            array('email', 'unique'),
            array('email', 'email'),
            array('password', 'length', 'min' => '5'),
            array('password2', 'compare', 'compareAttribute' => 'password', 'on' => 'registration'),
            array('role', 'length', 'max' => 30),
            array('sex', 'length', 'max' => 20),
            array('id, email, password, name, surname, phone, date, status, role, sex, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Связи таблицы
     * 
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
            'email' => 'Э-почта (Логин)',
            'password' => 'Пароль',
            'password2' => 'Повторите пароль',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
            'date' => 'Дата регистрации',
            'status' => 'Статус',
            'role' => 'Роль',
            'sex' => 'Пол',
            'image' => 'Фото',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('surname', $this->surname, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('date', $this->date);
        $criteria->compare('status', $this->status);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return User статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Проверка существования email в БД
     * 
     * @param string $email - email
     * @return boolean
     */
    public static function issetEmail($email) {
        $model = User::model()->find(array('condition' => '`email`="' . $email . '"'));
        if ($model) {
            return true;
        } else {
            return false;
        }
    }

}
