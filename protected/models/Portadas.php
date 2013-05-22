<?php

/**
 * This is the model class for table "portadas".
 *
 * The followings are the available columns in table 'portadas':
 * @property integer $id
 * @property integer $gallery_photo_id
 * @property integer $boton_id
 * @property integer $boton_activo_id
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property IndexSliders[] $indexSliders
 * @property GalleryPhoto $galleryPhoto
 * @property GalleryPhoto $botonActivo
 * @property GalleryPhoto $boton
 * @property Secciones[] $secciones
 */
class Portadas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Portadas the static model class
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
		return 'portadas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_photo_id, boton_id, boton_activo_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, gallery_photo_id, boton_id, boton_activo_id, nombre', 'safe', 'on'=>'search'),
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
			'indexSliders' => array(self::HAS_MANY, 'IndexSliders', 'portada_id'),
			'galleryPhoto' => array(self::BELONGS_TO, 'GalleryPhoto', 'gallery_photo_id'),
			'botonActivo' => array(self::BELONGS_TO, 'GalleryPhoto', 'boton_activo_id'),
			'boton' => array(self::BELONGS_TO, 'GalleryPhoto', 'boton_id'),
			'secciones' => array(self::HAS_MANY, 'Secciones', 'portada_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gallery_photo_id' => 'Gallery Photo',
			'boton_id' => 'Boton',
			'boton_activo_id' => 'Boton Activo',
			'nombre' => 'Nombre',
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
		$criteria->compare('gallery_photo_id',$this->gallery_photo_id);
		$criteria->compare('boton_id',$this->boton_id);
		$criteria->compare('boton_activo_id',$this->boton_activo_id);
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}