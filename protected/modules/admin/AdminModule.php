<?php

class AdminModule extends CWebModule
{
    /**
     * After init() contains path to module assets.
     * @var string
     */
    public $assets = null;

    /**
     * @var mixed the layout that is shared by the controllers inside this module.
     * If a controller has explicitly declared its own {@link CController::layout layout},
     * this property will be ignored.
     * If this is null (default), the application's layout or the parent module's layout (if available)
     * will be used. If this is false, then no layout will be used.
     */
    public $layout = 'main';

    public $controllerMap = array(
        'gallery' => array(
            'class' => 'ext.galleryManager.GalleryController',
        ),
    );

    /**
     * Initialize components for module
     */
    public function init()
    {
        // publish our assets folder
        $this->assets = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets'));

        $this->setImport(
            array(
                $this->getId() . '.models.*',
                $this->getId() . '.components.*',
                $this->getId() . '.components.widgets.*',
                'ext.galleryManager.*',
                'ext.galleryManager.models.*',
                'ext.tinymce.*',
            ));

        Yii::app()->language = 'en';
        Yii::app()->getUrlManager()->addRules(
            array(
                'admin' => 'admin',
                'admin/<controller:\w+>' => 'admin/<controller>',
                'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
            ));
        Yii::app()->setComponents(
            array(
                'errorHandler' => array(
                    'errorAction' => '/' . $this->getId() . '/default/error',
                ),
                'user' => array(
                    'class' => 'AdminWebUser',
                    'allowAutoLogin' => true,
                    'stateKeyPrefix' => $this->getId() . 'user',
                    'loginUrl' => array('/' . $this->getId() . '/default/login'),
                    'returnUrl' => array('/' . $this->getId() . '/default/index'),
                ),
                'authManager' => array(
                    'class' => 'CDbAuthManager',
                    'defaultRoles' => array('authenticated', 'guest'),
                    'itemTable' => 'admin_auth_item',
                    'assignmentTable' => 'admin_auth_assignment',
                    'itemChildTable' => 'admin_auth_item_child',
                ),
            ));
    }

    /** @var string|array */
    public $menuConfig = 'admin.config.mainMenu';
    //array(
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
    //);

    private $_mainMenu = null;
    private $_sectionMenu = null;

    /** Returns menu items at first level */
    public function getMainMenu()
    {
        if ($this->_mainMenu == null)
            $this->buildMenus();
        return $this->_mainMenu;
    }

    /** Returns menu items at second level */
    public function getSectionMenu()
    {
        if ($this->_mainMenu == null)
            $this->buildMenus();
        return $this->_sectionMenu;
    }

    /**
     * @param $item array Menu item
     * @param $route string current route
     * @return bool Does item active
     */
    protected function isItemActive($item, $route)
    {
        if (isset($item['activateOn'])) {
            foreach ($item['activateOn'] as $config) {
                if (preg_match($config['route'], $route) > 0) {
                    $res = true;
                    if (!empty($config['params'])) {
                        foreach ($config['params'] as $name => $value) {
                            if (!isset($_GET[$name]) || $_GET[$name] != $value) {
                                $res = false;
                                break;
                            }
                        }
                    }
                    if ($res) return $res;
                }
            }
        }
        if (isset($item['url']) && is_array($item['url']) && !strcasecmp(trim($item['url'][0], '/'), $route)) {
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if (!isset($_GET[$name]) || $_GET[$name] != $value)
                        return false;
                }
            }
            return true;
        }
        return false;
    }

    /**
     * Creates menu item by configuration.
     * @param $config
     * @return array|bool Menu item or false if access denied for current user
     */
    private function menuItemByConfig($config)
    {
        if (isset($config['roles'])) {
            $roles = is_string($config['roles']) ? array_map('trim', explode(',', $config['roles'])) : $config['roles'];
        } else {
            $roles = array('authenticated');
        }
        $allowed = false;
        foreach ($roles as $role) {
            if (Yii::app()->user->checkAccess($role)) {
                $allowed = true;
                break;
            }
        }
        if (!$allowed) return false;
        $route = Yii::app()->getController()->getRoute();
        $isActive = $this->isItemActive($config, $route);
        return array(
            'label' => $config['label'],
            'url' => $config['url'],
            'active' => $isActive,
        );
    }

    /**
     * Build main menu(first and second levels) as specified in $menuConfig
     * @throws CException
     */
    private function buildMenus()
    {
        $main = array();
        $section = false;
        if (!empty($this->menuConfig)) {
            if (is_string($this->menuConfig)) { // load php file with configuration
                $file = Yii::getPathOfAlias($this->menuConfig);
                $this->menuConfig = require($file . '.php');
            }
            foreach ($this->menuConfig as $groupConfig) {
                if (isset($groupConfig['plain']) && $groupConfig['plain']) {
                    foreach ($groupConfig['items'] as $itemConfig) {
                        $item = $this->menuItemByConfig($itemConfig);
                        if ($item !== false)
                            $main[] = $item;
                    }
                } else {
                    $current = array();
                    $active = false;
                    foreach ($groupConfig['items'] as $itemConfig) {
                        $item = $this->menuItemByConfig($itemConfig);
                        if ($item !== false) {
                            $current[] = $item;
                            if ($item['active']) $active = true;
                        }
                    }
                    if (count($current) > 0) {
                        $main[] = array(
                            'label' => $groupConfig['label'],
                            'url' => $current[0]['url'],
                            'active' => $active
                        );
                        if ($active) $section = $current;
                    }
                }
            }
            $this->_mainMenu = $main;
            $this->_sectionMenu = $section;

        } else {
            throw new CException('Main menu is empty.');
        }
    }
}
