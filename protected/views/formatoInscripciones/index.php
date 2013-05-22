<?php
$this->breadcrumbs=array(
	'Formato Inscripciones',
);

$this->menu=array(
	array('label'=>'Create FormatoInscripciones','url'=>array('create')),
	array('label'=>'Manage FormatoInscripciones','url'=>array('admin')),
);
?>

<h1>Formato Inscripciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
