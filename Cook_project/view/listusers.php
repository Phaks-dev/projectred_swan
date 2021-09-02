<!-- page affichant la liste des user == ADMIN-->
 

<!-- creer la boucle d'affichage-->
<div class="container"> 
    <h1 class="">Liste des utilisateurs</h1>
  <table id="tableau" class="table">
    <tr class="table-primary">
          <th scope="row">Role</th>
          <td>Pseudo</td>
          <td>Membre depuis le </td>
          <td></td>
        </tr>
        <?php foreach($data['usernames'] as $user ) { ?>
        <tr class="table-light">
          <th scope="row"><?= $user->getRole() ?></th>
          <td><?= $user->getUsername() ?></td>
          <td><?= $user->getCreatedate('Y-m-j') ?> </td>
          <td> <a button class="btn btn-info" type="button"Info href="?ctrl=home&method=getProfile&param=<?= $user->getId() ?>" >Voir son profil </a></button></td>
    </tr>
        <?php } ?>
  </table>
</div>
