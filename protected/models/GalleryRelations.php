<?php

/**
 * This is the model class for table "galleryRelations".
 *
 * The followings are the available columns in table 'galleryRelations':
 * @property string $id
 * @property string $galleryId
 * @property string $recordId
 * @property string $type
 * @property string $position
 */
class GalleryRelations extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'galleryRelations';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('galleryId, recordId, type, position', 'required'),
            array('galleryId, recordId, position', 'length', 'max' => 10),
            array('type', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, galleryId, recordId, type, position', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'tagsRelationsCondition' => array(self::HAS_MANY, 'TagsRelations', 'recordId', 'condition' => 'type="blog"'),
            'galleryRelations'=>array(self::HAS_MANY, 'GalleryRelations', 'recordId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'galleryId' => 'Gallery',
            'recordId' => 'Record',
            'type' => 'Type',
            'position' => 'Position',
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
        $criteria->compare('galleryId', $this->galleryId, true);
        $criteria->compare('recordId', $this->recordId, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('position', $this->position, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return GalleryRelations the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    static function getGalleryId($recordId, $recordType) {
        $model = GalleryRelations::model()->find(array('condition' => 'recordId="' . $recordId . '" AND type="' . $recordType . '"'));
        if ($model) {
            return $model->galleryId;
        } else {
            return 0;
        }
    }
}
