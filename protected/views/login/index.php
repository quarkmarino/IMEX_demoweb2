<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<h1 style="text-align: center">Iniciar Sesión</h1>

<div class="form" style="text-align: center">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'nombredeusuario'); ?>
		<?php echo $form->textField($model,'nombredeusuario'); ?>
		<?php echo $form->error($model,'nombredeusaurio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'recordarme'); ?>
		<?php echo $form->label($model,'recordarme'); ?>
		<?php echo $form->error($model,'recordarme'); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
				'label'=>'Ingresar',
				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'size'=>'small', // null, 'large', 'small' or 'mini'
				'buttonType'=>'submit',
		)); ?>
	
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->