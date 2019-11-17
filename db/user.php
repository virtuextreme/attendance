<?php
    class user{
        //private database object
        private $db;

        //constuctor to initialize private variable to the database connection
        function __construct($conn)
        {
        $this-> db = $conn;
        }

        public function insertUser($username,$password){
            try {
                    $result = $this->getUserbyUsername($username);
                    if($result['num']> 0){
                        return false;
                    }else{
                        $new_password = md5($password.$username);
                        //define sql statement to be executed
                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password) ";
                    //prepare sql statement for execution
                    $stmt = $this->db->prepare($sql);
                    //bind all placeholders to the actual values
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':password', $new_password);
                    
                        
                    //execute statement
                    $stmt->execute();
                    return true;
                }
                

            } 
        catch (PDOExeception $e) 
        {
            echo $e->getMessage();
                        return false;
        }
         
        }
        public function getUser($username,$password){
            try {
                $sql = "SELECT * FROM users WHERE username = :username AND password = :password ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;  
            } catch (PDOExeception $e) 
            {
                echo $e->getMessage();
                return false;
            }
        }
        //DONT ENTER TWO USER WITH THE SAME USERNAME
        public function getUserbyUSERNAME($username){
            try {
                $sql = "SELECT count(*) as num users WHERE username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
               
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;  
            } catch (PDOExeception $e) 
            {
                echo $e->getMessage();
                return false;
            }
        }

    }
?>