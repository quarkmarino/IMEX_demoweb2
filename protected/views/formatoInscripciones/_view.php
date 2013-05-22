<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciclo')); ?>:</b>
	<?php echo CHtml::encode($data->ciclo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion')); ?>:</b>
	<?php echo CHtml::encode($data->seccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado')); ?>:</b>
	<?php echo CHtml::encode($data->grado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ya_fue_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->ya_fue_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_de_salida')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_de_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_paterno')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_paterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_materno')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_materno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_de_procedencia')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad_de_procedencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escuela_de_procedencia')); ?>:</b>
	<?php echo CHtml::encode($data->escuela_de_procedencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion')); ?>:</b>
	<?php echo CHtml::encode($data->religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promedio_actual')); ?>:</b>
	<?php echo CHtml::encode($data->promedio_actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_de_cambio')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_de_cambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calle')); ?>:</b>
	<?php echo CHtml::encode($data->calle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_exterior')); ?>:</b>
	<?php echo CHtml::encode($data->numero_exterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_interior')); ?>:</b>
	<?php echo CHtml::encode($data->numero_interior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colonia')); ?>:</b>
	<?php echo CHtml::encode($data->colonia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_postal')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_postal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_particular')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_particular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_paterno_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_paterno_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_materno_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_materno_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->sexo_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escolaridad_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->escolaridad_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_civil_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->estado_civil_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ocupacion_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->ocupacion_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_empresa_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_empresa_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puesto_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->puesto_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_laborando_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo_laborando_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_propietario')); ?>:</b>
	<?php echo CHtml::encode($data->es_propietario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_empresa_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_empresa_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_de_hijos_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->numero_de_hijos_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->religion_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->email_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movil_tutor')); ?>:</b>
	<?php echo CHtml::encode($data->movil_tutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_paterno_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_paterno_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_materno_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_materno_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nacionalidad_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->nacionalidad_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->sexo_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escolaridad_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->escolaridad_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_civil_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->estado_civil_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ocupacion_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->ocupacion_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_empresa_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_empresa_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('giro_empresa_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->giro_empresa_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puesto_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->puesto_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_laborando_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo_laborando_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_propietario_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->es_propietario_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_empresa_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_empresa_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_de_hijos_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->numero_de_hijos_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->religion_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->email_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movil_conyuge')); ?>:</b>
	<?php echo CHtml::encode($data->movil_conyuge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_hijo1_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_hijo1_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion_hijo1_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion_hijo1_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_hijo2_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_hijo2_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion__hijo2_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion__hijo2_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_hijo3_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_hijo3_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion_hijo3_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion_hijo3_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_hijo4_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_hijo4_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion_hijo4_estudiando')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion_hijo4_estudiando); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_otro_hijo1_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_otro_hijo1_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_otro_hijo2_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_otro_hijo2_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_otro_hijo3_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_otro_hijo3_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_otro_hijo4_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_otro_hijo4_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion_otro_hijo1_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion_otro_hijo1_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion_otro_hijo2_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion_otro_hijo2_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion_otro_hijo3_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion_otro_hijo3_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_seccion_otro_hijo4_inscribir')); ?>:</b>
	<?php echo CHtml::encode($data->grado_seccion_otro_hijo4_inscribir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo_eligio_instituto')); ?>:</b>
	<?php echo CHtml::encode($data->motivo_eligio_instituto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medio_difusion')); ?>:</b>
	<?php echo CHtml::encode($data->medio_difusion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quien_recomendo')); ?>:</b>
	<?php echo CHtml::encode($data->quien_recomendo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('papa_ex_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->papa_ex_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mama_ex_alumno')); ?>:</b>
	<?php echo CHtml::encode($data->mama_ex_alumno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('papa_generacion')); ?>:</b>
	<?php echo CHtml::encode($data->papa_generacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mama_generacion')); ?>:</b>
	<?php echo CHtml::encode($data->mama_generacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_paterno_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_paterno_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_materno_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_materno_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_casa_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_casa_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_oficina_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_oficina_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movil_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->movil_contacto); ?>
	<br />

	*/ ?>

</div>