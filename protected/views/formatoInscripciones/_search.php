<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ciclo',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'seccion',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'grado',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ya_fue_alumno',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'motivo_de_salida',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'fecha_nacimiento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nacionalidad',array('class'=>'span5','maxlength'=>75)); ?>

	<?php echo $form->textFieldRow($model,'sexo',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'ciudad_de_procedencia',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'escuela_de_procedencia',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'religion',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'promedio_actual',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'motivo_de_cambio',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'calle',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'numero_exterior',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'numero_interior',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'colonia',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'codigo_postal',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'ciudad',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'pais',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'telefono_particular',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'nombre_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'fecha_nacimiento_tutor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nacionalidad_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'sexo_tutor',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'escolaridad_tutor',array('class'=>'span5','maxlength'=>85)); ?>

	<?php echo $form->textFieldRow($model,'estado_civil_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ocupacion_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_empresa_tutor',array('class'=>'span5','maxlength'=>85)); ?>

	<?php echo $form->textFieldRow($model,'puesto_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'tiempo_laborando_tutor',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'es_propietario',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'telefono_empresa_tutor',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'numero_de_hijos_tutor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'religion_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'email_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'movil_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'fecha_nacimiento_conyuge',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nacionalidad_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'sexo_conyuge',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'escolaridad_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'estado_civil_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ocupacion_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_empresa_conyuge',array('class'=>'span5','maxlength'=>85)); ?>

	<?php echo $form->textFieldRow($model,'giro_empresa_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'puesto_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'tiempo_laborando_conyuge',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'es_propietario_conyuge',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'telefono_empresa_conyuge',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'numero_de_hijos_conyuge',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'religion_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'email_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'movil_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_hijo1_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_hijo1_estudiando',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_hijo2_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion__hijo2_estudiando',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_hijo3_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_hijo3_estudiando',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_hijo4_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_hijo4_estudiando',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_otro_hijo1_inscribir',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'nombre_otro_hijo2_inscribir',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'nombre_otro_hijo3_inscribir',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'nombre_otro_hijo4_inscribir',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo1_inscribir',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo2_inscribir',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo3_inscribir',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo4_inscribir',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'motivo_eligio_instituto',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'medio_difusion',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'quien_recomendo',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'papa_ex_alumno',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'mama_ex_alumno',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'papa_generacion',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'mama_generacion',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'telefono_casa_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'telefono_oficina_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'movil_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
