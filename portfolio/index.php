
<?php

///// FUNCTIONS

function getProjects($db) {
	return $db->query("SELECT * FROM v_projects ORDER BY id DESC");
}


///// DB ACCESS

try {
    $db = new PDO('mysql:host=timunix.cegep-ste-foy.qc.ca;dbname=spec2014_vviale;charset=utf8', "spec2014_vviale", "JhKP874#");
    $projects = getProjects($db);
    $projects->setFetchMode(PDO::FETCH_OBJ);


} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}






?>



<!doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Victor Viale - Développeur Web - Portfolio</title>
	<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:400,600' rel='stylesheet' type='text/css'> 
	<link rel="stylesheet" href="assets/normalize.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

	<!-- background image from pixelperfectdigital.com -->
</head>

<body>
<!--
-
-
LES IMAGES SONT DES PLACEHOLDERS POUR DES FUTURS ELEMENTS JAVASCRIPT
-
-

Changements : 

-passer cercles avant animation
mettre le telechargement du CV dans competences
formule math peu parlante
-bande noire pour fermer le site
-->


	<header class="abs-center">

		<div>
			<h1>Victor Viale</h1>
			<h2>Développeur web</h2>
			<img src="assets/img/logo.png" alt="Logo de Victor Viale">
			<ul id="social">
				<li id="twitter">
					<a href="http://twitter.com/Koroeskohr">
						<img src="assets/img/twitter.png" alt="Twitter de Victor Viale">
					</a>
				</li>
				<li id="linkedin">
					<a href="http://www.linkedin.com/profile/view?id=223720209">
						<img src="assets/img/linkedin.png" alt="Page LinkedIn de Victor Viale">
					</a>
				</li>
				<li id="mail">
					<a href="#contact">
						<img src="assets/img/email.png" alt="Envoyer un mail à Victor Viale">
					</a>
				</li>
			</ul>

		</div>


	</header>
	<section id="projects" class="container">
		<h1>Projets</h1>

		<?php 
			while ($project = $projects->fetch()) :
		?>
		<section data-scroll-reveal>
			<a class="fancybox" rel="group" href="assets/img/big_<?php echo $project->img; ?>">
				<img src="<?php echo 'assets/img/'.$project->img; ?>" alt="<?php echo utf8_encode($project->titre); ?>">
			</a>
			<h1><?php echo utf8_encode($project->titre); ?></h1>
			<h2><?php echo utf8_encode($project->poste); ?></h2>
			<p><?php echo utf8_encode($project->description); ?></p>
		</section>
		<?php endwhile;
		$projects->closeCursor(); ?>

	</section>


	<section id="skills" class="container">
		<h1>Compétences</h1>


		<h2>Qu'est ce que je sais faire ?</h2>
		<div id="skillbars">
			<figure>
				<input type="text" class="skillCircle" data-targetValue="0" id="skill1">
				<figcaption>PHP</figcaption>
			</figure>
			<figure>
				<input type="text" class="skillCircle" data-targetValue="0" id="skill2">
				<figcaption>Ruby/Ruby on Rails</figcaption>
			</figure>
			<figure>
				<input type="text" class="skillCircle" data-targetValue="0" id="skill3">
				<figcaption>Intégration Web</figcaption>
			</figure>
			<figure>	
				<input type="text" class="skillCircle" data-targetValue="0" id="skill4">
				<figcaption>JavaScript</figcaption>
			</figure>
			<figure>
				<input type="text" class="skillCircle" data-targetValue="0" id="skill5">
				<figcaption>Gestion de projet</figcaption>
			</figure>
			<figure>
				<input type="text" class="skillCircle" data-targetValue="0" id="skill6">
				<figcaption>Skill</figcaption>
			</figure>
		</div>



		<p class="no-margin-bot">Apparemment, je suis plutôt bon en </p>
		<div id="rotation">
			<span class="word" id="word1">PHP</span>
			<span class="word" id="word2" style="display:none;">Ruby</span>
			<span class="word" id="word3" style="display:none;">JavaScript</span>
			<span class="word" id="word4" style="display:none;">un peu tout, en fait.</span>
		</div>
		
		<div id="cssAnim"></div>
		

		<p class="margin-top">Embauchez-moi !</p>
		<p class="code">Entreprise.gloireEtFortune = <span id="exp">Math.exp(x);</span></p>

		
		<canvas id="plot" width="500" height="500" data-scroll-inin></canvas>
		
		

	</section>

	<section id="about" class="container">
		<h1>A propos de moi</h1>
		<img src="assets/img/photo.png" alt="Photo de Victor Viale">
		<h2>Victor Viale</h2>
		<h3>Développeur Web</h3>
		<p>Passionné par le Web, le multimédia et les nouvelles technologies depuis très longtemps, j'ai décidé d'en faire mon métier.</p>
		<p>J'aime particulièrement travailler en équipe sur des projets importants, j'ai d'ailleurs une bonne connaissance de la gestion de projet.</p>
		<p>Plus un projet m'intéresse et plus je serai efficace, jusqu'à passer mes nuits dessus. Confiez-moi un travail, allez-y ! :)</p>

	</section>
	<section id="hobbies" class="container">
		<h1>Mes passions</h1>

		<p>Je suis un grand fan de la culture geek : jeux vidéo et japanimation sont mes grands passe-temps.</p>
		<p>J'aime également beaucoup la musique, que j'écoute en permanence.</p>

		<img src="assets/img/placeholder_anim.png" alt="">


	</section>
	<section id="contact" class="container">
		<h1>Me contacter</h1>
		<div>
			<label for="name" data-scroll-reveal>Votre nom : </label><input type="text" id="name" name="name" data-scroll-reveal>
			<label for="mail" data-scroll-reveal='after 0.1s'>Votre adresse email : </label><input type="text" id="mail" name="mail" data-scroll-reveal='after 0.1s'>
			<label for="subject" data-scroll-reveal='after 0.2s'>Sujet : </label><input type="text" id="subject" name="subject" data-scroll-reveal='after 0.2s'>
			
			<label for="message" data-scroll-reveal='after 0.3s'>Votre message :</label><textarea name="message" id="message" data-scroll-reveal='after 0.3s'></textarea>

			<button id="sendMail" data-scroll-reveal='after 0.4s'>Envoyer</button>
		</div>
		
	</section>

	<footer>
		<p>Victor Viale - Développeur Web - <?php echo date("Y"); ?></p>
	</footer>


	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/Chart.min.js"></script>
	<script src="assets/js/scrollReveal.min.js"></script>
	<script src="assets/js/in-viewport.js"></script>

	<script src="assets/js/jquery.circular-progress-bar.js"></script>
	<script src="assets/js/jquery.knob.js"></script>
	
	<script type="text/javascript" src="assets/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<script src="script.js"></script>
</body>

</html>
