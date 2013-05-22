<?php
$this->breadcrumbs=array(
	'Formato Inscripciones'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nuevo FormatoInscripciones','url'=>array('create')),
	array('label'=>'Ver FormatoInscripciones','url'=>array('admin')),
);
?>

<h2>Modificar FormatoInscripciones</h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>