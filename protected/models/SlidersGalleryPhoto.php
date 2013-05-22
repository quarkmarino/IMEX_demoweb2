<?php

/**
 * This is the model class for table "sliders_gallery_photo".
 *
 * The followings are the available columns in table 'sliders_gallery_photo':
 * @property integer $id
 * @property integer $slider_id
 * @property integer $gallery_photo_id
 *
 * The followings are the available model relations:
 * @property Sliders $slider
 * @property GalleryPhoto $galleryPhoto
 */
class SlidersGalleryPhoto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SlidersGalleryPhoto the static model class
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
		return 'sliders_gallery_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slider_id, gallery_photo_id', 'required'),
			array('slider_id, gallery_photo_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slider_id, gallery_photo_id', 'safe', 'on'=>'search'),
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
			'slider' => array(self::BELONGS_TO, 'Sliders', 'slider_id'),
			'galleryPhoto' => array(self::BELONGS_TO, 'GalleryPhoto', 'gallery_photo_id'),
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
			'gallery_photo_id' => 'Gallery Photo',
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
		$criteria->compare('gallery_photo_id',$this->gallery_photo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}