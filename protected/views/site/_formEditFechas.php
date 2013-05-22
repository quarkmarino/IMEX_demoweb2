<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'photo-form',
		'enableAjaxValidation'=>false
));

?>
<br><br><br><br>

	<?php echo $form->errorSummary($model); ?>
	<div class="row" style="margin-left:20px;">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php 
		$this->widget('ext.timepicker.timepicker', array(
				'model'=>$model,
				'name'=>'fecha_inicio',
				'select'=> 'date',
				'language'=>'en',
				'options' => array(
						'showOn'=>'focus',
						'dateFormat'=>'yy-mm-dd',
						'changeMonth'=>true,
						'changeYear'=>true,
				),
					
		));
                    ?>		
		
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>
		<div class="row" style="margin-left:20px;">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'attribute'=>'fecha_fin',
                        'value'=>$model->fecha_fin,
                        'language'=>'en',
                        'options'=>array(
                            'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                            'showOn'=>'focus', // 'focus', 'button', 'both'
                            'showButtonPanel'=>true,
                            'autoSize'=>true,
                            'dateFormat'=>'yy-mm-dd',
                        	'changeMonth'=>true,
                        	'changeYear'=>true,
                        ),
                        'htmlOptions'=>array(
                            'style'=>'width:205px;vertical-align:top'
                        ),  
                    ));
                    ?>		
		
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Dar de Alta' : 'Guardar',
		)); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'type'=>'null',
			'label'=>'Cancelar',
			'url'=>Yii::app()->CreateUrl('sliders/GetGaleria',array('id'=>$model->gallery->id))
		)); ?>		
	</div>
	
<?php $this->endWidget(); ?>