<?php

/**
 * This is the model class for table "entradas_sliders".
 *
 * The followings are the available columns in table 'entradas_sliders':
 * @property integer $id
 * @property integer $entrada_id
 * @property integer $slider_id
 *
 * The followings are the available model relations:
 * @property Entradas $entrada
 * @property Sliders $slider
 */
class EntradasSliders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntradasSliders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entradas_sliders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slider_id', 'required'),
			array('entrada_id, slider_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, entrada_id, slider_id', 'safe', 'on'=>'search'),
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
			'entrada' => array(self::BELONGS_TO, 'Entradas', 'entrada_id'),
			'slider' => array(self::BELONGS_TO, 'Sliders', 'slider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'entrada_id' => 'Entrada',
			'slider_id' => 'Slider',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('entrada_id',$this->entrada_id);
		$criteria->compare('slider_id',$this->slider_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}