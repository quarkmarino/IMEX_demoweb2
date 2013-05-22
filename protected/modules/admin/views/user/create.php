<?php
$this->breadcrumbs = array(
    'Админ. пользователи' => array('admin'),
    'Добавить',
);

$this->menu = array(
    array('label' => 'Действия', 'itemOptions' => array('class' => 'nav-header')),

    array('label' => '<i class="icon-list"></i>Список пользователей', 'url' => array('/admin/user/admin')),

);
?>
<?php $this->beginContent('layout') ?>
<h1>Добавить пользователя системи управления сайтом</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>

<?php $this->endContent(); ?>
