<?php

/**
 * This is the model class for table "botones_constantes".
 *
 * The followings are the available columns in table 'botones_constantes':
 * @property integer $id
 * @property integer $gallery_photo_id
 * @property string $clave
 *
 * The followings are the available model relations:
 * @property GalleryPhoto $galleryPhoto
 */
class BotonesConstantes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BotonesConstantes the static model class
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
		return 'botones_constantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_photo_id, clave', 'required'),
			array('gallery_photo_id,gallery_photo_activo_id', 'numerical', 'integerOnly'=>true),
			array('clave', 'length', 'max'=>45),
                        array( 'link', 'length', 'max'=> 200 ),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, gallery_photo_id, clave,gallery_photo_activo_id', 'safe', 'on'=>'search'),
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
			'galleryPhoto' => array(self::BELONGS_TO, 'GalleryPhoto', 'gallery_photo_id'),
                        'galleryPhotoActivo' => array(self::BELONGS_TO, 'GalleryPhoto', 'gallery_photo_activo_id'),
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
                        'gallery_photo_activo_id' => 'Gallery Photo',
			'clave' => 'Clave',
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
		$criteria->compare('clave',$this->clave,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}