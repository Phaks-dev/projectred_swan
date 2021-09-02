<div class="text-center" style="margin-bottom:0"> 
        <div id="background" class="text-center" style="margin-bottom:0">
          <div id="title">
            <h1>It Sliced</h1>
              <em>(...So I Cooked It)</em>
          </div>
        </div>
      </div>  
<!-- acceuil de l'user, proposition de form recip, info perso (left) et affichage de recette aleatoire (right)-->

<div class="container">
  <h1 class="display-1">Bienvenue <?= App\Session::getUser() ?></h1>
  <p class="lead">Aujourd'hui il fait beau dans votre cuisine, profitez en pour faire appel à vos talents culinaires !</p>
  <hr class="my-4">
  <p>Laissez vous tentez par une recette, ou créez en une !</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" role="button" href="?ctrl=recipe&method=listRecipe"tabindex="">On cuisine !
    </a>
    <a class="btn btn-primary btn-lg" role="button" href="#">On créé !
    </a>
  </p>


</br>



    <div class="jumbotron">
    <h2>On post une nouvelle recette ?</h2>
        <form action="?ctrl=recipe&method=recipeRegister" method="post">
            <p>Nom de la recette<input class="form-control" type="text" name="recipename"></p> <!-- nom de la recette -->
            <p>Nombre de personne<input class="form-control" list="person" name="person"> <!-- nombre de personne pour la recette -->
                <datalist id="person" > 
                    <option value="1 personne"> 
                    <option value="2 personnes"> 
                    <option value="3 personnes">
                    <option value="4 personnes">
                    <option value="5 personnes">
                    <option value="6 personnes">
                    <option value="7 personnes ou +">
                </datalist></p></p>
            <p>Prix<input class="form-control" list="prices" name="price"> <!-- prix de la recette -->
                <datalist id="prices" > 
                    <option value="Peu cher"> 
                    <option value="Raisonnable"> 
                    <option value="Crezus"> 
                </datalist></p>
            <p>Durée<input class="form-control" list="duration" name="duration"> <!-- temps de preparation de la recette -->
                <datalist id="duration" > 
                    <option value="So fast (environ 5min)"> 
                    <option value="Raisonnable (entre 15 et 30 min)"> 
                    <option value="Super long (plus de 30 min)"> 
                </datalist></p></p>
            <p>Difficulté<input class="form-control" list="difficulty" name="difficulty"> 
                <datalist id="difficulty" > 
                    <option value="Facile"> 
                    <option value="Moyen"> 
                    <option value="Difficile"> 
                </datalist></p></p>  <!-- definir plat d'entree, dessert, palt de resistance etc... -->
            <p>Type de plat<input class="form-control" list="type_recipe" name="type_recipe"> 
                <datalist id="type_recipe" > 
                    <option value="Entrée"> 
                    <option value="Plat principal"> 
                    <option value="Dessert"> 
                    <option value="Boisson">
                    <option value="Aperitif">
                </datalist></p> <!-- definir l'occasion de realisatio du plat:Noel, Anniversaire etc... -->
            <p>Nationalité du plat<input class="form-control" list="nat_recipe" name="nat_recipe"> 
                <datalist id="nat_recipe" > 
                    <option value="France"> 
                    <option value="Angleterre"> 
                    <option value="Allemagne"> 
                    <option value="Espagne">
                    <option value="Italie">
                    <option value="Japon">
                </datalist></p></p>
                <div class="form-group">Votre recette
                    <label for="exampleTextarea"></label>
                    <textarea class="form-control" rows="10" name="txt"></textarea>
                </div>
            <p><input  type="hidden" name="id" value="<?= App\Session::getUser()->getId() ?>"> </p>
            <p><input  type="hidden" name="csrf_token" value="<?= $csrf_token ?>"></p>
            <p><input class="btn btn-primary" type="submit" value="Je valide"></p>
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/zo1aqrd5ft90paihu11zfzk3bnucbwymwq4hd5l6gy7e5i62/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name'
    });
  </script>