<?php

/**
 * This is the model class for table "loger".
 *
 * The followings are the available columns in table 'loger':
 * @property string $id
 * @property string $userId
 * @property string $date
 * @property string $info
 * @property string $addInfo
 */
class Loger extends News {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'loger';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('userId, date, info, addInfo, header', 'required'),
            array('userId, date, info, addInfo, header, status, type, module', 'safe'),
            array('userId, date', 'length', 'max' => 10),
            array('status', 'length', 'max' => 1),
            array('addInfo, header, type, module', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, userId, date, info, addInfo, header, status, type, module', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user'=>array(self::BELONGS_TO, 'User', 'userId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'userId' => 'User',
            'date' => 'Date',
            'info' => 'Info',
            'addInfo' => 'Add Info',
            'header' => 'Header',
            'status' => 'Status',
            'type' => 'Type',
            'module' => 'Module',
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
        $criteria->compare('userId', $this->userId, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('info', $this->info, true);
        $criteria->compare('addInfo', $this->addInfo, true);
        $criteria->compare('header', $this->header, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('module', $this->module, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Loger the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
