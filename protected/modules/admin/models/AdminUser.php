<?php

/**
 * This is the model class for table "admin_user".
 *
 * The followings are the available columns in table 'admin_user':
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $name
 * @property string[] $roles
 *
 * The followings are the available model relations:
 */
class AdminUser extends CActiveRecord
{
    public $_roles = null;

    public function getRole()
    {
        $res = array();
        foreach ($this->roles as $role => $roleName) {
            $res[$role] = $this->hasRole($role);
        }
        return $res;
    }

    public function setRole($value)
    {
        foreach ($this->roles as $role => $roleName) {
            if ($value[$role]) {
                if (!$this->hasRole($role))
                    $this->assignRole($role);
            } else {
                if ($this->hasRole($role)) $this->revokeRole($role);
            }

        }
    }

    /**
     * @return string[]
     */
    public function getRoles()
    {
        if ($this->_roles === null) {
            $am = Yii::app()->authManager;
            $res = array();
            /**
             * @var CAuthItem $role
             */
            foreach ($am->getAuthItems(2) as $role) {
                if (!in_array($role->name, array('developer', 'guest', 'authenticated'))) {
                    $res[$role->name] = $role->description;
                }
            }
            $this->_roles = $res;
        }
        return $this->_roles;
    }

    public function hasRole($role)
    {
        /**
         * @var CDbAuthManager $authManager
         */
        $authManager = Yii::app()->getAuthManager();
        return $authManager->isAssigned($role, $this->username);

    }

    public function assignRole($role)
    {
        /**
         * @var CDbAuthManager $authManager
         */
        $authManager = Yii::app()->getAuthManager();
        $authManager->assign($role, $this->username);
    }

    public function revokeRole($role)
    {
        /**
         * @var CDbAuthManager $authManager
         */
        $authManager = Yii::app()->getAuthManager();
        $authManager->revoke($role, $this->username);
    }

    public function setPasswordHash($value)
    {
        $this->generateSalt();
        $this->password = sha1($this->salt . $value);
    }

    /**
     * Returns the static model of the specified AR class.
     * @return AdminUser the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'admin_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, name', 'required'),
            array('username, password, name', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('username, password, name', 'safe', 'on' => 'search'),
            array('role', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'username' => 'Имя входа',
            'password' => 'Пароль',
            'name' => 'Полное имя',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('username', $this->username, true);
        $criteria->compare('name', $this->name, true);
        // to hide developer:
        // $criteria->addCondition('username != \'developer\'');

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));

    }

    private function generateSalt()
    {
        $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $this->salt = substr(str_shuffle($alpha_numeric), 0, 10);
    }

}