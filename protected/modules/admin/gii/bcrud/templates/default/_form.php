<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="form">

<?php
    echo <<<EOD
    <?php
    /**
     * @var BHorizontalForm \$form
     * @var {$this->modelClass} \$model
     */
    ?>

EOD;
    ?>

    <?php echo "<?php \$form=\$this->beginWidget('BHorizontalForm', array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>\n"; ?>
    <!--
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

    -->

<?php
    foreach ($this->tableSchema->columns as $column) {
        if ($column->autoIncrement)
            continue;

        echo "    <div class=\"control-group <?php echo (\$model->hasErrors('{$column->name}') ? ' error' : '') ?>\">\n";
        echo "        <?php echo \$form->label(\$model, '{$column->name}', array('class' => 'control-label'))?>\n";

        echo "        <div class=\"controls\">\n";
        echo "            <?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n";
        echo "            <?php echo \$form->error(\$model,'{$column->name}'); ?>\n";
        echo "        </div>\n";
        echo "    </div>\n\n";

    }
    ?>
    <div class="form-actions">
        <button type="submit" class="btn btn-large btn-primary">
            <?php echo "<?php echo (\$model->isNewRecord ? 'Создать' : 'Сохранить'); ?>\n";?>
        </button>
    </div>

    <?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->
