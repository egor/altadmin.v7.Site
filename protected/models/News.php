<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $url
 * @property string $menuName
 * @property string $text
 * @property string $shortText
 * @property integer $visibility
 * @property string $metaTitle
 * @property string $metaKeywords
 * @property string $metaDescription
 * @property string $header
 * @property integer $date
 * @property string $image
 * @property string $imageAlt
 * @property string $imageTitle
 * @property string $newsSectionId
 */
class News extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('url, menuName, text, shortText, visibility, metaTitle, metaKeywords, metaDescription, header, date, image, imageAlt, imageTitle, newsSectionId', 'required'),
            //array('url, menuName, metaTitle, date, header, newsSectionId', 'required'),
            array('url, menuName, metaTitle, header, newsSectionId', 'required'),
            array('url, menuName, text, shortText, visibility, metaTitle, metaKeywords, metaDescription, header, date, image, imageAlt, imageTitle, newsSectionId', 'safe'),
            //array('visibility, date', 'numerical', 'integerOnly' => true),
            array('visibility', 'numerical', 'integerOnly' => true),
            array('url, menuName, metaTitle, metaKeywords, header, image, imageAlt, imageTitle', 'length', 'max' => 255),
            array('newsSectionId', 'length', 'max' => 10),
            array('url', 'unique'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, url, menuName, text, shortText, visibility, metaTitle, metaKeywords, metaDescription, header, date, image, imageAlt, imageTitle, newsSectionId', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'newsSection'=>array(self::BELONGS_TO, 'NewsSection', 'newsSectionId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
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
            'newsSectionId' => 'Раздел новости',
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
        $criteria->compare('newsSectionId', $this->newsSectionId, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }    
}
