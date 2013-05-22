<?php

class TestModel extends CFormModel
{
    public $lat;
    public $long;

    public $text;
    public $password;
    public $checkBox;
    public $textArea;
    public $tinyMceArea;
    public $serverFile;

    public $dropDown = '2';
    public $dropDown1 = '2';
    public $listBox = array(
        '0',
        '1',
        '3',
    );
    public $listBox1 = array(
        '0',
        '1',
        '3',
    );

    public $checkBoxList = array(
        '0',
        '1',
        '3',
    );

    public $file;
    public $radioButtonList;

    public function attributeLabels()
    {
        return array(
            'lat' => 'Latitude',
            'long' => 'Longitude',
            'text' => 'Text Field',
            'password' => 'Password Field',
            'checkBox' => 'CheckBox',
            'checkBoxList' => 'CheckBox List',
            'listBox' => 'ListBox',
            'textArea' => 'TextArea',
            'tinyMceArea' => 'TinyMCE Area',
            'dropDown' => 'DropDown',
            'file' => 'File',
            'serverFile' => 'Server File',
        );
    }

    public function listData()
    {
        return array(
            '0' => 'Item 0',
            '1' => 'Item 1',
            '2' => 'Item 2',
            '3' => 'Item 3',
        );
    }
}

class TestController extends AdminController
{
    public function actionWidgets()
    {
        $model = new TestModel();
        if (isset($_POST['TestModel'])) {
            $model->setAttributes($_POST['TestModel'], false);
            //            echo CVarDumper::dump($model);
        }

        $this->render('widgets', array('model' => $model));
    }

    public function actions()
    {
        return array(
            'index' => array(
                'class' => 'StaticDataEditor',

                'submitLabel' => 'Сохранить',
                'storageModel' => 'StaticData',
                'key' => 1,
                'view' => 'static_editor',
                'model' => array(
                    'schema' => array(
                        'item1' => array(
                            'label' => 'Item #1',
                            'default' => null,
                        ),
                        'item2' => array(
                            'label' => 'Item #2',
                            'default' => null,
                        ),
                        'item3' => array(
                            'label' => 'Item #3',
                            'default' => null,
                        ),
                    ),
                    'rules' => array(),
                ),
                'form' => array(
                    array(
                        'type' => 'fieldset',
                        'legend' => 'Fieldset One',
                        'config' => array(
                            array(
                                'type' => 'simpleInput',
                                'name' => 'textField',
                                'attribute' => 'item1',
                                'options' => array(),
                            ),
                            array(
                                'type' => 'listInput',
                                'name' => 'dropDownList',
                                'data' => array(
                                    'Item 1', 'Item 2', 'Item 3'
                                ),
                                'attribute' => 'item2',
                                'options' => array(),
                            ),
                        ),
                    ),
                    array(
                        'type' => 'fieldset',
                        'legend' => 'Fieldset Two',
                        'config' => array(
                            array(
                                'type' => 'inputWidget',
                                'class' => 'ext.tinymce.TinyMce',
                                'attribute' => 'item3',
                                'config' => array(
                                    'htmlOptions' => array(
                                        'rows' => 6,
                                        'cols' => 60,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        );
    }

    public function actionGallery()
    {
        $gallery = Gallery::model()->findByPk(1);
        if (empty($gallery)) {
            $gallery = new Gallery();
            $gallery->name = true;
            $gallery->description = true;
            $gallery->versions = array(
                'small' => array(
                    'resize' => array(200, null),
                ),
                'medium' => array(
                    'resize' => array(800, null),
                )
            );
            $gallery->save();
//            print_r($gallery->getErrors());
        }

        $gallery->name = true;
        $gallery->description = true;
        $gallery->versions = array(
            'small' => array(
                'resize' => array(200, null),
            ),
            'medium' => array(
                'resize' => array(800, null),
            )
        );
        $gallery->save();
        $this->render('gallery', array('gallery' => $gallery));
    }
}
