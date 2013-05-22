<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
?>

$this->actionsMenu = array(
    array('label' => 'Управление <?php echo $this->modelClass; ?>', 'url' => array('admin'), 'icon'=>'icon-list', 'active'=>'/\/admin/'),
);
?>

<h1>Добавить <?php echo $label?></h1>
<br/>
<?php
echo "<?php echo \$this->renderPartial('_form', array('model' => \$model)); ?>";