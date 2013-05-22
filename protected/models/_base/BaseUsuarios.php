<?php

/**
 * This is the model base class for the table "usuarios".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Usuarios".
 *
 * Columns in table "usuarios" available as properties of the model,
 * followed by relations of table "usuarios" available as properties of the model.
 *
 * @property integer $id
 * @property integer $organigrama_id
 * @property integer $puesto_id
 * @property string $email
 * @property string $password
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $nombre
 * @property string $fecha_registro
 * @property string $llave_de_activacion
 * @property integer $reporta_a_usuario_id
 * @property integer $activo
 * @property integer $es_interno
 *
 * @property Perfiles[] $perfiles
 * @property Organigrama $organigrama
 * @property Puestos $puesto
 * @property UsuariosRecursosPermisos[] $usuariosRecursosPermisoses
 * @property Permisos[] $permisoses
 * @property AvisosDestinatarios[] $avisosDestinatarioses
 */
abstract class BaseUsuarios extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'usuarios';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Usuarios|Usuarioses', $n);
	}

	public static function representingColumn() {
		return 'email';
	}

	public function rules() {
		return array(
			array('email, password, apellido_paterno, nombre', 'required'),
			array('organigrama_id, puesto_id, reporta_a_usuario_id, activo, es_interno', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>100),
			array('password', 'length', 'max'=>64),
			array('apellido_paterno, apellido_materno, nombre, llave_de_activacion', 'length', 'max'=>45),
			array('fecha_registro', 'safe'),
			array('organigrama_id, puesto_id, apellido_materno, fecha_registro, llave_de_activacion, reporta_a_usuario_id, activo, es_interno', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, organigrama_id, puesto_id, email, password, apellido_paterno, apellido_materno, nombre, fecha_registro, llave_de_activacion, reporta_a_usuario_id, activo, es_interno', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'perfiles' => array(self::MANY_MANY, 'Perfiles', 'usuarios_perfiles(usuario_id, perfil_id)'),
			'organigrama' => array(self::BELONGS_TO, 'Organigrama', 'organigrama_id'),
			'puesto' => array(self::BELONGS_TO, 'Puestos', 'puesto_id'),
			'usuariosRecursosPermisoses' => array(self::HAS_MANY, 'UsuariosRecursosPermisos', 'usuario_id'),
			'permisoses' => array(self::MANY_MANY, 'Permisos', 'usuarios_permisos(usuario_id, permiso_id)'),
			'avisosDestinatarioses' => array(self::HAS_MANY, 'AvisosDestinatarios', 'usuario_id'),
		);
	}

	public function pivotModels() {
		return array(
			'perfiles' => 'UsuariosPerfiles',
			'permisoses' => 'UsuariosPermisos',
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'organigrama_id' => null,
			'puesto_id' => null,
			'email' => Yii::t('app', 'Email'),
			'password' => Yii::t('app', 'Password'),
			'apellido_paterno' => Yii::t('app', 'Apellido Paterno'),
			'apellido_materno' => Yii::t('app', 'Apellido Materno'),
			'nombre' => Yii::t('app', 'Nombre'),
			'fecha_registro' => Yii::t('app', 'Fecha Registro'),
			'llave_de_activacion' => Yii::t('app', 'Llave De Activacion'),
			'reporta_a_usuario_id' => Yii::t('app', 'Reporta A Usuario'),
			'activo' => Yii::t('app', 'Activo'),
			'es_interno' => Yii::t('app', 'Es Interno'),
			'perfiles' => null,
			'organigrama' => null,
			'puesto' => null,
			'usuariosRecursosPermisoses' => null,
			'permisoses' => null,
			'avisosDestinatarioses' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('organigrama_id', $this->organigrama_id);
		$criteria->compare('puesto_id', $this->puesto_id);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('apellido_paterno', $this->apellido_paterno, true);
		$criteria->compare('apellido_materno', $this->apellido_materno, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('fecha_registro', $this->fecha_registro, true);
		$criteria->compare('llave_de_activacion', $this->llave_de_activacion, true);
		$criteria->compare('reporta_a_usuario_id', $this->reporta_a_usuario_id);
		$criteria->compare('activo', $this->activo);
		$criteria->compare('es_interno', $this->es_interno);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}