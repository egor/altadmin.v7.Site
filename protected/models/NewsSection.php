<?php

/**
 * This is the model class for table "newsSection".
 *
 * The followings are the available columns in table 'newsSection':
 * @property string $id
 * @property string $name
 * @property string $url
 * @property string $position
 * @property integer $visibility
 */
class NewsSection extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'newsSection';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, url, position, visibility', 'required'),
            array('visibility', 'numerical', 'integerOnly' => true),
            array('name, url', 'length', 'max' => 255),
            array('position', 'length', 'max' => 10),
            array('url', 'unique'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, url, position, visibility', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'news' => array(self::HAS_MANY, 'News', 'newsSectionId'),
            'newsCount'=>array(self::STAT, 'News', 'newsSectionId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
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
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NewsSection the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
