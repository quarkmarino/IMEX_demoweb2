<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'categorias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" style="margin:0px;">
	<?php echo $form->labelEx($model,'campus_id'); ?>
	<?php echo $form->dropdownlist($model,'campus_id',CHtml::listData(Campus::model()->findAll(array('order'=>'nombre')), 'id', 'nombre')); ?>
	<?php
		$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'',
			'label'=>'',
			'type'=>'info',
			'loadingText'=>'Cargando...',
			'icon'=>'flag',
			'size'=>'small',
			'url'=>$this->CreateUrl('campus/admin',array()),
			'htmlOptions'=>array('title'=>'Ir a Campus','height'=>'20'),
		));
	?>
	</div>

	<?php echo $form->textFieldRow($model,'clave',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Dar de Alta' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
