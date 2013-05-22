<?php
$this->breadcrumbs=array(
	'Campuses'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nuevo Campus','url'=>array('create')),
	array('label'=>'Ver Campus','url'=>array('admin')),
);
?>

<h2>Modificar Campus</h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>