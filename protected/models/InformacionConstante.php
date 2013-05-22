<?php

/**
 * This is the model class for table "informacion_constante".
 *
 * The followings are the available columns in table 'informacion_constante':
 * @property integer $id
 * @property string $politicas_de_privacidad
 * @property string $datos_de_ubicacion
 * @property string $link_facebook
 * @property string $link_twitter
 */
class InformacionConstante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InformacionConstante the static model class
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
		return 'informacion_constante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('link_facebook, link_twitter', 'length', 'max'=>500),
			array('politicas_de_privacidad, datos_de_ubicacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, politicas_de_privacidad, datos_de_ubicacion, link_facebook, link_twitter', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'politicas_de_privacidad' => 'Politicas De Privacidad',
			'datos_de_ubicacion' => 'Datos De Ubicacion',
			'link_facebook' => 'Link Facebook',
			'link_twitter' => 'Link Twitter',
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
		$criteria->compare('politicas_de_privacidad',$this->politicas_de_privacidad,true);
		$criteria->compare('datos_de_ubicacion',$this->datos_de_ubicacion,true);
		$criteria->compare('link_facebook',$this->link_facebook,true);
		$criteria->compare('link_twitter',$this->link_twitter,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}