<?php
$this->breadcrumbs=array(
	'Sliders',
);

$this->menu=array(
	array('label'=>'Nuevo Slider','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sliders-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Sliders</h2>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'sliders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{galeria}{update}{delete}',
			'buttons'=>array(
				'galeria'=>array(
					'icon'=>'film',
					'url'=>'Yii::app()->createUrl("sliders/GetGaleria",array("id"=>$data->id))',
					'options'=>array('title'=>'Gestionar Imágenes de Slider')
				)
			)
		),
	),
)); ?>
