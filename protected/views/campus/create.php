<?php
$this->breadcrumbs=array(
	'Campuses'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Ver Campus','url'=>array('admin')),
);
?>

<h2>Nuevo Campus</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>