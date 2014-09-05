<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property string $HOSPCODE
 * @property string $CID
 * @property string $PID
 * @property string $HID
 * @property string $PRENAME
 * @property string $NAME
 * @property string $LNAME
 * @property string $HN
 * @property string $SEX
 * @property string $BIRTH
 * @property string $MSTATUS
 * @property string $OCCUPATION_OLD
 * @property string $OCCUPATION_NEW
 * @property string $RACE
 * @property string $NATION
 * @property string $RELIGION
 * @property string $EDUCATION
 * @property string $FSTATUS
 * @property string $FATHER
 * @property string $MOTHER
 * @property string $COUPLE
 * @property string $VSTATUS
 * @property string $MOVEIN
 * @property string $DISCHARGE
 * @property string $DDISCHARGE
 * @property string $ABOGROUP
 * @property string $RHGROUP
 * @property string $LABOR
 * @property string $PASSPORT
 * @property string $TYPEAREA
 * @property string $D_UPDATE
 * @property string $FLAG1
 * @property string $FLAG2
 */
class Person extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('HOSPCODE, PID, PRENAME, NAME, LNAME, SEX, BIRTH, MSTATUS, RACE, NATION, DISCHARGE, TYPEAREA, D_UPDATE', 'required'),
			array('HOSPCODE', 'length', 'max'=>5),
			array('CID, FATHER, MOTHER, COUPLE', 'length', 'max'=>13),
			array('PID, HN', 'length', 'max'=>15),
			array('HID', 'length', 'max'=>14),
			array('PRENAME, OCCUPATION_OLD, RACE, NATION', 'length', 'max'=>3),
			array('NAME, LNAME', 'length', 'max'=>50),
			array('SEX, MSTATUS, FSTATUS, VSTATUS, DISCHARGE, ABOGROUP, RHGROUP, TYPEAREA', 'length', 'max'=>1),
			array('OCCUPATION_NEW', 'length', 'max'=>4),
			array('RELIGION, EDUCATION, LABOR', 'length', 'max'=>2),
			array('PASSPORT', 'length', 'max'=>8),
			array('FLAG1, FLAG2', 'length', 'max'=>255),
			array('MOVEIN, DDISCHARGE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('HOSPCODE, CID, PID, HID, PRENAME, NAME, LNAME, HN, SEX, BIRTH, MSTATUS, OCCUPATION_OLD, OCCUPATION_NEW, RACE, NATION, RELIGION, EDUCATION, FSTATUS, FATHER, MOTHER, COUPLE, VSTATUS, MOVEIN, DISCHARGE, DDISCHARGE, ABOGROUP, RHGROUP, LABOR, PASSPORT, TYPEAREA, D_UPDATE, FLAG1, FLAG2', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		
		return array(
                     'tocsex' => array(self::BELONGS_TO, 'Csex', 'SEX'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'HOSPCODE' => 'Hospcode',
			'CID' => 'Cid',
			'PID' => 'Pid',
			'HID' => 'Hid',
			'PRENAME' => 'Prename',
			'NAME' => 'Name',
			'LNAME' => 'Lname',
			'HN' => 'Hn',
			'SEX' => 'Sex',
			'BIRTH' => 'Birth',
			'MSTATUS' => 'Mstatus',
			'OCCUPATION_OLD' => 'Occupation Old',
			'OCCUPATION_NEW' => 'Occupation New',
			'RACE' => 'Race',
			'NATION' => 'Nation',
			'RELIGION' => 'Religion',
			'EDUCATION' => 'Education',
			'FSTATUS' => 'Fstatus',
			'FATHER' => 'Father',
			'MOTHER' => 'Mother',
			'COUPLE' => 'Couple',
			'VSTATUS' => 'Vstatus',
			'MOVEIN' => 'Movein',
			'DISCHARGE' => 'Discharge',
			'DDISCHARGE' => 'Ddischarge',
			'ABOGROUP' => 'Abogroup',
			'RHGROUP' => 'Rhgroup',
			'LABOR' => 'Labor',
			'PASSPORT' => 'Passport',
			'TYPEAREA' => 'Typearea',
			'D_UPDATE' => 'D Update',
			'FLAG1' => 'Flag1',
			'FLAG2' => 'Flag2',
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

		$criteria->compare('HOSPCODE',$this->HOSPCODE,true);
		$criteria->compare('CID',$this->CID,true);
		$criteria->compare('PID',$this->PID,true);
		$criteria->compare('HID',$this->HID,true);
		$criteria->compare('PRENAME',$this->PRENAME,true);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('LNAME',$this->LNAME,true);
		$criteria->compare('HN',$this->HN,true);
		$criteria->compare('SEX',$this->SEX,true);
		$criteria->compare('BIRTH',$this->BIRTH,true);
		$criteria->compare('MSTATUS',$this->MSTATUS,true);
		$criteria->compare('OCCUPATION_OLD',$this->OCCUPATION_OLD,true);
		$criteria->compare('OCCUPATION_NEW',$this->OCCUPATION_NEW,true);
		$criteria->compare('RACE',$this->RACE,true);
		$criteria->compare('NATION',$this->NATION,true);
		$criteria->compare('RELIGION',$this->RELIGION,true);
		$criteria->compare('EDUCATION',$this->EDUCATION,true);
		$criteria->compare('FSTATUS',$this->FSTATUS,true);
		$criteria->compare('FATHER',$this->FATHER,true);
		$criteria->compare('MOTHER',$this->MOTHER,true);
		$criteria->compare('COUPLE',$this->COUPLE,true);
		$criteria->compare('VSTATUS',$this->VSTATUS,true);
		$criteria->compare('MOVEIN',$this->MOVEIN,true);
		$criteria->compare('DISCHARGE',$this->DISCHARGE,true);
		$criteria->compare('DDISCHARGE',$this->DDISCHARGE,true);
		$criteria->compare('ABOGROUP',$this->ABOGROUP,true);
		$criteria->compare('RHGROUP',$this->RHGROUP,true);
		$criteria->compare('LABOR',$this->LABOR,true);
		$criteria->compare('PASSPORT',$this->PASSPORT,true);
		$criteria->compare('TYPEAREA',$this->TYPEAREA,true);
		$criteria->compare('D_UPDATE',$this->D_UPDATE,true);
		$criteria->compare('FLAG1',$this->FLAG1,true);
		$criteria->compare('FLAG2',$this->FLAG2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Person the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
