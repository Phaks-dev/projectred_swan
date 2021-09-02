<!-- la view de la recette selectionnée-->
<?php   $recipe = $result['data']['recipenames'][0];
?>        
<div class="container">
    <div class="card mb-3">
    <a button class="btn btn-outline-primary" type="button" href="?ctrl=recipe&method=listRecipe"tabindex="-1">Retour à liste des Recettes</a>
    <div class="card-body">
        <h5 class="card-title"></h5>
        <h3 class="card-subtitle text-muted"><?=$recipe->getRecipename()?></h3>
    </div>
    <img id="avatar" src="https://intercoton.org/wp-content/themes/consultix/images/no-image-found-360x260.png" class="avatar img-circle img-thumbnail" alt="avatar">
    <div class="card-body">
        <p class="card-text"><?=$recipe->getDifficulty()?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?=$recipe->getPerson()?></li>   
        <li class="list-group-item"><?=$recipe->getPrice()?></li>
        <li class="list-group-item"><?=$recipe->getDuration()?></li>
        <li class="list-group-item"><?=$recipe->getType_recipe()?></li>
        <li class="list-group-item"><?=$recipe->getNat_recipe()?></li>
        <li class="list-group-item"><?=$recipe->getCreatedate('Y-m-j')?></li>
    </ul>
    </div>
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Préparation</h4>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        <p class="card-text"><?=$recipe->getTxt()?></p>
    </div>
    </div>
</div>
<?php foreach($result['data']['comments'] as $post): ?>
    <div id="com" class="card border-primary mb-3" style="max-width: 20rem; ">
    <div class="card-header"><?= $post->getUser()[0]->getUsername() ?></div>  <div class="card-body">
    <h6 class="card-text">J'ai noté <?=$post->getScore()?>/5 cette recette le:</br> <?=$post->getScoredate('Y-m-j')?></h4>
    <p class="card-text"><?=$post->getComment()?></p>
  </div>
</div>
<?php endforeach; ?>
<div class="container"><strong>Noter la recette et laisser lui un commentaire</strong>
<form action="?ctrl=rating&method=ratingRegister" method="post">
    <p><input class="form-control" list="score" name="score"> <!-- nombre de personne pour la recette -->
                <datalist id="score" > 
                    <option value="1"> 
                    <option value="2"> 
                    <option value="3">
                    <option value="4">
                    <option value="5">
                </datalist></p></p>
    <label for="exampleTextarea"></label>
    <textarea class="form-control" rows="10" name="comment"></textarea>
            <p><input  type="hidden" name="csrf_token" value="<?= $csrf_token ?>"></p>
            <p><input  type="hidden" name="id" value="<?= App\Session::getUser()->getId() ?>"> </p>
            <p><input  type="hidden" name="recipe_id" value="<?=$recipe->getId()?>"> </p>
            <p><input class="btn btn-primary" type="submit" value="Je valide"></p>
</div>