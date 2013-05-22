<?php
class ChangePasswordForm extends CFormModel
{
    public $currentPassword;
    public $password;
    public $passwordVerify;

    public function rules()
    {
        return array(
            array('currentPassword, password, passwordVerify', 'required'),
            array('currentPassword, password, passwordVerify', 'length', 'max' => 64),

            array('currentPassword', 'authenticate'),

            array('passwordVerify', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'),
        );
    }

    public function authenticate($attribute, $params)
    {
        $identity = new AdminUserIdentity(Yii::app()->user->name, $this->currentPassword);
        if (!$identity->authenticate()) {
            switch ($identity->errorCode) {
                case CUserIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError('currentPassword', 'Неверный пароль');
                    break;
                default:
                    $this->addError('currentPassword', 'Чтото пошло нетак');
                    break;
            }
        }
    }

    public function attributeLabels()
    {
        return array(
            'currentPassword' => 'Текущий пароль',

            'password' => 'Пароль',
            'passwordVerify' => 'Подтверждение',
        );
    }

    public function changePassword()
    {
        /** @var $model AdminUser */
        $model = AdminUser::model()->findByPk(Yii::app()->user->name);
        $model->setPasswordHash($this->password);
        return $model->save();
    }


}
