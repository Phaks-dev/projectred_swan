<?php
    namespace Controller;

    use Model\UserManager;
    use App\Session;
    use App\Router;

    class SecurityController
    {   /**permet au client de si'identifier via un formuilaire
        via un identifiant et un mdp
        , et dans le cas ou ils sont valide, le redirige vers la page "home", demarre une session pour l'utilisateur confirmé */
        public function login(){
            sleep(1);
            if(!empty($_POST)){
                $username = filter_input(INPUT_POST, "username");
                $password = filter_input(INPUT_POST, "password");

                $model = new UserManager();
                if($userpass = $model->findPassword($username)){

                    if(password_verify($password, $userpass['password'])){

                        Session::setUser($model->findUser($username));
                        Router::redirectTo("home");
                    }
                    /**affiche un message d'erreur dans el cas ou le mdp n'est pas bon */
                    else {
                        $erreur="1";
                    }
                }   /** affcihe un message d'erreur quand l'identifiant n'est pas reconnu */
                else{
                    $erreur="1";              
            }
                /**sinon, actualise la page register */
            return [
                "view" => "register.php", 
                "data" => [$erreur],
            ];
/** fonction d'inscription du client en tant que user dans la bdd via un formulaire, avec un id, un mdp verifié 2 fois, 
 * tout en utilisant une methode dans le formulaire pour eviter les failles XSS */
        }
    }
        public function register(){

            if(!empty($_POST)){
                
                $username = filter_input(INPUT_POST, "username", FILTER_VALIDATE_REGEXP, [
                "options" => array("regexp"=> '/^[a-zA-Z0-9]{4,32}$/')]);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_VALIDATE_REGEXP, [
                    "options" => array("regexp"=> '/^[a-zA-Z0-9+&*$]{8,32}$/')]);
                $pass2 = filter_input(INPUT_POST, "pass2", FILTER_VALIDATE_REGEXP, [
                    "options" => array("regexp"=> '/^[a-zA-Z0-9+&*$]{8,32}$/')]);
                $role = 'Utilisateur';
                /** verifie si les 2 mdp sont identiques, si tel est le cas valide l'inscription en hashant le mdp et le cryptant suivant la fonction ARGON2I afin d'eviter les injection SQL */
                if($username && $pass1 && $pass2){
                    
                    if($pass1 == $pass2){
                        $model = new UserManager();
                        if(!$model->findUser($username)){
                            $hash = password_hash($pass1, PASSWORD_ARGON2I);
                            if($model->addUser($username, $hash, $role)){
                                Router::redirectTo("security", "register");
                            }
                        }
                        else $msg="Nom deja utilisé";
                    }
                    else $msg="erreur de mot de passse";
                }
                else $msg="mot de passe non reconnu";      
            }
                /** si l'inscription est non valide, redirection vers la page "register" */
           
           
                return [
                "view" => "register.php", 
                "data" => null
            ];
        }

        public function affiche(){
            return false;
        }

/** permet de supprimer la session lors de la deconection de l'utilisateur, et redirige vers la pgae "register" */
        public function logout(){
            Session::eraseKey();
            Session::removeUser();
            sleep(1);
            Router::redirectTo("security","register");
        }

        
        }
