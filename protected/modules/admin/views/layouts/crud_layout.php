<?php
/**
 * @var EmployeeController $this
 */
?>
<?php $this->beginContent('/layouts/base'); ?>
<div class="container">
    <div class="row">
        <div class="span2">
            <div class="">
                <?php
                $items = array(
                    array(
                        'label' => 'Действия',
                        'items' => $this->actionsMenu
                    )
                );
                if (isset($this->pagesMenu))
                    $items[] = array(
                        'label' => 'Страницы',
                        'items' => $this->pagesMenu
                    );
                $this->widget('BSideMenu', array(
                    'items' => $items,
                ));?>
            </div>
        </div>
        <div class="span10">
            <?php echo $content;?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>