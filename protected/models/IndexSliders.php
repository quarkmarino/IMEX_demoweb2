<?php

/**
 * This is the model class for table "index_sliders".
 *
 * The followings are the available columns in table 'index_sliders':
 * @property integer $id
 * @property integer $slider_id
 * @property integer $area
 * @property integer $portada_id
 *
 * The followings are the available model relations:
 * @property Portadas $portada
 * @property Sliders $slider
 */
class IndexSliders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IndexSliders the static model class
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
		return 'index_sliders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slider_id, area', 'required'),
			array('slider_id, area, portada_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slider_id, area, portada_id', 'safe', 'on'=>'search'),
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
			'portada' => array(self::BELONGS_TO, 'Portadas', 'portada_id'),
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
			'slider_id' => 'Slider',
			'area' => 'Area',
			'portada_id' => 'Portada',
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
		$criteria->compare('slider_id',$this->slider_id);
		$criteria->compare('area',$this->area);
		$criteria->compare('portada_id',$this->portada_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}