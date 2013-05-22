<?php
$this->breadcrumbs=array(
	'Entradases',
);

$this->menu=array(
	array('label'=>'Create Entradas','url'=>array('create')),
	array('label'=>'Manage Entradas','url'=>array('admin')),
);
?>

<h1>Entradases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
