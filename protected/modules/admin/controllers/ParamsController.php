<?php

class ParamsController extends AdminController
{
    public function actions()
    {
        return array(
            'index' => array(
                'class' => 'StaticDataEditor',

                'submitLabel' => 'Сохранить',
                'storageModel' => 'StaticData',
                'key' => 100,
                'view' => 'static_editor',
                'model' => array(
                    'schema' => array(
                        'phone' => array(
                            'label' => 'Телефон в шапке и подвале сайта',
                            'default' => '<span class="tel-code">(495)</span> 585-88-99',
                        ),
                        'adminEmail' => array(
                            'label' => 'Email для уведомлений с сайта',
                            'default' => 'admin@example.com',
                        ),
                    ),
                    'rules' => array(),
                ),
                'form' => array(
                    array(
                        'type' => 'fieldset',
                        'legend' => 'Параметры сайта',
                        'config' => array(
                            array(
                                'type' => 'simpleInput',
                                'name' => 'textField',
                                'attribute' => 'phone',
                                'options' => array('class' => 'input-xxlarge'),
                            ),
                            array(
                                'type' => 'simpleInput',
                                'name' => 'textField',
                                'attribute' => 'adminEmail',
                                'options' => array('class' => 'input-xxlarge', 'type' => 'email'),
                            ),
                        ),
                    ),
                ),
            ),
        );
    }
}
