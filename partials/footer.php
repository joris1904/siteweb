<?php
$membres = findCount(['table' => 'users']);
?>
<div  style="padding-top: 90px;">
	
</div>
<footer>
	<div class="container">
		<div class="row">
			<div class="tako-xs-4 tako-md-4 tako-lg-4">
				<img src="/public/img/logo/logo.png" alt="takohell.com"  height= "50%"; width="50%";>
				<ul class="list-unstyled list-statistics">
					<li>
						<i class="fa fa-user fa-fw"></i>
						<a href="<?= url("membres") ?>">
							<span> <?= $membres ?>  Membres
							</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="tako-xs-8 tako-md-8 tako-lg-8">
				<div class="row">
					<div class="tako-xs-4 tako-md-4 tako-lg-4">
						<h4>La communauté</h4>
						<ul class="list-unstyled">
							<li><a href="<?= url('index') ?>">Actualité</a></li>
							<li><a href="#">forum</a></li>
							<li><a href="<?= url('membres') ?>">Membres</a></li>
						</ul>
					</div>
					<div class="tako-xs-4 tako-md-4 tako-lg-4">
						<h4>Lien utiles</h4>
						<ul class="list-unstyled">
							<li><a href="<?= url('a-propos') ?>">A propos de Tako Hell</a></li>
							<li><a href="<?= url('cgu') ?>">CGU</a></li>
							<li><a href="<?= url('contact') ?>">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="tako-xs-6 tako-md-6 tako-lg-6">
				Copyright 2016 &copy; <a href="http://takohell.com">takohell.com</a> . Tous droits réservés
			</div>
			<div class="tako-xs-6 tako-md-6 tako-lg-6">
				<ul class="tako-inline" style="text-align: center;">
					<li>
						<a href="#">
							<i class="fa fa-youtube-play"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-fw fa-facebook"></i>
						</a>
					</li>
					<li>
						<a href="#" >
							<i class="fa fa-fw fa-twitter"></i>
						</a>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
</footer>