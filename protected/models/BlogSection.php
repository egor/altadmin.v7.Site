<?php

/**
 * BlogSection. Модель для работы с таблицей "blogSection"
 * 
 * @package Front
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class BlogSection extends CActiveRecord {

    /**
     * Имя текущей таблицы
     * 
     * @return строка соответствующим именем таблицы базы данных
     */
    public function tableName() {
        return 'blogSection';
    }

    /**
     * Правила валидации
     * 
     * @return array правила проверки для атрибутов модели
     */
    public function rules() {
        return array(
            array('name, url, position, visibility', 'required'),
            array('visibility', 'numerical', 'integerOnly' => true),
            array('name, url', 'length', 'max' => 255),
            array('position', 'length', 'max' => 10),
            array('url', 'unique'),
            array('id, name, url, position, visibility', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Связи таблицы
     * 
     * @return array связи таблицы
     */
    public function relations() {
        return array(
            'blog' => array(self::HAS_MANY, 'Blog', 'blogSectionId'),
            'blogCount'=>array(self::STAT, 'Blog', 'blogSectionId'),
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
            'name' => 'Название',
            'url' => 'Url',
            'position' => 'Позиция',
            'visibility' => 'Выводить',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('visibility', $this->visibility);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return BlogSection статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
