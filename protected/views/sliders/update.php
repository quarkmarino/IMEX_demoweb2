<?php
$this->breadcrumbs=array(
	'Sliders'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nuevo Sliders','url'=>array('create')),
	array('label'=>'Ver Sliders','url'=>array('admin')),
);
?>

<h2>Modificar Sliders</h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>