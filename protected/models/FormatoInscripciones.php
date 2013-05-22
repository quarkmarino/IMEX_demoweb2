<?php

/**
 * This is the model class for table "formato_inscripciones".
 *
 * The followings are the available columns in table 'formato_inscripciones':
 * @property integer $id
 * @property string $ciclo
 * @property string $seccion
 * @property string $grado
 * @property integer $ya_fue_alumno
 * @property string $motivo_de_salida
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $fecha_nacimiento
 * @property string $nacionalidad
 * @property string $sexo
 * @property string $ciudad_de_procedencia
 * @property string $escuela_de_procedencia
 * @property string $religion
 * @property string $promedio_actual
 * @property string $motivo_de_cambio
 * @property string $calle
 * @property string $numero_exterior
 * @property string $numero_interior
 * @property string $colonia
 * @property string $codigo_postal
 * @property string $ciudad
 * @property string $estado
 * @property string $pais
 * @property string $telefono_particular
 * @property string $nombre_tutor
 * @property string $apellido_paterno_tutor
 * @property string $apellido_materno_tutor
 * @property string $fecha_nacimiento_tutor
 * @property string $nacionalidad_tutor
 * @property string $sexo_tutor
 * @property string $escolaridad_tutor
 * @property string $estado_civil_tutor
 * @property string $ocupacion_tutor
 * @property string $nombre_empresa_tutor
 * @property string $puesto_tutor
 * @property string $tiempo_laborando_tutor
 * @property integer $es_propietario
 * @property string $telefono_empresa_tutor
 * @property integer $numero_de_hijos_tutor
 * @property string $religion_tutor
 * @property string $email_tutor
 * @property string $movil_tutor
 * @property string $nombre_conyuge
 * @property string $apellido_paterno_conyuge
 * @property string $apellido_materno_conyuge
 * @property string $fecha_nacimiento_conyuge
 * @property string $nacionalidad_conyuge
 * @property string $sexo_conyuge
 * @property string $escolaridad_conyuge
 * @property string $estado_civil_conyuge
 * @property string $ocupacion_conyuge
 * @property string $nombre_empresa_conyuge
 * @property string $giro_empresa_conyuge
 * @property string $puesto_conyuge
 * @property string $tiempo_laborando_conyuge
 * @property integer $es_propietario_conyuge
 * @property string $telefono_empresa_conyuge
 * @property integer $numero_de_hijos_conyuge
 * @property string $religion_conyuge
 * @property string $email_conyuge
 * @property string $movil_conyuge
 * @property string $nombre_hijo1_estudiando
 * @property string $grado_seccion_hijo1_estudiando
 * @property string $nombre_hijo2_estudiando
 * @property string $grado_seccion__hijo2_estudiando
 * @property string $nombre_hijo3_estudiando
 * @property string $grado_seccion_hijo3_estudiando
 * @property string $nombre_hijo4_estudiando
 * @property string $grado_seccion_hijo4_estudiando
 * @property string $nombre_otro_hijo1_inscribir
 * @property string $nombre_otro_hijo2_inscribir
 * @property string $nombre_otro_hijo3_inscribir
 * @property string $nombre_otro_hijo4_inscribir
 * @property string $grado_seccion_otro_hijo1_inscribir
 * @property string $grado_seccion_otro_hijo2_inscribir
 * @property string $grado_seccion_otro_hijo3_inscribir
 * @property string $grado_seccion_otro_hijo4_inscribir
 * @property string $motivo_eligio_instituto
 * @property string $medio_difusion
 * @property string $quien_recomendo
 * @property integer $papa_ex_alumno
 * @property integer $mama_ex_alumno
 * @property string $papa_generacion
 * @property string $mama_generacion
 * @property string $nombre_contacto
 * @property string $apellido_paterno_contacto
 * @property string $apellido_materno_contacto
 * @property string $telefono_casa_contacto
 * @property string $telefono_oficina_contacto
 * @property string $movil_contacto
 */
class FormatoInscripciones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FormatoInscripciones the static model class
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
		return 'formato_inscripciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('campus,ya_fue_alumno,fecha_nacimiento,fecha_nacimiento_tutor,fecha_nacimiento_conyuge,seccion,grado,nombre,apellido_paterno,nombre_tutor,apellido_paterno_tutor,ciclo', 'required'),
				
			array('fecha_nacimiento,fecha_nacimiento_tutor,fecha_nacimiento_conyuge','date', 'format'=>'yyyy-m-d'),
			array('ya_fue_alumno, es_propietario, numero_de_hijos_tutor, es_propietario_conyuge, numero_de_hijos_conyuge, papa_ex_alumno, mama_ex_alumno', 'numerical', 'integerOnly'=>true),
			array('ciclo, telefono_particular, telefono_empresa_tutor, telefono_empresa_conyuge', 'length', 'max'=>25),
			array('seccion, grado, apellido_paterno, apellido_materno, ciudad_de_procedencia, religion, promedio_actual, calle, colonia, ciudad, estado, pais, nombre_tutor, apellido_paterno_tutor, apellido_materno_tutor, nacionalidad_tutor, estado_civil_tutor, ocupacion_tutor, puesto_tutor, religion_tutor, email_tutor, movil_tutor, nombre_conyuge, apellido_paterno_conyuge, apellido_materno_conyuge, nacionalidad_conyuge, escolaridad_conyuge, estado_civil_conyuge, ocupacion_conyuge, giro_empresa_conyuge, puesto_conyuge, religion_conyuge, email_conyuge, movil_conyuge, grado_seccion_hijo1_estudiando, grado_seccion__hijo2_estudiando, grado_seccion_hijo3_estudiando, grado_seccion_hijo4_estudiando, grado_seccion_otro_hijo1_inscribir, grado_seccion_otro_hijo2_inscribir, grado_seccion_otro_hijo3_inscribir, grado_seccion_otro_hijo4_inscribir, papa_generacion, mama_generacion, nombre_contacto, apellido_paterno_contacto, apellido_materno_contacto, telefono_casa_contacto, telefono_oficina_contacto, movil_contacto', 'length', 'max'=>45),
			array('motivo_de_salida, motivo_de_cambio, motivo_eligio_instituto, medio_difusion', 'length', 'max'=>500),
			array('nombre, escuela_de_procedencia, nombre_hijo1_estudiando, nombre_hijo2_estudiando, nombre_hijo3_estudiando, nombre_hijo4_estudiando, nombre_otro_hijo1_inscribir, nombre_otro_hijo2_inscribir, nombre_otro_hijo3_inscribir, nombre_otro_hijo4_inscribir, quien_recomendo', 'length', 'max'=>150),
			array('nacionalidad', 'length', 'max'=>75),
			array('sexo, sexo_tutor, sexo_conyuge', 'length', 'max'=>1),
			array('numero_exterior, numero_interior, codigo_postal', 'length', 'max'=>10),
			array('escolaridad_tutor, nombre_empresa_tutor, nombre_empresa_conyuge', 'length', 'max'=>85),
			array('tiempo_laborando_tutor, tiempo_laborando_conyuge', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('campus,id, ciclo, seccion, grado, ya_fue_alumno, motivo_de_salida, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, nacionalidad, sexo, ciudad_de_procedencia, escuela_de_procedencia, religion, promedio_actual, motivo_de_cambio, calle, numero_exterior, numero_interior, colonia, codigo_postal, ciudad, estado, pais, telefono_particular, nombre_tutor, apellido_paterno_tutor, apellido_materno_tutor, fecha_nacimiento_tutor, nacionalidad_tutor, sexo_tutor, escolaridad_tutor, estado_civil_tutor, ocupacion_tutor, nombre_empresa_tutor, puesto_tutor, tiempo_laborando_tutor, es_propietario, telefono_empresa_tutor, numero_de_hijos_tutor, religion_tutor, email_tutor, movil_tutor, nombre_conyuge, apellido_paterno_conyuge, apellido_materno_conyuge, fecha_nacimiento_conyuge, nacionalidad_conyuge, sexo_conyuge, escolaridad_conyuge, estado_civil_conyuge, ocupacion_conyuge, nombre_empresa_conyuge, giro_empresa_conyuge, puesto_conyuge, tiempo_laborando_conyuge, es_propietario_conyuge, telefono_empresa_conyuge, numero_de_hijos_conyuge, religion_conyuge, email_conyuge, movil_conyuge, nombre_hijo1_estudiando, grado_seccion_hijo1_estudiando, nombre_hijo2_estudiando, grado_seccion__hijo2_estudiando, nombre_hijo3_estudiando, grado_seccion_hijo3_estudiando, nombre_hijo4_estudiando, grado_seccion_hijo4_estudiando, nombre_otro_hijo1_inscribir, nombre_otro_hijo2_inscribir, nombre_otro_hijo3_inscribir, nombre_otro_hijo4_inscribir, grado_seccion_otro_hijo1_inscribir, grado_seccion_otro_hijo2_inscribir, grado_seccion_otro_hijo3_inscribir, grado_seccion_otro_hijo4_inscribir, motivo_eligio_instituto, medio_difusion, quien_recomendo, papa_ex_alumno, mama_ex_alumno, papa_generacion, mama_generacion, nombre_contacto, apellido_paterno_contacto, apellido_materno_contacto, telefono_casa_contacto, telefono_oficina_contacto, movil_contacto', 'safe', 'on'=>'search'),
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
			'ciclo' => 'Ciclo',
			'seccion' => 'Seccion',
			'grado' => 'Grado',
			'ya_fue_alumno' => '¿Ya fue Alumno del Instituto?',
			'motivo_de_salida' => '¿Cuál fue el motivo de su salida?',
			'nombre' => 'Nombre (s)',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'fecha_nacimiento' => 'Fecha de Nacimiento',
			'nacionalidad' => 'Nacionalidad',
			'sexo' => 'Sexo',
			'ciudad_de_procedencia' => 'Ciudad de Procedencia',
			'escuela_de_procedencia' => 'Escuela de Procedencia',
			'religion' => 'Religión',
			'promedio_actual' => 'Promedio Actual',
			'motivo_de_cambio' => 'Motivo del Cambio',
			'calle' => 'Calle',
			'numero_exterior' => 'Número Exterior',
			'numero_interior' => 'Número Interior',
			'colonia' => 'Colonia',
			'codigo_postal' => 'Código Postal',
			'ciudad' => 'Ciudad',
			'estado' => 'Estado',
			'pais' => 'País',
			'telefono_particular' => 'Teléfono Particular',
			'nombre_tutor' => 'Nombre (s)',
			'apellido_paterno_tutor' => 'Apellido Paterno',
			'apellido_materno_tutor' => 'Apellido Materno',
			'fecha_nacimiento_tutor' => 'Fecha de Nacimiento',
			'nacionalidad_tutor' => 'Nacionalidad',
			'sexo_tutor' => 'Sexo',
			'escolaridad_tutor' => 'Escolaridad',
			'estado_civil_tutor' => 'Estado Civil',
			'ocupacion_tutor' => 'Ocupación',
			'nombre_empresa_tutor' => 'Nombre de la Empresa',
			'puesto_tutor' => 'Puesto',
			'tiempo_laborando_tutor' => 'Tiempo que lleva Laborando',
			'es_propietario' => 'Dueño de la Empresa',
			'telefono_empresa_tutor' => 'Teléfono de la Empresa',
			'numero_de_hijos_tutor' => 'No. de Hijos',
			'religion_tutor' => 'Religión',
			'email_tutor' => 'Correo electrónico',
			'movil_tutor' => 'Teléfono Celular',
			'nombre_conyuge' => 'Nombre (s)',
			'apellido_paterno_conyuge' => 'Apellido Paterno',
			'apellido_materno_conyuge' => 'Apellido Materno',
			'fecha_nacimiento_conyuge' => 'Fecha de Nacimiento',
			'nacionalidad_conyuge' => 'Nacionalidad',
			'sexo_conyuge' => 'Sexo',
			'escolaridad_conyuge' => 'Escolaridad',
			'estado_civil_conyuge' => 'Estado Civil',
			'ocupacion_conyuge' => 'Ocupación',
			'nombre_empresa_conyuge' => 'Nombre de la Empresa',
			'giro_empresa_conyuge' => 'Giro de la Empresa',
			'puesto_conyuge' => 'Puesto',
			'tiempo_laborando_conyuge' => 'Tiempo que lleva Laborando',
			'es_propietario_conyuge' => 'Dueño de la Empresa',
			'telefono_empresa_conyuge' => 'Teléfono de la Empresa',
			'numero_de_hijos_conyuge' => 'No. de Hijos',
			'religion_conyuge' => 'Religión',
			'email_conyuge' => 'Correo electrónico',
			'movil_conyuge' => 'Teléfono celular',
			'nombre_hijo1_estudiando' => 'Nombre',
			'grado_seccion_hijo1_estudiando' => 'Grado y Sección',
			'nombre_hijo2_estudiando' => 'Nombre',
			'grado_seccion__hijo2_estudiando' => 'Grado y Sección',
			'nombre_hijo3_estudiando' => 'Nombre',
			'grado_seccion_hijo3_estudiando' => 'Grado y Sección',
			'nombre_hijo4_estudiando' => 'Nombre',
			'grado_seccion_hijo4_estudiando' => 'Grado y Sección',
			'nombre_otro_hijo1_inscribir' => 'Nombre',
			'nombre_otro_hijo2_inscribir' => 'Nombre',
			'nombre_otro_hijo3_inscribir' => 'Nombre',
			'nombre_otro_hijo4_inscribir' => 'Nombre',
			'grado_seccion_otro_hijo1_inscribir' => 'Grado y Sección',
			'grado_seccion_otro_hijo2_inscribir' => 'Grado y Sección',
			'grado_seccion_otro_hijo3_inscribir' => 'Grado y Sección',
			'grado_seccion_otro_hijo4_inscribir' => 'Grado y Sección',
			'motivo_eligio_instituto' => 'Motivo por el cual escogió la Institución',
			'medio_difusion' => '¿Por qué medio  se enteró del INSTITUTO MÉXICO?',
			'quien_recomendo' => '¿Quién lo Recomendó?',
			'papa_ex_alumno' => 'Papa Ex Alumno',
			'mama_ex_alumno' => 'Mama Ex Alumno',
			'papa_generacion' => 'Papa Generacion',
			'mama_generacion' => 'Mama Generacion',
			'nombre_contacto' => 'Nombre (s)',
			'apellido_paterno_contacto' => 'Apellido Paterno',
			'apellido_materno_contacto' => 'Apellido Materno',
			'telefono_casa_contacto' => 'Teléfono de Casa',
			'telefono_oficina_contacto' => 'Teléfono de la Oficina',
			'movil_contacto' => 'Teléfono Celular',
			'campus'=>'Campus'
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
		$criteria->compare('ciclo',$this->ciclo,true);
		$criteria->compare('seccion',$this->seccion,true);
		$criteria->compare('grado',$this->grado,true);
		$criteria->compare('ya_fue_alumno',$this->ya_fue_alumno);
		$criteria->compare('motivo_de_salida',$this->motivo_de_salida,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('ciudad_de_procedencia',$this->ciudad_de_procedencia,true);
		$criteria->compare('escuela_de_procedencia',$this->escuela_de_procedencia,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('promedio_actual',$this->promedio_actual,true);
		$criteria->compare('motivo_de_cambio',$this->motivo_de_cambio,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('numero_exterior',$this->numero_exterior,true);
		$criteria->compare('numero_interior',$this->numero_interior,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('codigo_postal',$this->codigo_postal,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('telefono_particular',$this->telefono_particular,true);
		$criteria->compare('nombre_tutor',$this->nombre_tutor,true);
		$criteria->compare('apellido_paterno_tutor',$this->apellido_paterno_tutor,true);
		$criteria->compare('apellido_materno_tutor',$this->apellido_materno_tutor,true);
		$criteria->compare('fecha_nacimiento_tutor',$this->fecha_nacimiento_tutor,true);
		$criteria->compare('nacionalidad_tutor',$this->nacionalidad_tutor,true);
		$criteria->compare('sexo_tutor',$this->sexo_tutor,true);
		$criteria->compare('escolaridad_tutor',$this->escolaridad_tutor,true);
		$criteria->compare('estado_civil_tutor',$this->estado_civil_tutor,true);
		$criteria->compare('ocupacion_tutor',$this->ocupacion_tutor,true);
		$criteria->compare('nombre_empresa_tutor',$this->nombre_empresa_tutor,true);
		$criteria->compare('puesto_tutor',$this->puesto_tutor,true);
		$criteria->compare('tiempo_laborando_tutor',$this->tiempo_laborando_tutor,true);
		$criteria->compare('es_propietario',$this->es_propietario);
		$criteria->compare('telefono_empresa_tutor',$this->telefono_empresa_tutor,true);
		$criteria->compare('numero_de_hijos_tutor',$this->numero_de_hijos_tutor);
		$criteria->compare('religion_tutor',$this->religion_tutor,true);
		$criteria->compare('email_tutor',$this->email_tutor,true);
		$criteria->compare('movil_tutor',$this->movil_tutor,true);
		$criteria->compare('nombre_conyuge',$this->nombre_conyuge,true);
		$criteria->compare('apellido_paterno_conyuge',$this->apellido_paterno_conyuge,true);
		$criteria->compare('apellido_materno_conyuge',$this->apellido_materno_conyuge,true);
		$criteria->compare('fecha_nacimiento_conyuge',$this->fecha_nacimiento_conyuge,true);
		$criteria->compare('nacionalidad_conyuge',$this->nacionalidad_conyuge,true);
		$criteria->compare('sexo_conyuge',$this->sexo_conyuge,true);
		$criteria->compare('escolaridad_conyuge',$this->escolaridad_conyuge,true);
		$criteria->compare('estado_civil_conyuge',$this->estado_civil_conyuge,true);
		$criteria->compare('ocupacion_conyuge',$this->ocupacion_conyuge,true);
		$criteria->compare('nombre_empresa_conyuge',$this->nombre_empresa_conyuge,true);
		$criteria->compare('giro_empresa_conyuge',$this->giro_empresa_conyuge,true);
		$criteria->compare('puesto_conyuge',$this->puesto_conyuge,true);
		$criteria->compare('tiempo_laborando_conyuge',$this->tiempo_laborando_conyuge,true);
		$criteria->compare('es_propietario_conyuge',$this->es_propietario_conyuge);
		$criteria->compare('telefono_empresa_conyuge',$this->telefono_empresa_conyuge,true);
		$criteria->compare('numero_de_hijos_conyuge',$this->numero_de_hijos_conyuge);
		$criteria->compare('religion_conyuge',$this->religion_conyuge,true);
		$criteria->compare('email_conyuge',$this->email_conyuge,true);
		$criteria->compare('movil_conyuge',$this->movil_conyuge,true);
		$criteria->compare('nombre_hijo1_estudiando',$this->nombre_hijo1_estudiando,true);
		$criteria->compare('grado_seccion_hijo1_estudiando',$this->grado_seccion_hijo1_estudiando,true);
		$criteria->compare('nombre_hijo2_estudiando',$this->nombre_hijo2_estudiando,true);
		$criteria->compare('grado_seccion__hijo2_estudiando',$this->grado_seccion__hijo2_estudiando,true);
		$criteria->compare('nombre_hijo3_estudiando',$this->nombre_hijo3_estudiando,true);
		$criteria->compare('grado_seccion_hijo3_estudiando',$this->grado_seccion_hijo3_estudiando,true);
		$criteria->compare('nombre_hijo4_estudiando',$this->nombre_hijo4_estudiando,true);
		$criteria->compare('grado_seccion_hijo4_estudiando',$this->grado_seccion_hijo4_estudiando,true);
		$criteria->compare('nombre_otro_hijo1_inscribir',$this->nombre_otro_hijo1_inscribir,true);
		$criteria->compare('nombre_otro_hijo2_inscribir',$this->nombre_otro_hijo2_inscribir,true);
		$criteria->compare('nombre_otro_hijo3_inscribir',$this->nombre_otro_hijo3_inscribir,true);
		$criteria->compare('nombre_otro_hijo4_inscribir',$this->nombre_otro_hijo4_inscribir,true);
		$criteria->compare('grado_seccion_otro_hijo1_inscribir',$this->grado_seccion_otro_hijo1_inscribir,true);
		$criteria->compare('grado_seccion_otro_hijo2_inscribir',$this->grado_seccion_otro_hijo2_inscribir,true);
		$criteria->compare('grado_seccion_otro_hijo3_inscribir',$this->grado_seccion_otro_hijo3_inscribir,true);
		$criteria->compare('grado_seccion_otro_hijo4_inscribir',$this->grado_seccion_otro_hijo4_inscribir,true);
		$criteria->compare('motivo_eligio_instituto',$this->motivo_eligio_instituto,true);
		$criteria->compare('medio_difusion',$this->medio_difusion,true);
		$criteria->compare('quien_recomendo',$this->quien_recomendo,true);
		$criteria->compare('papa_ex_alumno',$this->papa_ex_alumno);
		$criteria->compare('mama_ex_alumno',$this->mama_ex_alumno);
		$criteria->compare('papa_generacion',$this->papa_generacion,true);
		$criteria->compare('mama_generacion',$this->mama_generacion,true);
		$criteria->compare('nombre_contacto',$this->nombre_contacto,true);
		$criteria->compare('apellido_paterno_contacto',$this->apellido_paterno_contacto,true);
		$criteria->compare('apellido_materno_contacto',$this->apellido_materno_contacto,true);
		$criteria->compare('telefono_casa_contacto',$this->telefono_casa_contacto,true);
		$criteria->compare('telefono_oficina_contacto',$this->telefono_oficina_contacto,true);
		$criteria->compare('movil_contacto',$this->movil_contacto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}