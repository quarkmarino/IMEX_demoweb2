<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	'Modificar',
);\n";
?>

$this->menu=array(
	array('label'=>'Nuevo <?php echo $this->modelClass; ?>','url'=>array('create')),
	array('label'=>'Ver <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>

<h2>Modificar <?php echo $this->modelClass; ?></h2>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>