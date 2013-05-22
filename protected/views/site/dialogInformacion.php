<?php 
$this->renderPartial('BotonRegresar');
?>
<div class="span-15">
<?php
$entrada = Entradas::model ()->findByPk ( $entradaId );

$entrada = Entradas::model ()->findByPk ( $entradaId );
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'entradas-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array (
				'enctype' => 'multipart/form-data' 
		) 
) );
$this->widget ( 'ext.tinymce.ETinyMce', array (
		'model' => $entrada,
		'options' => array (
			'theme' => 'advanced',
			'theme_advanced_buttons1' => 'bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,outdent,indent,ltr,rtl,blockquote,|,forecolor,backcolor,|,fontselect,fontsizeselect',
			'theme_advanced_buttons2' => 'link,unlink,table,|,emotions,anchor,image,media,|,code,search,undo,redo',
			'theme_advanced_buttons3' => '',
			'theme_advanced_buttons4' => '' 
		),
		'attribute' => 'informacion',
		'editorTemplate' => 'full',
		'useCompression' => false,
		'htmlOptions' => array (
			'rows' => 2,
			'cols' => 100,
			'class' => 'tinymce',
			'style' => 'width:100%;height:380px;' 
		) 
) );
?>

<div class="form-actions">
	<?php
	
	$this->widget ( 'bootstrap.widgets.TbButton', array (
			'buttonType' => 'submit',
			'type' => 'primary',
			'label' => 'Guardar' 
	) );
	?>
</div>
<?php
$this->endWidget ();
?>
</div>
<div class="span-5">
	<h5>Galerías de Imágenes</h5>
	<div class="span-5" style="margin: 0;">
	<?php
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'getgalerias-form',
			'enableAjaxValidation'=>false,
	));
	echo CHtml::dropDownList ( 'selectorGaleria', '', CHtml::listData ( Sliders::model ()->findAll ( array (
			'order' => 'nombre' 
	) ), 'id', 'nombre' ), array (
			'empty' => 'Seleccione...',
			'ajax'=>array(
				'url'=>Yii::app()->CreateUrl('site/GetGaleria'),
				'type'=>'POST',
				'cache'=>false,
				'update'=>'#areaGalerias'
			)
	) );
	$this->endWidget();
	?></div>
	<div class="span-5" style="margin: 0;" id="areaGalerias"></div>

</div>