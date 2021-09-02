<?php
    namespace Controller;

    use Model\RecipeManager;
    use App\Session; 
    use App\Router;
    use Model\RatingManager;


    

    class RecipeController{
    
        public function recipeRegister(){
            
        if(!empty($_POST)){
           
            $recipename = filter_input(INPUT_POST, "recipename", FILTER_SANITIZE_STRING);
            $txt = filter_input(INPUT_POST, "txt",FILTER_SANITIZE_STRING);
            $price = $_POST["price"];
            $duration =$_POST["duration"];
            $difficulty = $_POST["difficulty"];
            $type_recipe =$_POST["type_recipe"];
            $nat_recipe =$_POST["nat_recipe"];
            $id =$_POST["id"];
            $person =$_POST["person"];
            
            //var_dump($recipename." ".$txt." ".$price." ".$duration." ".$difficulty." ".$type_recipe." ".$nat_recipe." ".$id." ");
            
                if($recipename && $txt && $price && $duration && $difficulty && $type_recipe && $nat_recipe && $id && $person){
                    $model = new RecipeManager();
                    if(!$model->findRecipeName($recipename)){
                     
                        if($model->addRecipe($recipename, $price, $duration, $difficulty, $txt, $type_recipe, $nat_recipe, $id, $person)){
                            Router::redirectTo("home", "main");
                        }
                    }
                    else{
                        $erreur="recette deja existante";
                    
                    };
            }
            /** si l'inscription est non valide, redirection vers la page "register" */
        return [
            "view" => "home.php", 
            "data" => ["erreur" =>$erreur],
        ];
        }
        
      
    
    }
    public function listRecipe(){

        Session::authenticationRequired('Admin','Utilisateur');

        $recipename = new RecipeManager();
        $recipenames = $recipename->findAll();
 
        return [
            "view" => "listRecipe.php", 
            "data" => [
                "recipenames" => $recipenames,
                ""
            
            ]
        ];
    }
    public function getRecette($id){

        Session::authenticationRequired('Admin','Utilisateur');

        $recipename = new RecipeManager();
        $recipenames = $recipename->findOneById($id);

        $comment = new RatingManager();
        $comments = $comment->findOneByRecipeId($id);
        
        

        return [
            "view" =>"recipe.php",
            "data" => [
                "recipenames" => $recipenames,"",
                "comments" => $comments,""
            ]
            ];
    }

    public function setValidation($id){

        Session::authenticationRequired('Admin');

        $recipename = new RecipeManager();
        $recipename->Validate($id);

        Router::redirectTo("Recipe","listRecipe");
    }
    
}

