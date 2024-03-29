<?php

/**
 * This is the model class for table "gallery_photo".
 *
 * The followings are the available columns in table 'gallery_photo':
 * @property integer $id
 * @property integer $gallery_id
 * @property integer $rank
 * @property string $name
 * @property string $description
 * @property string $file_name
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * The followings are the available model relations:
 * @property Entradas[] $entradases
 * @property Gallery $gallery
 * @property SlidersGalleryPhoto[] $slidersGalleryPhotos
 */
class GalleryPhoto extends CActiveRecord
{

	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryPhoto the static model class
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
		return 'gallery_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_id, name, description, file_name', 'required'),
			array('gallery_id, rank', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>512),
			array('file_name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, gallery_id, rank, name, description, file_name', 'safe', 'on'=>'search'),
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
			'entradases' => array(self::HAS_MANY, 'Entradas', 'gallery_photo_id'),
			'gallery' => array(self::BELONGS_TO, 'Gallery', 'gallery_id'),
			'slidersGalleryPhotos' => array(self::HAS_MANY, 'SlidersGalleryPhoto', 'gallery_photo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gallery_id' => 'Galería',
			'rank' => 'Orden',
			'name' => 'Nombre',
			'description' => 'Descripción',
			'file_name' => 'Nombre del Archivo',
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
		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('file_name',$this->file_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
}