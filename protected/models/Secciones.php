<?php

/**
 * This is the model class for table "secciones".
 *
 * The followings are the available columns in table 'secciones':
 * @property integer $id
 * @property integer $portada_id
 * @property integer $imagen_boton_id
 * @property integer $imagen_boton_activo_id
 * @property string $nombre
 * @property integer $orden
 * @property integer $vista_especial
 *
 * The followings are the available model relations:
 * @property Categorias[] $categoriases
 * @property Menus[] $menuses
 * @property GalleryPhoto $imagenBoton
 * @property GalleryPhoto $imagenBotonActivo
 * @property Portadas $portada
 */
class Secciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Secciones the static model class
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
		return 'secciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imagen_boton_id, imagen_boton_activo_id', 'required'),
			array('portada_id, imagen_boton_id, imagen_boton_activo_id, orden, vista_especial', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, portada_id, imagen_boton_id, imagen_boton_activo_id, nombre, orden, vista_especial', 'safe', 'on'=>'search'),
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
			'categorias' => array(self::HAS_MANY, 'Categorias', 'seccion_id'),
			'menus' => array(self::HAS_MANY, 'Menus', 'seccion_id'),
			'imagenBoton' => array(self::BELONGS_TO, 'GalleryPhoto', 'imagen_boton_id'),
			'imagenBotonActivo' => array(self::BELONGS_TO, 'GalleryPhoto', 'imagen_boton_activo_id'),
			'portada' => array(self::BELONGS_TO, 'Portadas', 'portada_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'portada_id' => 'Portada',
			'imagen_boton_id' => 'Imagen Boton',
			'imagen_boton_activo_id' => 'Imagen Boton Activo',
			'nombre' => 'Nombre',
			'orden' => 'Orden',
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
		$criteria->compare('portada_id',$this->portada_id);
		$criteria->compare('imagen_boton_id',$this->imagen_boton_id);
		$criteria->compare('imagen_boton_activo_id',$this->imagen_boton_activo_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('vista_especial',$this->vista_especial);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}