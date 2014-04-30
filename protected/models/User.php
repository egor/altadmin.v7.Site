<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property integer $date
 * @property integer $status
 * @property string $role
 * @property string $sex
 */
class User extends CActiveRecord {

    public $password2;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('email, password, name, surname, phone, date, status, role, sex, image', 'required'),
            array('email, password, password2, name, surname, role', 'required'),
            array('email, password, name, surname, phone, date, status, role, sex, image', 'safe'),
            array('date, status', 'numerical', 'integerOnly' => true),
            array('email, password, name, surname, phone, image', 'length', 'max' => 255),
            array('email', 'unique'),
            array('email', 'email'),
            array('password', 'length', 'min' => '5'),
            array('password2', 'compare', 'compareAttribute' => 'password'),
            array('role', 'length', 'max' => 30),
            array('sex', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, password, name, surname, phone, date, status, role, sex, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
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
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
