<?php

/**
 * This is the model class for table "Entradas".
 *
 * The followings are the available columns in table 'Entradas':
 * @property integer $id
 * @property integer $categoria_id
 * @property integer $entrada_antecesor_id
 * @property string $nombre
 * @property string $informacion
 * @property integer $gallery_photo_id
 *
 * The followings are the available model relations:
 * @property Categorias $categoria
 * @property Entradas $entradaAntecesor
 * @property Entradas[] $entradases
 * @property GalleryPhoto $galleryPhoto
 * @property EntradasSliders[] $entradasSliders
 */
class Entradas extends CActiveRecord
{
	public $campus;
	public $slider;
	public $upload_file;
	public $titulo;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Entradas the static model class
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
		return 'entradas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('upload_file', 'file', 'types'=>'pdf'),
			array('nombre,categoria_id', 'required'),
			array('categoria_id, entrada_antecesor_id, gallery_photo_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>150),
			array('informacion,titulo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categoria_id, entrada_antecesor_id, nombre, informacion, gallery_photo_id,upload_file', 'safe', 'on'=>'search'),
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
			'categoria' => array(self::BELONGS_TO, 'Categorias', 'categoria_id'),
			'entradaAntecesor' => array(self::BELONGS_TO, 'Entradas', 'entrada_antecesor_id'),
			'galleryPhoto' => array(self::BELONGS_TO, 'GalleryPhoto', 'gallery_photo_id'),
			'entradaSlider' => array(self::HAS_MANY, 'EntradasSliders', 'entrada_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'categoria_id' => 'Categoria',
			'entrada_antecesor_id' => 'Entrada Antecesor',
			'nombre' => 'Nombre',
			'informacion' => 'Información',
			'gallery_photo_id' => 'Imágen de la Entrada',
			'campus'=>'Campus',
			'slider'=>'Slider',
			'titulo'=>'Etiqueta para mostrar'
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
		$criteria->compare('categoria_id',$this->categoria_id);
		$criteria->compare('entrada_antecesor_id',$this->entrada_antecesor_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('informacion',$this->informacion,true);
		$criteria->compare('gallery_photo_id',$this->gallery_photo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}