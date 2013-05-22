<?php
/**
 * Custom model based on configuration passed into constructor
 *
 * @author Bogdan Savluk <savluk.bogdan@gmail.com>
 */
class DataModel extends CModel
{
    /**
     * Schema of page data. For details refer to PageData::__constructor()
     */
    private $_schema = array();

    /**
     * Validator rules.
     * @var array
     */
    private $_rules = array();
    private $_attributes = array();
    private $_attributeNames = array();
    private $_attributeLabels = array();

    /**
     * Creates new
     * @param array $config
     * Example:
     * array(
     *   'schema'=>array(
     *       'key' => array(
     *           'label' => 'Item Label',
     *           'default' => null,
     *       ),
     *    ),
     *    'rules'=>array(), // same as for CModel in rules()
     * )
     * @param string $scenario
     */
    public function __construct($config = array(), $scenario = '')
    {

        $this->_schema = isset($config['schema']) ? $config['schema'] : array();

        foreach ($this->_schema as $key => $itemConfig) {
            $this->_attributes[$key] = isset($itemConfig['default']) ? $itemConfig['default'] : '';
            $this->_attributeNames[] = $key;
            $this->_attributeLabels[$key] = isset($itemConfig['label']) ? $itemConfig['label'] : '';
        }
        $safeAttributes = $this->_attributeNames;
        if (isset($config['rules'])) {
            foreach ($config['rules'] as $rule) {
                $attributes = $rule[0];
                if (is_string($attributes))
                    $attributes = preg_split('/[\s,]+/', $attributes, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($attributes as $attr) {
                    if (isset($safeAttributes[$attr])) unset($safeAttributes[$attr]);
                }
                $rule[0] = $attributes;
                $this->_rules[] = $rule;
            }
        }
        $this->_rules[] = array($safeAttributes, 'safe');
        $this->setScenario($scenario);
        $this->init();
        $this->attachBehaviors($this->behaviors());
        $this->afterConstruct();

    }

    public function init()
    {

    }

    public function rules()
    {
        return $this->_rules;
    }

    public function attributeNames()
    {
        return $this->_attributeNames;
    }

    public function attributeLabels()
    {
        return $this->_attributeLabels;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->_attributes))
            return $this->_attributes[$name];
        else
            return parent::__get($name);
    }

    public function __set($name, $value)
    {
        if ($this->setAttribute($name, $value) === false) {
            parent::__set($name, $value);
        }
    }

    public function setAttribute($name, $value)
    {
        if (property_exists($this, $name))
            $this->$name = $value;
        else if (isset($this->_attributes[$name]))
            $this->_attributes[$name] = $value;
        else
            return false;
        return true;
    }

    public function __isset($name)
    {
        if (isset($this->_attributes[$name]))
            return true;
        else
            return parent::__isset($name);
    }

    /**
     * @return array Model properties as associative array
     */
    public function getData()
    {
        return $this->_attributes;
    }
}
