<?php
    namespace Controller;

    use App\Session; 
    use App\Router;

    class SecurityController
    {
        public function error404(){

                    return [
                        "view" => "404.php",
                        "data" => null
                        
                    ];
                }

                public function error403(){

                    return [

                        "view" => "403.php",
                        "data" => null
                        
                    ];
                }
    }
