<?php
$this->breadcrumbs=array(
	'Categoriases'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Ver Categorias','url'=>array('admin')),
);
?>

<h2>Nueva Categoría</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>