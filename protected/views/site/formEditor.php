<?php
$entrada=Entradas::model()->findByPk($entradaId);
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'entradas-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array (
				'enctype' => 'multipart/form-data'
		)
	)); 	

$this->widget('ext.tinymce.ETinyMce', array(
		'model'=>$entrada,
		'options'=>array(
				'theme'=>'advanced',
				'theme_advanced_buttons1' =>'bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,outdent,indent,ltr,rtl,blockquote,|,forecolor,backcolor,|,fontselect,fontsizeselect',
				'theme_advanced_buttons2' => 'link,unlink,table,|,emotions,anchor,image,media,|,code,search,undo,redo',
				'theme_advanced_buttons3' => '',
				'theme_advanced_buttons4' => '',
		),
		'attribute'=>'informacion',
		'editorTemplate'=>'full',
		'useCompression'=>false,
		'htmlOptions'=>array('rows'=>2, 'cols'=>40, 'class'=>'tinymce', 'style'=>'widt:100%;height;180px;'),
));
?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Guardar',
		)); 
	?>
</div>
<?php 
	$this->endWidget();
?>
