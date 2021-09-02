<?php
    namespace Model;
    
    use App\AbstractManager;
    

    class UserManager extends AbstractManager
    {
        private static $classname = "Model\User"; 

        public function __construct(){
            self::connect(self::$classname);
        }

        /**fonction qui inscrit l'user et son mdp hashé dans la bdd */
                public function addUser($username, $hash, $role){
                    $sql = "INSERT INTO user (username, password, role) 
                            VALUES (:username, :password, :role)";

                    return self::create($sql, [
                            'username' => $username,
                            'password' => $hash,
                            'role' =>  $role
                    ]);
                }
        /**permet de trouver un utilisateur */
        public function findUser($username){
            
            $sql = "SELECT * 
                    FROM user 
                    WHERE username = :username";

            return self::getOneOrNullResult(
                self::select($sql, ['username' => $username], false),
                self::$classname
            );
        }
        /**permet de trouver un password */
        public function findPassword($username){
            
            $sql = "SELECT password 
                    FROM user 
                    WHERE username = :username";

            return self::select($sql, ['username' => $username], false);
        }

        /**permet d'avoir la liste de tout les utilisateurs */
        public function findAll(){
            $sql = "SELECT * 
                    FROM user";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }
        /**permet de trouver un role */
        public function findByRole($idrole){
            $sql = "SELECT id, username, createdat
                    FROM user
                    WHERE role_id = :id";

            return self::getResults(
                self::select($sql, ['id' => $idrole], true),
                self::$classname
            );
        }
        /**permet de rechercher par l'id */
        public function findOneById($id){
            $sql = "SELECT *
                    FROM user
                    WHERE id = :id";

            return self::getResults(
                self::select($sql, ['id' => $id], true),
                self::$classname
            );
        }
        
    


        
    }

        
