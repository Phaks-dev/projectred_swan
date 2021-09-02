<?php

namespace Model;

use app\AbstractManager;

class RecipeManager extends AbstractManager
{

private static $classname = "Model\Recipe"; 

        public function __construct(){
            self::connect(self::$classname);
        }


        /** permet d'enregistrer les recettes, prix, difficulté, notation, et 
         * la demarche en un id en base de donnee */
        public function addRecipe($recipename, $price, $duration, $difficulty, $txt, $type_recipe, $nat_recipe, $user_id, $person){
            $sql = "INSERT INTO recipe (recipename, price, duration, difficulty, txt, type_recipe, nat_recipe, user_id, person) 
                    VALUES (:recipename, :price, :duration, :difficulty, :txt, :type_recipe, :nat_recipe, :user_id, :person)";
            return self::create($sql, [
                    'recipename' => $recipename,
                    'price' => $price,
                    'duration' => $duration,
                    'difficulty' => $difficulty,
                    'txt' =>$txt,
                    'type_recipe' =>$type_recipe,
                    'nat_recipe' =>$nat_recipe,
                    'user_id' =>$user_id,
                    'person' =>$person,       

            ]);
        }

        /** permet de lister toutes les recettes */
        public function findAll(){
            $sql = "SELECT * 
                    FROM recipe";

            return self::getResults(
                self::select($sql, null, true),
                self::$classname
            );
        }

        public function findRecipeName($recipename){
            
            $sql = "SELECT * 
                    FROM recipe 
                    WHERE recipename = :recipename";

            return self::getOneOrNullResult(
                self::select($sql, ['recipename' => $recipename], false),
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT *
                    FROM recipe
                    WHERE id = :id";

            return self::getResults(
                self::select($sql, ['id' => $id], true),
                self::$classname
            );
        }

        public function Validate($id){
            $sql = "UPDATE recipe
                    SET approuved = '1'
                    WHERE id = :id";
            
            return self::create($sql, [
                'id' => $id
            ]);
    
        }
        public function findOneByRecipeId($recipe_id){
            $sql = "SELECT *
                    FROM recipe
                    WHERE id = :recipe_id";

            return self::getResults(
                self::select($sql, ['recipe_id' => $recipe_id], true),
                self::$classname
            );
        }
    }

        
