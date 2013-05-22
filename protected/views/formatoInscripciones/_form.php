<div class="miForm">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'formato-inscripciones-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="help-block">Los campos marcados con <span class="required">*</span> son obligatorios.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row" style="margin: 0; font-size:12px;">
		<?php echo $form->labelEx($model,'campus'); ?>
		<?php echo $form->radioButtonList($model,'campus',array('1'=>'Estrella del Sur', '0'=>'San Pedro')); ?>
	</div>
	
	
	<div class="row" style="margin: 0; font-size:12px;">
		Ciclo Escolar
		<?php echo $form->textField($model,'ciclo',array('class'=>'span1','maxlength'=>45)); ?>
	</div>
	<div class="row" style="margin: 0; font-size:12px;">
		Sección al que desea ingresar
		<?php echo $form->textField($model,'seccion',array('class'=>'span5','maxlength'=>45)); ?>
	</div>
		<div class="row" style="margin: 0; font-size:12px;">
		Grado al que desea ingresar
		<?php echo $form->textField($model,'grado',array('class'=>'span2','maxlength'=>45)); ?>
	</div>

	<div class="row" style="margin: 0; font-size:12px;">
	<?php echo $form->labelEx($model,'ya_fue_alumno'); ?>
	<?php echo $form->radioButtonList($model,'ya_fue_alumno',array('1'=>'Si', '0'=>'No')); ?>
	</div>
	<?php echo $form->textFieldRow($model,'motivo_de_salida',array('class'=>'span5','maxlength'=>500)); ?>
	<div class="tituloAdmisiones">DATOS DEL ALUMNO</div>
	
	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="row" style="margin-left:0px;">
		<?php echo $form->labelEx($model,'fecha_nacimiento'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'attribute'=>'fecha_nacimiento',
                        'value'=>$model->fecha_nacimiento,
                        'language'=>'es',
                        'options'=>array(
                            'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                            'showOn'=>'focus', // 'focus', 'button', 'both'
                            'buttonText'=>Yii::t('ui','Mostrar calendario'), 
                            'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.gif', 
                            'buttonImageOnly'=>false,
                            'showButtonPanel'=>true,
                            'autoSize'=>true,
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'width:120px;vertical-align:top'
                        ),  
                    ));
                    ?>		
		
		<?php echo $form->error($model,'fecha_nacimiento'); ?>
	</div>	
	

	<?php echo $form->textFieldRow($model,'nacionalidad',array('class'=>'span5','maxlength'=>75)); ?>

	
	<div class="row" style="margin: 0; font-size:12px;">
	<?php echo $form->labelEx($model,'sexo'); ?>
	<?php echo $form->dropdownlist($model,'sexo',array('M'=>'Masculino', 'F'=>'Femenino')); ?>
	</div>
	
	<?php echo $form->textFieldRow($model,'ciudad_de_procedencia',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'escuela_de_procedencia',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'religion',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'promedio_actual',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'motivo_de_cambio',array('class'=>'span5','maxlength'=>500)); ?>
	<div class="tituloAdmisiones">DOMICILIO PARTICULAR</div>
	<?php echo $form->textFieldRow($model,'calle',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'numero_exterior',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'numero_interior',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'colonia',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'codigo_postal',array('class'=>'span1','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'ciudad',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'estado',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'pais',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'telefono_particular',array('class'=>'span2','maxlength'=>25)); ?>
<div class="tituloAdmisiones">DATOS DEL PADRE O TUTOR</div>
	<?php echo $form->textFieldRow($model,'nombre_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="row" style="margin-left:0px;">
		<?php echo $form->labelEx($model,'fecha_nacimiento_tutor'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'attribute'=>'fecha_nacimiento_tutor',
                        'value'=>$model->fecha_nacimiento_tutor,
                        'language'=>'es',
                        'options'=>array(
                            'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                            'showOn'=>'focus', // 'focus', 'button', 'both'
                            'buttonText'=>Yii::t('ui','Mostrar calendario'), 
                            'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.gif', 
                            'buttonImageOnly'=>false,
                            'showButtonPanel'=>true,
                            'autoSize'=>true,
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'width:120px;vertical-align:top'
                        ),  
                    ));
                    ?>		
		
		<?php echo $form->error($model,'fecha_nacimiento_tutor'); ?>
	</div>	

	<?php echo $form->textFieldRow($model,'nacionalidad_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="row" style="margin: 0; font-size:12px;">
	<?php echo $form->labelEx($model,'sexo_tutor'); ?>
	<?php echo $form->dropdownlist($model,'sexo_tutor',array('M'=>'Masculino', 'F'=>'Femenino')); ?>
	</div>
	

	<?php echo $form->textFieldRow($model,'escolaridad_tutor',array('class'=>'span5','maxlength'=>85)); ?>

	<?php echo $form->textFieldRow($model,'estado_civil_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ocupacion_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_empresa_tutor',array('class'=>'span5','maxlength'=>85)); ?>

	<?php echo $form->textFieldRow($model,'puesto_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'tiempo_laborando_tutor',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="row" style="margin: 0; font-size:12px;">
	<?php echo $form->labelEx($model,'es_propietario'); ?>
	<?php echo $form->radioButtonList($model,'es_propietario',array('1'=>'Si', '0'=>'No')); ?>
	</div>	

	<?php echo $form->textFieldRow($model,'telefono_empresa_tutor',array('class'=>'span2','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'numero_de_hijos_tutor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'religion_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'email_tutor',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'movil_tutor',array('class'=>'span5','maxlength'=>45)); ?>
<div class="tituloAdmisiones">DATOS DEL CÓNYUGE</div>
	<?php echo $form->textFieldRow($model,'nombre_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="row" style="margin-left:0px;">
		<?php echo $form->labelEx($model,'fecha_nacimiento_conyuge'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'attribute'=>'fecha_nacimiento_conyuge',
                        'value'=>$model->fecha_nacimiento_conyuge,
                        'language'=>'es',
                        'options'=>array(
                            'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                            'showOn'=>'focus', // 'focus', 'button', 'both'
                            'buttonText'=>Yii::t('ui','Mostrar calendario'), 
                            'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.gif', 
                            'buttonImageOnly'=>false,
                            'showButtonPanel'=>true,
                            'autoSize'=>true,
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'width:120px;vertical-align:top'
                        ),  
                    ));
                    ?>		
		
		<?php echo $form->error($model,'fecha_nacimiento_conyuge'); ?>
	</div>		

	<?php echo $form->textFieldRow($model,'nacionalidad_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="row" style="margin: 0; font-size:12px;">
	<?php echo $form->labelEx($model,'sexo_conyuge'); ?>
	<?php echo $form->dropdownlist($model,'sexo_conyuge',array('M'=>'Masculino', 'F'=>'Femenino')); ?>
	</div>	

	<?php echo $form->textFieldRow($model,'escolaridad_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'estado_civil_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ocupacion_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_empresa_conyuge',array('class'=>'span5','maxlength'=>85)); ?>

	<?php echo $form->textFieldRow($model,'giro_empresa_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'puesto_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'tiempo_laborando_conyuge',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="row" style="margin: 0; font-size:12px;">
	<?php echo $form->labelEx($model,'es_propietario_conyuge'); ?>
	<?php echo $form->radioButtonList($model,'es_propietario_conyuge',array('1'=>'Si', '0'=>'No')); ?>
	</div>
	

	<?php echo $form->textFieldRow($model,'telefono_empresa_conyuge',array('class'=>'span2','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'numero_de_hijos_conyuge',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'religion_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'email_conyuge',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'movil_conyuge',array('class'=>'span5','maxlength'=>45)); ?>
<div class="tituloAdmisiones">¿TIENE HIJOS ESTUDIANDO EN EL INSTITUTO?</div>
	<?php echo $form->textFieldRow($model,'nombre_hijo1_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_hijo1_estudiando',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_hijo2_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion__hijo2_estudiando',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_hijo3_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_hijo3_estudiando',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre_hijo4_estudiando',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'grado_seccion_hijo4_estudiando',array('class'=>'span5','maxlength'=>45)); ?>
<div class="tituloAdmisiones">¿VA A INSCRIBIR A OTRO HIJO AL INSTITUTO MÉXICO?</div>
	<?php echo $form->textFieldRow($model,'nombre_otro_hijo1_inscribir',array('class'=>'span5','maxlength'=>150)); ?>
	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo1_inscribir',array('class'=>'span5','maxlength'=>45)); ?>
	<?php echo $form->textFieldRow($model,'nombre_otro_hijo2_inscribir',array('class'=>'span5','maxlength'=>150)); ?>
	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo2_inscribir',array('class'=>'span5','maxlength'=>45)); ?>
	<?php echo $form->textFieldRow($model,'nombre_otro_hijo3_inscribir',array('class'=>'span5','maxlength'=>150)); ?>
	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo3_inscribir',array('class'=>'span5','maxlength'=>45)); ?>
	<?php echo $form->textFieldRow($model,'nombre_otro_hijo4_inscribir',array('class'=>'span5','maxlength'=>150)); ?>
	<?php echo $form->textFieldRow($model,'grado_seccion_otro_hijo4_inscribir',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'motivo_eligio_instituto',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'medio_difusion',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'quien_recomendo',array('class'=>'span5','maxlength'=>150)); ?>
	<div class="row" style="margin:0; font-size:14px;">
	¿Alguno de los Papás es exalumno?
	</div>
	
	<div class="row" style="margin: 0; font-size:12px;">
	Papá
	<?php echo $form->dropdownlist($model,'papa_ex_alumno',array('1'=>'Si', '0'=>'No'),array('class'=>'span1')); ?>
	</div>
	<div class="row" style="margin: 0; font-size:12px;">
	Mamá
	<?php echo $form->dropdownlist($model,'mama_ex_alumno',array('1'=>'Si', '0'=>'No'),array('class'=>'span1')); ?>
	</div>
	
	<?php echo $form->textFieldRow($model,'papa_generacion',array('class'=>'span1','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'mama_generacion',array('class'=>'span1','maxlength'=>45)); ?>
<div class="tituloAdmisiones">Datos de un familiar o amigo al que podamos contactar en  caso de no encontrar a los padres</div>
	<?php echo $form->textFieldRow($model,'nombre_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_paterno_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'apellido_materno_contacto',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'telefono_casa_contacto',array('class'=>'span2','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'telefono_oficina_contacto',array('class'=>'span2','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'movil_contacto',array('class'=>'span2','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'ajaxSubmit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Enviar' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>