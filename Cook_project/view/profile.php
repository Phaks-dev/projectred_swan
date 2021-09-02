<!-- la view du profil selectionnée-->


<div class="container">
    <div class="card mb-3">
        <h1 class="display-1"> Votre profil</h1>
        <div class="card-body">
            <h5 class="card-title">Votre pseudo: <?= App\Session::getUser()->getUsername() ?></h5>
            <h6 class="card-subtitle text-muted">Votre rôle: <?= App\Session::getUser()->getRole() ?></h6>
        </div>
            <img id="avatar" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">        <div class="card-body">
            <p class="card-text">Membre depuis le: <?= App\Session::getUser()->getCreatedate('Y-m-j') ?></p>
        </div>
    
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">A propos de vous</h4>
                    <p class="card-text"><?= App\Session::getUser()->getBio() ?></p>
                    <a class="card-link" href="#">Modifier</a>
            </div>
        </div>
    </div>
</div>