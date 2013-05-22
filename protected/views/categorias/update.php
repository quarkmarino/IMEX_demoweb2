<?php
$this->breadcrumbs=array(
	'Categoriases'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Nuevo Categorias','url'=>array('create')),
	array('label'=>'Ver Categorias','url'=>array('admin')),
);
?>

<h2>Modificar Categorias</h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>