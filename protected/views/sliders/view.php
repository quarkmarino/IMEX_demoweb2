<?php
$this->breadcrumbs=array(
	'Sliders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sliders','url'=>array('index')),
	array('label'=>'Create Sliders','url'=>array('create')),
	array('label'=>'Update Sliders','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Sliders','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sliders','url'=>array('admin')),
);
?>

<h1>View Sliders #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
