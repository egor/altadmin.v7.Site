<?php

/**
 * UserCmsSettings. Модель для работы с таблицей "userCmsSettings".
 *
 * Ниже приведены доступные столбцы в таблице 'userCmsSettings':
 * @property string $id - id
 * @property string $userId - id пользователя из таблицы user
 * @property string $data - данные, записываются в виде json массива
 * @property string $add - дополнительная информация
 */
class UserCmsSettings extends CActiveRecord {

    /**
     * Имя текущей таблицы
     * 
     * @return строка соответствующим именем таблицы базы данных
     */
    public function tableName() {
        return 'userCmsSettings';
    }

    /**
     * Правила валидации
     * 
     * @return array правила проверки для атрибутов модели
     */
    public function rules() {
        return array(
            array('userId, data', 'required'),
            array('userId, data, add', 'safe'),
            array('userId', 'length', 'max' => 10),
            array('add', 'length', 'max' => 255),
            array('id, userId, data, add', 'safe', 'on' => 'search'),
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
            'userId' => 'id пользователя',
            'data' => 'Данные',
            'add' => 'Дополнительные данные',
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
        $criteria->compare('data', $this->data, true);
        $criteria->compare('add', $this->add, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return UserCmsSettings статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
