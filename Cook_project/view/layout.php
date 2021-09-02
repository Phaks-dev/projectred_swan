<!DOCTYPE html>
<html lang="en">
  <!-- AFFICHAGE GENERALE SUR TOUTES LES PAGES -->
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="shortcut icon" type="icon" href="/favicon_meal.ico"/>
        <link rel="stylesheet" href="public/css/fontawesome.css" />
      <title>It sliced-I cook it !</title>
      
  </head>

  <body class="position-relative d-flex flex-column h-100">
    <header class="position-sticky sticky-top"> 
      
    <!-- navbar -->
    
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <a class="navbar-brand" href="?ctrl=home&method=main">It Sliced ?</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul id="navigation" class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?ctrl=home&method=home">Accueil <span class="sr-only">(current)</span></a>
            </li>

            <!--  -->
            <?php if($user = App\Session::getUser()): ?>
              <li class="nav-item">
                <a class="nav-link" href="?ctrl=home&method=displayProfile"tabindex="-1" aria-disabled="true">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?ctrl=recipe&method=listRecipe"tabindex="-1" aria-disabled="true">Recettes</a>
              </li>
            <?php if ($user->getRole() === 'Admin'): ?>
              <li class="nav-item">
                <a class="nav-link" href="?ctrl=home&method=listUsers" tabindex="-1" aria-disabled="true">Utilisateurs</a>
              </li>
            <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="?ctrl=security&method=logout" tabindex="-1" aria-disabled="true">Deconnexion</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="?ctrl=security&method=register" tabindex="-1" aria-disabled="true">Connexion</a>
              </li>
            <?php endif; ?>
            

          </ul>
            <form class="form-inline mt-2 mt-md-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Une envie ?" aria-label="Search">
              <button id="go" class="btn btn-outline-success my-2 my-sm-0" type="submit">Allons-y !</button>
            </form>
        </div>
      </nav>
    </header>

    <main>
      <div id="page">
        <?= $page ?>
      </div>
    </main>
  </body>
  
  <div id="footer" class="text-white bg-secondary position-sticky sticky-bottom">
    <div class="card-body text-center">
      <h4 class="card-title">It Sliced</h4>
      <em class="card-text">Un site, fait par et pour les ptits cordons bleu</em>
    </div>
  </div>

</html>