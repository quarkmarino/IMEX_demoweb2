<?php

/**
 * This is the model class for table "menus".
 *
 * The followings are the available columns in table 'menus':
 * @property integer $id
 * @property integer $seccion_id
 * @property integer $gallery_photo_id
 * @property integer $area
 *
 * The followings are the available model relations:
 * @property GalleryPhoto $galleryPhoto
 * @property Secciones $seccion
 * @property MenusAreasSensibles[] $menusAreasSensibles
 */
class Menus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menus the static model class
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
		return 'menus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seccion_id, gallery_photo_id', 'required'),
			array('seccion_id, gallery_photo_id, area', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, seccion_id, gallery_photo_id, area', 'safe', 'on'=>'search'),
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
			'seccion' => array(self::BELONGS_TO, 'Secciones', 'seccion_id'),
			'menusAreasSensibles' => array(self::HAS_MANY, 'MenusAreasSensibles', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'seccion_id' => 'Seccion',
			'gallery_photo_id' => 'Gallery Photo',
			'area' => 'Area',
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
		$criteria->compare('seccion_id',$this->seccion_id);
		$criteria->compare('gallery_photo_id',$this->gallery_photo_id);
		$criteria->compare('area',$this->area);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}