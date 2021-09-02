<?php

namespace Model;

use App\AbstractEntity;

class Recipe extends AbstractEntity
{
    private $id;
    private $recipename;/**from recipecontroller */
    private $price; /**menu deroulant */
    private $duration;/**menu deroulant */
    private $difficulty; /**menu deroulant */
    private $rating; /**appel depuis la bdd avec l'entity rating */
    private $txt; /**result from recipcontroller */
    private $nat_recipe; /** menu deroulant  */
    private $createdate; /**timestamp date postage */
    private $approuved; /**option de moderation */
    private $person;

    public function __construct($data){
        parent::hydrate($data, $this);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
            return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
            $this->id = $id;

            return $this;
    }

    /**
     * Get the value of recipename
     */ 
    public function getRecipename()
    {
            return $this->recipename;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */ 
    public function setRecipename($recipename)
    {
            $this->recipename = $recipename;

            return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
            return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
            $this->price = $price;

            return $this;
    }
    /**
     * Get the value of duration
     */ 
    public function getDuration()
    {
            return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */ 
    public function setDuration($duration)
    {
            $this->duration = $duration;

            return $this;

    /**
     * Get the value of difficulty
    */ 
    }
    public function getDifficulty()
    {
         return $this->difficulty;
    }
    /**
     * Set the value of difficulty
     */
    public function setDifficulty($difficulty)
    {
                $this->difficulty = $difficulty;

                return $this;
    }
    /**
     * Get the value of rating
     */ 
    public function getRating($rating)
    {
         return $this->rating;
    }
    /**

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
            $this->rating = $rating;

            return $this;
    }

    public function __toString(){
        return $this->name;
    }

    /**
     * Get the value of texte
     */ 
    public function getTxt()
    {
            return $this->txt;
    }

    /**
     * Set the value of texte
     *
     * @return  self
     */ 
    public function setTxt($txt)
    {
            $this->txt = $txt;

            return $this;
    }

    /**
     * Get the value of type_recipe
     */ 
    public function getType_recipe()
    {
        return $this->type_recipe;
    }

    /**
     * Set the value of type_recipe
     *
     * @return  self
     */ 
    public function setType_recipe($type_recipe)
    {
        $this->type_recipe = $type_recipe;

        return $this;
    }

    /**
     * Get the value of nat_recipe
     */ 
    public function getNat_recipe()
    {
        return $this->nat_recipe;
    }

    /**
     * Set the value of nat_recipe
     *
     * @return  self
     */ 
    public function setNat_recipe($nat_recipe)
    {
        $this->nat_recipe = $nat_recipe;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedate($format)
    {
            return $this->createdate->format($format);
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreatedate($created_at)
    {
            $this->createdate = new \DateTime($created_at);

            return $this;
    }
    /**
     * Get the value of approuved
     */ 
    public function getApprouved()
    {
        return $this->approuved;
    }

    /**
     * Set the value of approuved
     *
     * @return  self
     */ 
    public function setApprouved($approuved)
    {
        $this->approuved = $approuved;

        return $this;
    }
    /**
     * Get the value of person
     */ 
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set the value of person
     *
     * @return  self
     */ 
    public function setPerson($person)
    {
        $this->person = $person;

        return $this;
    }
}