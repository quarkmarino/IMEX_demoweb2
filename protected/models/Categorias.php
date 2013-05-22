<?php

/**
 * This is the model class for table "categorias".
 *
 * The followings are the available columns in table 'categorias':
 * @property integer $id
 * @property integer $menu_area_sensible_id
 * @property integer $seccion_id
 * @property string $clave
 * @property string $nombre
 * @property integer $vista_especial
 *
 * The followings are the available model relations:
 * @property Secciones $seccion
 * @property MenusAreasSensibles $menuAreaSensible
 * @property Entradas[] $entradases
 */
class Categorias extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categorias the static model class
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
		return 'categorias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_area_sensible_id, seccion_id, vista_especial', 'numerical', 'integerOnly'=>true),
			array('clave, nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menu_area_sensible_id, seccion_id, clave, nombre, vista_especial', 'safe', 'on'=>'search'),
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
			'seccion' => array(self::BELONGS_TO, 'Secciones', 'seccion_id'),
			'menuAreaSensible' => array(self::BELONGS_TO, 'MenusAreasSensibles', 'menu_area_sensible_id'),
			'entradases' => array(self::HAS_MANY, 'Entradas', 'categoria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_area_sensible_id' => 'Menu Area Sensible',
			'seccion_id' => 'Seccion',
			'clave' => 'Clave',
			'nombre' => 'Nombre',
			'vista_especial' => 'Vista Especial',
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
		$criteria->compare('menu_area_sensible_id',$this->menu_area_sensible_id);
		$criteria->compare('seccion_id',$this->seccion_id);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('vista_especial',$this->vista_especial);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}