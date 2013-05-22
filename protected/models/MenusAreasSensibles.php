<?php

/**
 * This is the model class for table "menus_areas_sensibles".
 *
 * The followings are the available columns in table 'menus_areas_sensibles':
 * @property integer $id
 * @property integer $menu_id
 * @property integer $index_slider_id
 * @property integer $x1
 * @property integer $x2
 * @property integer $y1
 * @property integer $y2
 *
 * The followings are the available model relations:
 * @property Categorias[] $categoriases
 * @property Menus $menu
 * @property IndexSliders $indexSlider
 */
class MenusAreasSensibles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MenusAreasSensibles the static model class
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
		return 'menus_areas_sensibles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_id, index_slider_id, x1, x2, y1, y2', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menu_id, index_slider_id, x1, x2, y1, y2', 'safe', 'on'=>'search'),
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
			'categorias' => array(self::HAS_MANY, 'Categorias', 'menu_area_sensible_id'),
			'menu' => array(self::BELONGS_TO, 'Menus', 'menu_id'),
			'indexSlider' => array(self::BELONGS_TO, 'IndexSliders', 'index_slider_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Menu',
			'index_slider_id' => 'Index Slider',
			'x1' => 'X1',
			'x2' => 'X2',
			'y1' => 'Y1',
			'y2' => 'Y2',
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
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('index_slider_id',$this->index_slider_id);
		$criteria->compare('x1',$this->x1);
		$criteria->compare('x2',$this->x2);
		$criteria->compare('y1',$this->y1);
		$criteria->compare('y2',$this->y2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}