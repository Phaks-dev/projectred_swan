<!-- page permettant l'insciription/la connexion == USER -->
<div class="text-center" style="margin-bottom:0"> 
        <div id="background" class="text-center" style="margin-bottom:0">
          <div id="title">
            <h1>It Sliced</h1>
              <em>(...So I Cooked It)</em>
          </div>
        </div>
      </div>  
<section class="container">
<div id="formulaire">
    <h1> Connectez vous</h1>
        <div class="form-group">
    <form action="?ctrl=security&method=login" method="post">
        <p><input class="form-control" placeholder="Votre pseudo" type="text" name="username"></p>
        <p><input class="form-control" placeholder="Votre mot de passe" type="password" name="password"></p>
        <p><input class="btn btn-primary" type="submit" value="C'est parti !"></p>
        <p><input type="hidden" name="csrf_token" value="<?= $csrf_token ?>"></p>
    </form>
        </div>
    <br></br>

    <!--<?php 
      if($data['erreur']!==null){ 
    ?>
      <div id="alert" class="alert alert-dismissible alert-danger">
      <strong>Le mot de passe et/ou l'identifiant n'est pas reconnu</strong> 
    </div>
      <?php
      }
    ?>-->

    <h1>Vous n'avez pas de compte ? Inscrivez vous !</h1>
        <div class="form-group">
        <form action="?ctrl=security&method=register" method="post">
            <p><input class="form-control" placeholder="Votre pseudo..." type="text" name="username"></p>
            <p><input class="form-control" placeholder="Votre mot de passe..." type="password" name="pass1"></p>
            <p><input class="form-control" placeholder="Répétez le mot de passe..." type="password" name="pass2"></p>
            <p><input class="btn btn-primary" type="submit" value="On s'inscrit !"></p>
        </form>
        </div>
</div>
 </section>
 
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

 <!-- faire les messages d'alertes pour la mauvaise identification et l'erreur d'inscription-->