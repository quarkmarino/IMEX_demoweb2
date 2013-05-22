<div class="container">
    <div class="row">
        <div class="span12">
            <?php
            /**
             * @var BHorizontalForm $form
             * @var TestModel $model
             */
            ?>

            <?php $form = $this->beginWidget('BHorizontalForm',
            array(
                'enableAjaxValidation' => false,
            )); ?>

            <?php


            echo $form->textFieldControlGroup($model, 'lat', array('autocomplete' => 'off'));

            echo $form->beginControlGroup($model, 'long');
            echo $form->textField($model, 'long');
            echo '<br/>';

            $this->widget('ext.coordinatepicker.CoordinatePicker', array(
                'model' => $model,
                'latitudeAttribute' => 'lat',
                'longitudeAttribute' => 'long',
                //optional settings
                'editZoom' => 12,
                'pickZoom' => 7,
                'defaultLatitude' => 50.443513052458044,
                'defaultLongitude' => 30.498046875,
            ));
            echo $form->endControlGroup();

            echo $form->textFieldControlGroup($model, 'text', array('autocomplete' => 'off'));
            echo $form->passwordControlGroup($model, 'password', array('autocomplete' => 'off'));
            echo $form->checkBoxControlGroup($model, 'checkBox');
            echo $form->textAreaControlGroup($model, 'textArea');
            ?>

            <?php
            echo $form->dropDownListControlGroup($model, 'dropDown', $model->listData());

            echo $form->beginControlGroup($model, 'dropDown1');
            echo Chosen::activeDropDownList($model, 'dropDown1', $model->listData());
            echo $form->endControlGroup();

            echo $form->listBoxControlGroup($model, 'listBox', $model->listData(), array('multiple' => true));


            echo $form->beginControlGroup($model, 'listBox1');
            echo Chosen::activeMultiSelect($model, 'listBox1', $model->listData());
            echo $form->endControlGroup();

            echo $form->checkBoxListControlGroup($model, 'checkBoxList', $model->listData());
            echo $form->fileFieldControlGroup($model, 'file');
            echo $form->radioButtonListControlGroup($model, 'radioButtonList', $model->listData());
            echo $form->beginControlGroup($model, 'tinyMceArea');
            $this->widget('ext.tinymce.TinyMce', array(
                'model' => $model,
                'attribute' => 'tinyMceArea',
                'htmlOptions' => array(
                    'rows' => 6,
                    'cols' => 60,
                ),
            ));
            echo $form->endControlGroup($model);

            echo $form->beginControlGroup($model, 'serverFile');
            $this->widget('ext.elFinder.ServerFileInput', array(
                    'model' => $model,
                    'attribute' => 'serverFile',
                )
            );
            echo $form->endControlGroup($model);
            echo '<div class="control-group">' .
                CHtml::label('FileManager', 'none', array('class' => 'control-label')) .
                '<div class="controls">';
            $this->widget('ext.elFinder.ElFinderWidget', array());
            echo '</div></div>';
            ?>
            <?php
            /**
             * @var BTabs $tabs
             */
            $tabs = $this->beginWidget('BTabs');
            ?>
            <?php $tabs->beginTab('Home', 'home')?>
            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
                retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure
                terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan
                american apparel, butcher voluptate nisi qui.</p>
            <?php $tabs->endTab()?>
            <?php $tabs->beginTab('Profile')?>
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four
                loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk
                aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente
                labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard
                ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher
                vero sint qui sapiente accusamus tattooed echo park.</p>
            <?php $tabs->endTab()?>
            <?php $tabs->beginDropDown('DropDown')?>
            <?php $tabs->beginTab('First')?>
            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo
                retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft
                beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR
                banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever
                gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you
                probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu
                synth chambray yr.</p>
            <?php $tabs->endTab()?>
            <?php $tabs->beginTab('Second')?>

            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out
                master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan
                DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia
                PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf
                viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan,
                sartorial keffiyeh echo park vegan.</p>
            <?php $tabs->endTab();?>
            <?php $tabs->endDropDown();?>
            <?php $this->endWidget(); ?>
            <hr/>
            <a class="btn" data-toggle="modal" href="#myModal">Launch Modal</a>

            <div class="modal fade" id="myModal">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>

                    <h3>Modal header</h3>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary">Save changes</a>
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-large btn-primary">
                    Submit
                </button>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>
</div>