<!-- la view du profil selectionnée-->
<?php $profile = $data['profiles'][0]  ?>

<div class="container">
    <div class="card mb-3">
        <h3 class="card-header"><?=$profile->getUsername()?></h3>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle text-muted">Rôle: <?=$profile->getRole()?></h6>
        </div>
            <img id="avatar" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">        <div class="card-body">
        
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Membre depuis le: <?=$profile->getCreatedate('Y-m-j')?></li>
        </ul>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sa bio</h4>
                <p class="card-text"><?=$profile->getBio()?></p>
            </div>
        </div>
    </div>
</div>