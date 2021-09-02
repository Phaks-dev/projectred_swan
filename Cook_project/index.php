<?php
    namespace App;

    require_once "app\Autoloader.php";
    Autoloader::register();

    use App\Router;

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT_DIR', '.'.DS);
    define('PUBLIC_PATH', ROOT_DIR.'public'.DS);
    define('CSS_PATH', PUBLIC_PATH.'css'.DS);
    define('IMG_PATH', PUBLIC_PATH.'img'.DS);
    
    define('SERVICE_PATH', ROOT_DIR.'app'.DS);
    define('CTRL_PATH', ROOT_DIR.'controller'.DS);
    define('VIEW_PATH', ROOT_DIR.'view'.DS);

    $result = Router::handleRequest($_GET);
     
        //On fait générer une clef propre à la session si ce n'est pas déjà fait
    Session::generateKey();
    //on génère le jeton CSRF pour CETTE REQUETE uniquement
    $csrf_token=hash_hmac("sha256", "this_is_a_secret", Session::getKey());
    
    //Si la protection présente dans Router renvoie true
    if(Router::CSRFProtection($csrf_token)){ //On laisse le routeur solliciter le contrôleur
    //(aka continuer la prise en charge de la requête comme normalement)
    
    $result = Router::handleRequest($_GET);
    } //sinon, on déconnecte l'utilisateur et on le redirige vers la page de connexion
    
    else {
    
    Router::redirectTo("security", "logout");
    }
    
    ob_start();
    if(is_array($result) && array_key_exists('view', $result)){
        $data = isset($result['data']) ? $result['data'] : null;
        include VIEW_PATH.$result['view'];
    }
    else include VIEW_PATH."404.html";
    $page = ob_get_contents();
    ob_end_clean();
    
    /**meme fonctionnement que twig et extends/include */
    include VIEW_PATH."layout.php";
    