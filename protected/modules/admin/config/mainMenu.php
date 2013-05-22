<?php

// Group config sample
// array( // menu items group
//     'label' => 'General Items',
//     'plain' => false, //optional, by default false - if true, items will be displayed in 1ts level menu
//     'items' => array( //items in group
//         array(
//             'label' => 'Sample Item',
//             'url' => array('/admin/crud/index'), //url config
//             'activateOn' => array(
//                 // descriptions of actions where menu item should be activated
//                 // by default empty, and only url is used for check
//                 array(
//                     'route' => '/\/admin\/crud\/(admin|update|create)/', // regexp for possible routes
//                     'params' => array( // list of $_GET parameters values that should be set for this item. empty by default
//                         'key' => 'value'
//                     ),
//                 ),
//             ),
//             'roles' => array('admin', 'developer'), //array of roles, or comma separated list. by default 'authenticated'
//         ),
//     ),
// ),
return array(
    array(
        'label' => 'Сайт',
        'plain' => false,
        'items' => array(
            array(
                'label' => 'Статические страницы',
                'url' => array('/admin/staticPage/web'),
                'activateOn' => array(
                    array('route' => '/admin\/staticPage/',),
                ),
            ),
            array(
                'label' => 'Текстовые страницы',
                'url' => array('/admin/pageManager'),
                'activateOn' => array(
                    array('route' => '/admin\/pageManager/',),
                ),
            ),
        ),
    ),
    array(
        'label' => 'Параметры сайта',
        'plain' => true,
        'items' => array(
            array(
                'label' => 'Параметры сайта',
                'url' => array('/admin/params/index'),
                'activateOn' => array(
                    array('route' => '/admin\/params\/index/',),
                ),
            ),
        ),
    ),
//    array(
//        'label' => 'Test1',
//        'plain' => false,
//        'items' => array(
//            array(
//                'label' => 'Главная',
//                'url' => array('/admin/mainPage/index'),
//                'activateOn' => array(
//                    array('route' => '/admin\/mainPage/',),
//                ),
//            ),
//            array(
//                'label' => 'Услуги',
//                'url' => array('/admin/service/web'),
//                'activateOn' => array(
//                    array('route' => '/admin\/service/',),
//                ),
//            ),
//            array(
//                'label' => 'Текстовые страницы',
//                'url' => array('/admin/pageManager'),
//                'activateOn' => array(
//                    array('route' => '/admin\/pageManager/',),
//                ),
//            ),
//        ),
//    ),
    array(
        'label' => 'Test area',
        'items' => array(
            array(
                'label' => 'Gallery Manager',
                'url' => array('/admin/test/gallery'),
                'roles' => 'developer',
            ),
            array(
                'label' => 'Widgets',
                'url' => array('/admin/test/widgets'),
                'roles' => 'developer',
            ),
            array(
                'label' => 'Data',
                'url' => array('/admin/test/index'),
                'roles' => 'developer',
            ),
        )
    )
);