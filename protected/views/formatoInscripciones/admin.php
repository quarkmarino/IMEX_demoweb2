<?php
$this->breadcrumbs=array(
	'Formato Inscripciones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Nuevo FormatoInscripciones','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('formato-inscripciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Formato Inscripciones</h2>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'formato-inscripciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'ciclo',
		'seccion',
		'grado',
		'ya_fue_alumno',
		'motivo_de_salida',
		/*
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'fecha_nacimiento',
		'nacionalidad',
		'sexo',
		'ciudad_de_procedencia',
		'escuela_de_procedencia',
		'religion',
		'promedio_actual',
		'motivo_de_cambio',
		'calle',
		'numero_exterior',
		'numero_interior',
		'colonia',
		'codigo_postal',
		'ciudad',
		'estado',
		'pais',
		'telefono_particular',
		'nombre_tutor',
		'apellido_paterno_tutor',
		'apellido_materno_tutor',
		'fecha_nacimiento_tutor',
		'nacionalidad_tutor',
		'sexo_tutor',
		'escolaridad_tutor',
		'estado_civil_tutor',
		'ocupacion_tutor',
		'nombre_empresa_tutor',
		'puesto_tutor',
		'tiempo_laborando_tutor',
		'es_propietario',
		'telefono_empresa_tutor',
		'numero_de_hijos_tutor',
		'religion_tutor',
		'email_tutor',
		'movil_tutor',
		'nombre_conyuge',
		'apellido_paterno_conyuge',
		'apellido_materno_conyuge',
		'fecha_nacimiento_conyuge',
		'nacionalidad_conyuge',
		'sexo_conyuge',
		'escolaridad_conyuge',
		'estado_civil_conyuge',
		'ocupacion_conyuge',
		'nombre_empresa_conyuge',
		'giro_empresa_conyuge',
		'puesto_conyuge',
		'tiempo_laborando_conyuge',
		'es_propietario_conyuge',
		'telefono_empresa_conyuge',
		'numero_de_hijos_conyuge',
		'religion_conyuge',
		'email_conyuge',
		'movil_conyuge',
		'nombre_hijo1_estudiando',
		'grado_seccion_hijo1_estudiando',
		'nombre_hijo2_estudiando',
		'grado_seccion__hijo2_estudiando',
		'nombre_hijo3_estudiando',
		'grado_seccion_hijo3_estudiando',
		'nombre_hijo4_estudiando',
		'grado_seccion_hijo4_estudiando',
		'nombre_otro_hijo1_inscribir',
		'nombre_otro_hijo2_inscribir',
		'nombre_otro_hijo3_inscribir',
		'nombre_otro_hijo4_inscribir',
		'grado_seccion_otro_hijo1_inscribir',
		'grado_seccion_otro_hijo2_inscribir',
		'grado_seccion_otro_hijo3_inscribir',
		'grado_seccion_otro_hijo4_inscribir',
		'motivo_eligio_instituto',
		'medio_difusion',
		'quien_recomendo',
		'papa_ex_alumno',
		'mama_ex_alumno',
		'papa_generacion',
		'mama_generacion',
		'nombre_contacto',
		'apellido_paterno_contacto',
		'apellido_materno_contacto',
		'telefono_casa_contacto',
		'telefono_oficina_contacto',
		'movil_contacto',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{delete}'
		),
	),
)); ?>