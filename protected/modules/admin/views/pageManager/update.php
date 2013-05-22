<?php
$this->actionsMenu = array(
    array('label' => 'Добавить страницу', 'url' => array('create'), 'icon' => 'icon-plus', 'active' => '/\/create/'),
    array('label' => 'Управление текстовыми страницами', 'url' => array('admin'), 'icon' => 'icon-list', 'active' => '/\/admin/'),
);
?>

<h1>Редактирование страницы <?php echo $model->name; ?></h1>
<br/>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>