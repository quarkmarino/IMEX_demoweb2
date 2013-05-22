<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    
    
	/**
	 * Autentica un Usuario.
	 * La implementación de ejemplo comprueba si el nombre de usuario y contraseña
	 * son 'demo' o 'admin'.
	 * En aplicaciones prácticas, esto debe ser cambiado para autenticar 
	 * en un almacén persistente de datos de usuarios, por ejemplo una base de datos.	
	 * @return valor boleano que indica si la autenticación se llevó a cabo correctamente.
	 */
	public function authenticate()
	{
        
		$record=  Usuarios::model()->findByAttributes(array('nombre_de_usuario'=>$this->username));
        
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
        
		if(!isset($users[$this->nombredeusuario]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->nombredeusuario]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
    public function getId() {
        return $this->_id;
    }
}