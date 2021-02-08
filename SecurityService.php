<?php
namespace App\Services\Business;

use App\Services\Data\SecurityDAO;

class SecurityService
{
    // Define the properties
    private $verifyCred;
    
    public function login($credentials)
    {
       
        // Instantiate the Data Acccess Layer
        $this->verifyCred = new SecurityDAO();
        
        // Return true or false by passing credentials
        // to the object
        return $this->verifyCred->findByUser($credentials);
    }
}