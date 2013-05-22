<?php
$this->breadcrumbs = array(
    'Админ. пользователи' => array('admin'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Действия', 'itemOptions' => array('class' => 'nav-header')),

    array('label' => '<i class="icon-list"></i>Список пользователей', 'url' => array('/admin/user/admin')),
    array('label' => '<i class="icon-plus"></i>Добавить пользователя', 'url' => array('/admin/user/create')),
);
?>
<?php $this->beginContent('layout') ?>

<h1>Редактирование пользователя <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
<?php $this->endContent(); ?>
