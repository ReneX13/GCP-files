<?php

use Base\Admin as BaseAdmin;

/**
 * Skeleton subclass for representing a row from the 'Admin' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Admin extends BaseAdmin
{
	function setPasswordHash($password){
                $hash = PHPassLib\Hash\BCrypt::hash($password, array ('rounds' => 16));
                parent::setPasswordHash($hash); 
        }
        function login ($password){
                echo "<br>".$password."<br>"; 
		echo "<br>".parent::getPasswordHash()."<br>"; 
		if(PHPassLib\Hash\BCrypt::verify($password, parent::getPasswordHash())){
			echo "if";
			return true;

                }
		else{
			echo "else";
                        return false;
                }        
        }
}
