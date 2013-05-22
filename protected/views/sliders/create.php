<?php
$this->breadcrumbs=array(
	'Sliders'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Ver Sliders','url'=>array('admin')),
);
?>

<h2>Nuevo Sliders</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>