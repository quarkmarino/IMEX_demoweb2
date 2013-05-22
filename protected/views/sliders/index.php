<?php
$this->breadcrumbs=array(
	'Sliders',
);

$this->menu=array(
	array('label'=>'Create Sliders','url'=>array('create')),
	array('label'=>'Manage Sliders','url'=>array('admin')),
);
?>

<h1>Sliders</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
