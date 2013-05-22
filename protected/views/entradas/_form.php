<?php 
$categorias=Categorias::model()->findAll(array('order'=>'nombre'));
$categorias=CHtml::listData($categorias, 'id', 'nombre');
if(!$model->isNewRecord){
	
	
	$entradaSlider=EntradasSliders::model()->findByAttributes(array('entrada_id'=>$model->id));
	if($entradaSlider){
		$model->slider=Sliders::model()->findByPk($entradaSlider->slider_id);
	}
}
?>

<?php if( Yii::app()->user->hasFlash( 'upload-success' ) ): ?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash( 'upload-success' )?>
</div>
<?php endif; ?>

<?php if( Yii::app()->user->hasFlash( 'upload-failure' ) ): ?>
<div class="flash-error">
    <?php echo Yii::app()->user->getFlash( 'upload-failure' )?>
</div>
<?php endif; ?>

<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'entradas-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array (
		'enctype' => 'multipart/form-data'
	)
)); ?>


	<?php echo $form->errorSummary($model); ?>
	
	<div class="row" style="margin:0px;">Incluir archivo para descargar:</div>
	<div class="row" style="margin:0px;">
	<?php 
		echo $form->fileField($model,'upload_file',array('accept'=>'application/pdf'));
	?>
	</div>
	<div class="row" style="margin:0px;">
	<?php 
		echo $form->labelEx($model,'titulo');
		echo $form->textfield($model,'titulo');
	?>
	</div>
	<div class="form-actions">
		<?php 
			$this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Dar de Alta' : 'Guardar',
			));
		?>
	</div>

<?php $this->endWidget(); ?>