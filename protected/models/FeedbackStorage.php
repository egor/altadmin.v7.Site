<?php

/**
 * This is the model class for table "feedbackStorage".
 *
 * The followings are the available columns in table 'feedbackStorage':
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $text
 * @property string $addInfo
 * @property string $date
 * @property integer $new
 */
class FeedbackStorage extends News
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'feedbackStorage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name, email, phone, text, addInfo, date, new', 'required'),
            array('name, email, text, date', 'required'),
            array('name, email, phone, text, addInfo, date, new, trash', 'safe'),
			array('new, trash', 'numerical', 'integerOnly'=>true),
			array('name, email, phone', 'length', 'max'=>255),
			array('date', 'length', 'max'=>10),
            array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, phone, text, addInfo, date, new, trash', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'email' => 'Э-почта',
			'phone' => 'Телефон',
			'text' => 'Текст',
			'addInfo' => 'Дополнительная информация',
			'date' => 'Дата',
			'new' => 'Новое',
            'trash' => 'В корзине',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('addInfo',$this->addInfo,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('new',$this->new);
        $criteria->compare('trash',$this->trash);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FeedbackStorage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
