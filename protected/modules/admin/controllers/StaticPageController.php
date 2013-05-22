<?php
/**
 * Created by JetBrains PhpStorm.
 * User: z_bodya
 * Date: 4/5/12
 * Time: 4:59 PM
 * To change this template use File | Settings | File Templates.
 */
class StaticPageController extends AdminController
{
    public function actions()
    {
        $model = array(
            'schema' => array(
                'content' => array(
                    'label' => 'Контент',
                    'default' => null,
                ),
            ),
            'rules' => array(),
        );
        $tinyFull = array(
            'htmlOptions' => array(
                'rows' => 6,
                'cols' => 60,
            ),
        );
        $web = array(
            'class' => 'StaticPageEditor',

            'submitLabel' => 'Сохранить',
            'section' => 'service',
            'key' => 'web',
            'view' => '/static_editor',
            'model' => $model,
            'form' => array(
                array(
                    'type' => 'inputWidget',
                    'class' => 'ext.tinymce.TinyMce',
                    'attribute' => 'content',
                    'config' => $tinyFull,
                ),
            ),
        );
        $mobile = $web;
        $mobile['key'] = 'mobile';
        $promo = $web;
        $promo['key'] = 'promo';
        $style = $web;
        $style['key'] = 'style';
        return array(
            'web' => $web,
            'mobile' => $mobile,
            'promo' => $promo,
            'style' => $style,
        );
    }

    public function getSideMenu()
    {
        $res = array(
            array(
                'label' => 'Страницы',
                'items' => array(
                    array(
                        'label' => 'Разработка веб-сайтов',
                        'url' => array('/admin/service/web'),
                        'icon' => 'icon-file',
                        'active' => '/\/service\/web/',
                    ),
                    array(
                        'label' => 'Разработка мобильных приложений',
                        'url' => array('/admin/service/mobile'),
                        'icon' => 'icon-file',
                        'active' => '/\/service\/mobile/',
                    ),
                    array(
                        'label' => 'Оптимизация, продвижение и реклама',
                        'url' => array('/admin/service/promo'),
                        'icon' => 'icon-file',
                        'active' => '/\/service\/promo/',
                    ),
                    array(
                        'label' => 'Разработка фирменного стиля',
                        'url' => array('/admin/service/style'),
                        'icon' => 'icon-file',
                        'active' => '/\/service\/style/',
                    ),
                ),
            ),
        );
        return $res;
    }
}

