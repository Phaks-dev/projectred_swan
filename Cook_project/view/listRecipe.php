<!-- liste de toutes les recettes enregistré -->

<!-- A FINIR -->

<!-- creer la boucle d'affichage-->
<section class="container">
    <h1 class="display-1">Liste des Recettes</h1>
    <table class="table table-responsive">
      <thead>
        <tr class="table-primary">
          <th scope="row">Nom</th>
          <th scope="col">Nombre de personne</th>
          <th scope="col">Prix</th>
          <th scope="col">Date de creation </th>
          <th scope="col">Duree</th>
          <th scope="col">Difficulté</th>
          <th scope="col">Type de recette</th>
          <th scope="col">Nationalité</th>
          <th></th>
          <?php if(App\Session::getUser()->getRole() === 'Admin'): ?>
          <th></th>
          <?php endif; ?>
        </tr>
      </thead>

      <tbody>
      <?php foreach($data['recipenames'] as $recipe ){?>
        <?php if($recipe->getApprouved() == '1' || App\Session::getUser()->getRole() === 'Admin'): ?>
        <tr class="table-light">
          <th scope="row"><?= $recipe->getRecipename() ?></th>
          <td><?= $recipe->getPerson() ?></td>
          <td><?= $recipe->getPrice() ?></td>
          <td><?= $recipe->getCreatedate('Y-m-j') ?> </td>
          <td><?= $recipe->getDuration() ?></td>
          <td><?= $recipe->getDifficulty() ?></td>
          <td><?= $recipe->getType_recipe() ?></td>
          <td><?= $recipe->getNat_recipe() ?></td>
          <td> <a button class="btn btn-info" type="button"Info href="?ctrl=recipe&method=getRecette&param=<?= $recipe->getId() ?>" >Voir la recette </a></button></td>
          <?php if(App\Session::getUser()->getRole() === 'Admin'): ?>
          <td>
          <a button class="btn btn-info" type="button"Info href="?ctrl=recipe&method=setValidation&param=<?= $recipe->getId() ?>" >Approuver</a></button></td>
          </td>
          <?php endif; ?>
        </tr>
          <?php endif; ?>
      <?php } ?>
      </tbody>
  </table>
</section>


 