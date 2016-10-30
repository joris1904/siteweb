<header id="header" class="header">
    <div class="container">
        <ul class="nav">
            <li class="logo tako-xs-4 tako-md-4 tako-lg-4">
                <a href="<?= url('index') ?>"><img src="/public/img/logo/logo.png" alt="Takohell.com" height= "50%"; width="75%";
                ></a>
            </li>
            <li class=" <?= addClass('index')  ?> ">
                <a class="list-group-item" href="<?= url('index') ?>"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Accueil</a>
            </li>
            <li class="<?= addClass('forum')  ?> ">
                <a class="list-group-item" href="#"><i class="fa fa-forumbee"></i>&nbsp; Forum</a>
            </li>
            <!--<li class=" ?= addClass('home')  ?> ">
                <a class="a" href=" ?= url('home') ?>"> &nbsp; News</a>
                <i class="fa fa-newspaper-o" aria-hidden="true"></i> ne s'affiche pas
            </li>-->
            <li>
                <a class="a" href="<?= url('membres') ?>"><i class="fa fa-users"></i>&nbsp; Membre</a>
            </li>
        </ul>
        <ul class="nav nav-right">
            <?php
            //Si le membre est connecté on affiche le menu-connection
            if(isset($_SESSION['User'])){ ?>
            <li class='drop'>
                <a class="fa fa-arrow-down" aria-hidden="true" href="#">&nbsp;
                    <?php $user = $_SESSION['User']?>
                    <img src="<?= avatar($user['id']) ?>" style="background:<?= color($user['pseudo'] . $user['id'],3) ?>;width: 40px;
                height: 40px;border-radius: 50%; padding: 3px; " alt="<?= $user['pseudo'] ?>">&nbsp; Mon compte</a>
                <ul>
                    <li>
                        <a class="list-group-item" href="<?= url('profil') ?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Profil</a>
                    </li>
                    <li>
                        <a class="fa fa-fw fa-envelope" aria-hidden="true" href="<?= url('messagerie') ?>">&nbsp;Messagerie</a>
                    </li>
                    <li>
                        <a class="fa fa-sign-out" aria-hidden="true" href="<?= url('deconnexion') ?>">&nbsp; Deconnexion</a>
                    </li>
                </ul>
            </li>
            <?php }
            //Si le membre n'est pas connecté on affiche le menu-deconnecter
            if(empty($_SESSION['User'])) { ?>
            <li id="log">
                <a class="fa fa-sign-in" aria-hidden="true" href="<?= url('connexion') ?>">&nbsp; Se connecter</a>
            </li>
            <li id="log">
                <a class="list-group-item" href="<?= url('inscription') ?>">
                    <i class="fa fa-user-plus" aria-hidden="true">&nbsp; Inscription</i>
                </a>
            </li>
            <?php } ?>
            
        </ul>
    </div>
    </header><!-- /header -->