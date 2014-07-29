<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property string $id
 * @property string $pid
 * @property string $userName
 * @property string $userEmail
 * @property string $text
 * @property string $userId
 * @property integer $visibility
 * @property string $date
 * @property string $type
 * @property string $recordId
 * @property string $info
 */
class Comment extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'comment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('pid, userName, userEmail, text, userId, visibility, date, type, recordId, info', 'required'),
            array('userName', 'required', 'on' => 'addNoAuthUserComment', 'message'=>FrontEditFields::getSettings('CommentSettings', 'nameError')),
            array('userEmail', 'required', 'on' => 'addNoAuthUserComment', 'message'=>FrontEditFields::getSettings('CommentSettings', 'emailError')),
            array('userEmail', 'email', 'message'=>FrontEditFields::getSettings('CommentSettings', 'emailError')),
            array('text', 'required', 'message'=>FrontEditFields::getSettings('CommentSettings', 'textError')),

            array('text, date, type, recordId', 'required'),
            array('text, date, type, recordId, userId', 'required', 'on' => 'addAuthUserComment'),
            array('text, date, type, recordId, userName, userEmail', 'required', 'on' => 'addNoAuthUserComment'),
            array('pid, userName, userEmail, text, userId, visibility, date, type, recordId, info, new', 'safe'),
            array('visibility, new', 'numerical', 'integerOnly' => true),
            array('pid, userId, date, recordId', 'length', 'max' => 10),
            array('userName, userEmail, type, info', 'length', 'max' => 255),
            array('userEmail', 'email'),
            
            
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, pid, userName, userEmail, text, userId, visibility, date, type, recordId, info, new', 'safe', 'on' => 'search'),
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
            'blog'=>array(self::BELONGS_TO, 'Blog', 'recordId'),
            'news'=>array(self::BELONGS_TO, 'News', 'recordId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'pid' => 'Pid',
            'userName' => FrontEditFields::getSettings('CommentSettings', 'nameLabel'),//'Имя',
            'userEmail' => FrontEditFields::getSettings('CommentSettings', 'emailLabel'),//'Э-почта',
            'text' => FrontEditFields::getSettings('CommentSettings', 'textLabel'),//'Комментарий',
            'userId' => 'User',
            'visibility' => 'Выводить',
            'date' => 'Дата',
            'type' => 'Тип',
            'recordId' => 'Record',
            'info' => 'Info',
            'new' => 'Новый',
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
        $criteria->compare('pid', $this->pid, true);
        $criteria->compare('userName', $this->userName, true);
        $criteria->compare('userEmail', $this->userEmail, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('userId', $this->userId, true);
        $criteria->compare('visibility', $this->visibility);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('recordId', $this->recordId, true);
        $criteria->compare('info', $this->info, true);
        $criteria->compare('new', $this->new, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
