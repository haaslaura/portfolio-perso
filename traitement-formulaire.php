<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Contrôler les paramètres
	if (
		(!isset($_POST['prenom']) || empty($_POST['prenom']))
		|| (!isset($_POST['nom']) || empty($_POST['nom']))
		|| (!isset($_POST['societe']) || empty($_POST['societe']))
		|| (!isset($_POST['adresse']) || empty($_POST['adresse']))
		|| (!isset($_POST['fonction']) || empty($_POST['fonction']))
		|| (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		|| (!isset($_POST['message']) || empty($_POST['message']))
	)
	{
		echo ('Merci de remplir l\'ensemble des champs.');
		return;
	}
	
	// Récupérer les données du formulaire
 	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$societe = $_POST['societe'];
	$adresse = $_POST['adresse'];
	$fonction = $_POST['fonction'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$jour = $_POST['jour'];
	$moment = $_POST['moment'];
	$message = $_POST['message'];
	
	// Adresse e-mail de destination
	$destinataire = "haaslaura@live.fr";

	// Construction du corps de l'e-mail
	$corpsEmail = htmlspecialchars("De: $prenom $nom, $fonction\n");
	$corpsEmail .= htmlspecialchars("Email: $email\n");
	$corpsEmail .= htmlspecialchars("Téléphone: $phone\n");
	$corpsEmail .= htmlspecialchars("Société: $societe\n");
	$corpsEmail .= htmlspecialchars("Siège social: $adresse\n");
	$corpsEmail .= htmlspecialchars("Meilleur moment pour rappeler: $jour à $moment\n");
	$corpsEmail .= htmlspecialchars("Message:\n$message");
	
		// Envoi de l'e-mail
	$resultat = mail($destinataire, "Nouveau message depuis le formulaire de contact", $corpsEmail);

	if ($resultat) {
		echo "Je vous remercie ! Votre message a bien été envoyé.";
		} else {
			echo "Désolé, une erreur s'est produite lors de l'envoi du message.";
			}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Accueil | Laura Haas, Développeuse</title>
		<link rel="stylesheet" href="style.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="canonical" href="https://laura-haas.dev/" />
		<link rel="icon" href="medias/favicon.ico">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
	</head>
	
	<body>
		<!-- Ajout du header -->
		<?php include('header.php'); ?>
		
		<main>
			<section class="section-center">
				<h2>Merci pour votre message</h2>
				<p>Je vous remercie pour votre message <?php echo($_POST['prenom']); ?>. Celui-ci m'a bien été transmis, et je vous répondrai sous peu.</p><br>
				<p>Dans l'attente, si nous nous connections via LinkedIn ?</p>
				<p class="button1"><a href="#https://laura-haas.dev/">Retourner à l'accueil</a></p>
				<p class="button2"><a href="#https://www.linkedin.com/in/laurahaas-developpement/" target="_blank">Me rejoindre sur LinkedIn</a></p>
			</section>
		</main>
		<!-- Ajout du footer -->
		<?php include('footer.php'); ?>
		
	</body>
	
</html>