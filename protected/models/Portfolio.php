<?php

/**
 * This is the model class for table "portfolio".
 *
 * The followings are the available columns in table 'portfolio':
 * @property string $id
 * @property string $url
 * @property string $menuName
 * @property string $header
 * @property string $shortText
 * @property string $text
 * @property string $date
 * @property string $metaTitle
 * @property string $metaKeywords
 * @property string $metaDescription
 * @property string $image
 * @property string $imageAlt
 * @property string $imageTitle
 * @property string $portfolioSectionId
 * @property integer $visibility
 */
class Portfolio extends News
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('url, menuName, header, shortText, text, date, metaTitle, metaKeywords, metaDescription, image, imageAlt, imageTitle, portfolioSectionId, visibility', 'required'),
            array('url, menuName, header, date, metaTitle, portfolioSectionId', 'required'),
            array('url, menuName, header, shortText, text, date, metaTitle, metaKeywords, metaDescription, image, imageAlt, imageTitle, imageDetail, imageDetailAlt, imageDetailTitle, portfolioSectionId, visibility', 'safe'),
			array('visibility', 'numerical', 'integerOnly'=>true),
			array('url, menuName, header, metaTitle, image, imageAlt, imageTitle, imageDetail, imageDetailAlt, imageDetailTitle', 'length', 'max'=>255),
			array('date, portfolioSectionId', 'length', 'max'=>10),
            array('url', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, url, menuName, header, shortText, text, date, metaTitle, metaKeywords, metaDescription, image, imageAlt, imageTitle, imageDetail, imageDetailAlt, imageDetailTitle, portfolioSectionId, visibility', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'portfolioSection'=>array(self::BELONGS_TO, 'PortfolioSection', 'portfolioSectionId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Url',
			'menuName' => 'Краткий заголовок',
			'header' => 'Заголовок',
			'shortText' => 'Краткое описание',
			'text' => 'Текст',
			'date' => 'Дата',
			'metaTitle' => 'Meta Title',
			'metaKeywords' => 'Meta Keywords',
			'metaDescription' => 'Meta Description',
			'image' => 'Изображение списка',
			'imageAlt' => 'Alt изображения',
			'imageTitle' => 'Title изображения',
            'imageDetail' => 'Изображение подробного описания',
			'imageDetailAlt' => 'Alt подробного изображения',
			'imageDetailTitle' => 'Title подробного изображения',
			'portfolioSectionId' => 'Раздел',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('menuName',$this->menuName,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('shortText',$this->shortText,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('metaTitle',$this->metaTitle,true);
		$criteria->compare('metaKeywords',$this->metaKeywords,true);
		$criteria->compare('metaDescription',$this->metaDescription,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('imageAlt',$this->imageAlt,true);
		$criteria->compare('imageTitle',$this->imageTitle,true);
		$criteria->compare('portfolioSectionId',$this->portfolioSectionId,true);
		$criteria->compare('visibility',$this->visibility);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Portfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
