<div class="contenedorInfo" style="overflow:hidden;">
	<div style="width:100%;float:left;min-height:121px;min-width:363px;">
	</div>
	<div style="width:100%;float:left;min-height:121px;min-width:363px;padding:10px;">
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'categorias-form',
			'enableAjaxValidation'=>false,
		)); ?>
	
		<div class="row" style="margin:0px;">Nombre Completo:</div>
		<div class="row" style="margin:0px;">
		<?php
			echo CHtml::textField('nombre');
		?>
		</div>
		<div class="row" style="margin:0px;">Comentarios:</div>
		<div class="row" style="margin:0px;">
		<?php
			echo CHtml::textArea('rnombre');
		?>
		</div>

		<?php $this->endWidget(); ?>	
	</div>
</div>