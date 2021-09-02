<?php
    namespace Controller;

    use App\Session; 
    use App\Router;
    use Model\RatingManager;
    use Model\RecipeManager;

    class RatingController{

        public function ratingRegister(){
            
            if(!empty($_POST)){

                $user_id =$_POST["id"];
                $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
                $score =$_POST["score"];
                $recipe_id =$_POST["recipe_id"];
                
                //var_dump($recipename." ".$txt." ".$price." ".$duration." ".$difficulty." ".$type_recipe." ".$nat_recipe." ".$id." ");
                
                    if($user_id && $comment && $score && $recipe_id){
                        $model = new RatingManager();
                        if(!$model->findOneByUserId($user_id)){

                            if($model->addRating($user_id, $score, $comment, $recipe_id)){
                                Router::redirectTo("Recipe","listRecipe");
                            }
                        }
                        else{
                            $erreur="Vous avez déja commenté cette recette";
                            $recipename = new RecipeManager();
                            $recipenames = $recipename->findOneByRecipeId($recipe_id);
                        };
                }
                /** si l'inscription est non valide, redirection vers la page "register" */
            return [
                "view" => "recipe.php", 
                "data" => [
                    "erreur" =>$erreur,
                    "recipenames" => $recipenames,
                ""],
            ];
            }
        }

       
    }