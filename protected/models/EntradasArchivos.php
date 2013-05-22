<?php

/**
 * This is the model class for table "entradas_archivos".
 *
 * The followings are the available columns in table 'entradas_archivos':
 * @property integer $id
 * @property integer $entrada_id
 * @property integer $archivo_id
 *
 * The followings are the available model relations:
 * @property Archivos $archivo
 * @property Entradas $entrada
 */
class EntradasArchivos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntradasArchivos the static model class
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
		return 'entradas_archivos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('entrada_id, archivo_id', 'required'),
			array('entrada_id, archivo_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, entrada_id, archivo_id', 'safe', 'on'=>'search'),
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
			'archivo' => array(self::BELONGS_TO, 'Archivos', 'archivo_id'),
			'entrada' => array(self::BELONGS_TO, 'Entradas', 'entrada_id'),
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
			'archivo_id' => 'Archivo',
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
		$criteria->compare('archivo_id',$this->archivo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}