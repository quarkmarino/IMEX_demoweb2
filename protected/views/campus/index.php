<?php
$this->breadcrumbs=array(
	'Campuses',
);

$this->menu=array(
	array('label'=>'Create Campus','url'=>array('create')),
	array('label'=>'Manage Campus','url'=>array('admin')),
);
?>

<h1>Campuses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
