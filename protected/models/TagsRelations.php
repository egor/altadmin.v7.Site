<?php

/**
 * TagsRelations. Модель для работы с таблицей "tags_relations"
 * 
 * @package Front
 * @category Tags
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class TagsRelations extends CActiveRecord {

    /**
     * Имя текущей таблицы
     * 
     * @return строка соответствующим именем таблицы базы данных
     */
    public function tableName() {
        return 'tagsRelations';
    }

    /**
     * Правила валидации
     * 
     * @return array правила проверки для атрибутов модели
     */
    public function rules() {
        return array(
            array('recordId, tagsId, position, type', 'required'),
            array('recordId, tagsId, position', 'length', 'max' => 10),
            array('type', 'length', 'max' => 255),
            array('id, recordId, tagsId, position, type', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Связи таблицы
     * 
     * @return array связи таблицы
     */
    public function relations() {
        return array(
            'tags'=>array(self::BELONGS_TO, 'Tags', 'tagsId'),
            'blog'=>array(self::BELONGS_TO, 'Blog', 'recordId'),
            //'tags' => array(self::HAS_MANY, 'Tags', 'tagsId'),
            //'tagsCount'=>array(self::STAT, 'Tags', 'tagsId'),
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
            'recordId' => 'id записи',
            'tagsId' => 'id тега',
            'position' => 'Позиция',
            'type' => 'Тип',
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
        $criteria->compare('recordId', $this->recordId, true);
        $criteria->compare('tagsId', $this->tagsId, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('type', $this->type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return TagsRelations статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
