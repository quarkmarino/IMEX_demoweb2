<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $nombre_de_usuario
 * @property string $password
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $calle_y_numero
 * @property string $colonia
 * @property string $codigo_postal
 * @property string $ciudad
 * @property string $estado
 * @property string $telefono
 * @property string $celular
 * @property string $correo_electronico
 * @property string $generacion
 * @property string $puesto
 * @property string $empresa
 * @property string $codigo_de_seguridad
 */
class Usuarios extends CActiveRecord
{
	public $validacion;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
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
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('id, nombre_de_usuario, password, nombre, apellido_paterno, apellido_materno, calle_y_numero, colonia, codigo_postal, ciudad, estado, telefono, celular, correo_electronico, generacion, puesto, empresa, codigo_de_seguridad', 'safe', 'on'=>'registerwcaptcha'),				
			array('validacion','application.extensions.recaptcha.EReCaptchaValidator','privateKey'=>'6LecWtkSAAAAALOQL0iKitfCYal7Huu0lbzbWeIa','on' => 'registerwcaptcha'),
			array('nombre_de_usuario, password,nombre,calle_y_numero,colonia,codigo_postal,ciudad,estado,telefono,correo_electronico,generacion,empresa', 'required'),
			array('nombre_de_usuario, password, apellido_paterno, apellido_materno, colonia, ciudad, estado, telefono, celular, generacion, puesto, codigo_de_seguridad', 'length', 'max'=>45),
			array('nombre', 'length', 'max'=>75),
			array('calle_y_numero, correo_electronico, empresa', 'length', 'max'=>150),
			array('codigo_postal', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre_de_usuario, password, nombre, apellido_paterno, apellido_materno, calle_y_numero, colonia, codigo_postal, ciudad, estado, telefono, celular, correo_electronico, generacion, puesto, empresa, codigo_de_seguridad, twitter, facebook', 'safe', 'on'=>'search'),
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
			'nombre_de_usuario' => 'Nombre de usuario',
			'password' => 'Password',
			'nombre' => 'Nombre',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'calle_y_numero' => 'Calle y número',
			'colonia' => 'Colonia',
			'codigo_postal' => 'Código Postal',
			'ciudad' => 'Ciudad',
			'estado' => 'Estado',
			'telefono' => 'Teléfono',
			'celular' => 'Celular',
			'correo_electronico' => 'Correo electrónico',
			'generacion' => 'Generación',
			'puesto' => 'Puesto',
			'empresa' => 'Empresa',
			'codigo_de_seguridad' => 'Código de seguridad',
			'twitter' => 'Twitter',
			'facebook' => 'Facebook',
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
		$criteria->compare('nombre_de_usuario',$this->nombre_de_usuario,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('calle_y_numero',$this->calle_y_numero,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('codigo_postal',$this->codigo_postal,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo_electronico',$this->correo_electronico,true);
		$criteria->compare('generacion',$this->generacion,true);
		$criteria->compare('puesto',$this->puesto,true);
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('codigo_de_seguridad',$this->codigo_de_seguridad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}