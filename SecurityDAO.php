<?php
namespace App\Services\Data;
use App\Models\UserModel;
use Carbon\Exceptions\Exception;
class SecurityDAO
{
    // Define the connection string
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "activity2";
    private $port = "3306";
    private $dbQuery;
    
    // Constructor that creates a connection with the database
    public function __construct() 
    {
       // Create a connection to the database
       $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname,$this->port );
       // Make sure to test the connection and see if there any errors.
    }
    /** Method to verify user credentials
     * 
     */
    public function findByUser($credentials)
    {
        //print_r($credentials->getUsername());
        try 
        {
           // Define the query to search the database for the credentials
           $this->dbQuery = "SELECT *
                             FROM users
                             WHERE username = '{$credentials->getUsername()}'
                                   AND password = '{$credentials->getPassword()}'";
           // If the selected query returns a result set
           $result = mysqli_query($this->conn, $this->dbQuery);
           if (mysqli_num_rows($result) > 0)
           {
               mysqli_free_result($result);
               mysqli_close($this->conn);
               return true;
           }
           else 
           {
           mysqli_free_result($result);
           mysqli_close($this->conn);
           return false;
           }
        } catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }
}