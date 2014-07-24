<?php

/**
 * Blog. Модель для работы с таблицей "blog"
 * 
 * @package Front
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class Blog extends CActiveRecord {    
    
    /**
     * Имя текущей таблицы
     * 
     * @return строка соответствующим именем таблицы базы данных
     */
    public function tableName() {
        return 'blog';
    }

    /**
     * Правила валидации
     * 
     * @return array правила проверки для атрибутов модели
     */
    public function rules() {
        return array(
            array('url, menuName, metaTitle, header, blogSectionId', 'required'),
            array('url, menuName, text, shortText, visibility, metaTitle, metaKeywords, metaDescription, header, date, image, imageAlt, imageTitle, blogSectionId', 'safe'),
            array('visibility', 'numerical', 'integerOnly' => true),
            array('url, menuName, metaTitle, metaKeywords, header, image, imageAlt, imageTitle', 'length', 'max' => 255),
            array('blogSectionId', 'length', 'max' => 10),
            array('url', 'unique'),
            array('id, url, menuName, text, shortText, visibility, metaTitle, metaKeywords, metaDescription, header, date, image, imageAlt, imageTitle, blogSectionId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Связи таблицы
     * 
     * @return array связи таблицы
     */
    public function relations() {
        return array(
            'blogSection'=>array(self::BELONGS_TO, 'BlogSection', 'blogSectionId'),
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
            'url' => 'Url',
            'menuName' => 'Краткий заголовок',
            'text' => 'Текст',
            'shortText' => 'Краткое описание',
            'visibility' => 'Выводить',
            'metaTitle' => 'Meta Title',
            'metaKeywords' => 'Meta Keywords',
            'metaDescription' => 'Meta Description',
            'header' => 'Заголовок',
            'date' => 'Дата',
            'image' => 'Изображение списка',
            'imageAlt' => 'Alt изображения',
            'imageTitle' => 'Title изображения',
            'blogSectionId' => 'Раздел',
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
        $criteria->compare('url', $this->url, true);
        $criteria->compare('menuName', $this->menuName, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('shortText', $this->shortText, true);
        $criteria->compare('visibility', $this->visibility);
        $criteria->compare('metaTitle', $this->metaTitle, true);
        $criteria->compare('metaKeywords', $this->metaKeywords, true);
        $criteria->compare('metaDescription', $this->metaDescription, true);
        $criteria->compare('header', $this->header, true);
        $criteria->compare('date', $this->date);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('imageAlt', $this->imageAlt, true);
        $criteria->compare('imageTitle', $this->imageTitle, true);
        $criteria->compare('blogSectionId', $this->blogSectionId, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return Blog статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }    
}
