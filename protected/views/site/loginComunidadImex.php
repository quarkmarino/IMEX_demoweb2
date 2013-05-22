<?php


	$portadaId=null;
	if(isset($_GET['portadaId']))$portadaId=$_GET['portadaId'];
?>

<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'campus-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
	));
    echo $form->errorSummary($model);
    ?>
	<div class="row">
		Campus
		<?php echo CHtml::dropDownList('selectCampus', $portadaId, array('2'=>'Estrella del Sur', '3'=>'San Pedro'),array('empty'=>'Seleccione un Campus')) ?>
	</div>

	<?php
	/* 
		$this->widget('application.extensions.recaptcha.EReCaptcha', 
			array(
				'model'=>$model, 'attribute'=>'validacion',
				'theme'=>'clean', 'language'=>'es_ES', 
		        'publicKey'=>'6LecWtkSAAAAALjVt5rCnhEzI6Ib7r4cffKh5Aqs'
			)
		);
		echo CHtml::error($model, 'validacion');
	*/
	?>
	
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
   		'label'=>'Ingresar',
    	'buttonType'=>'submit',
   		'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
   		'size'=>'small', // null, 'large', 'small' or 'mini'
    ));
    
    $this->endWidget(); 
    
    ?>
</div><!-- form -->
