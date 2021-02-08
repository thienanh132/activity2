<?php
namespace App\Models;
class UserModel 
{
    private $username;
    private $password;
    
    // Class Constructor
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    /**
     * Getter method -> username
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * Getter method -> password
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
