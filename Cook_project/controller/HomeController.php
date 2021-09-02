<?php
    namespace Controller;

    use App\Session;
    use Model\UserManager;
    

    class HomeController
    {
        public function index(){

            Session::authenticationRequired('Admin','Utilisateur');

            return [
                "view" => "home.php", 
                "data" => null
            ];
        }
        
        

        public function main(){

            return [
                 "view" => "main.php",
                 "data" => null
                 
             ];
         }

       /** a modifier pour que ca marche */
        public function listUsers(){

            Session::authenticationRequired('Admin','Utilisateur');

            $username = new UserManager();
            $usernames = $username->findAll();
     
            return [
                "view" => "listusers.php", 
                "data" => [
                    "usernames" => $usernames,
                
                ]
            ];
        }
        public function displayProfile(){

                    Session::authenticationRequired('Admin','Utilisateurs');

                    return [
                        "view" => "profile.php",
                        "data" => [


                    ]
                ];
                }

                public function getProfile($id){

                    Session::authenticationRequired('Admin');

                    $profile = new UserManager();
                    $profiles = $profile->findOneById($id);

                    return [
                        "view" =>"profileUser.php",
                        "data" => [
                            "profiles" => $profiles
                        ]
                        ];
                }

         
    }   