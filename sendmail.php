<?php
	/*
		Met dit script kun je de inhoud van een willekeurig formulier naar een mailadres versturen. Zie commentaar voor de werking.
		Belangrijk is dat het formulier met de post-methode (dus niet met de get-methode) wordt verstuurd.
		Geschreven door A. Reuneker, 2013. Het script mag worden overgenomen, gekopieerd en aangepast.
	*/
	$to			= "christiaanwapenaar@hotmail.com";					//Vul hier het mailadres waarnaartoe de gegevens moeten worden verstuurd.
	//$subject	= "Mailformulier";						//Vul hier het onderwerp van de mail in. Kan eventueel ook een door de gebruiker ingevoerd onderwerp zijn.
	$subject	= $_POST['subject']; 					//Als je de gebruiker een onderwerp van de mail wilt laten invullen, gebruik dan deze regel en zorg ervoor dat je formulier een veld met als naam 'subject' bevat.
	$sender		= $_POST['email'];						//Het e-mailadres van de gebruiker. Het formulier moet een veld met als naam 'email' bevatten.
	$headers	= "From: $sender";						//De inhoud van variabele $sender wordt aan de e-mail toegevoegd als afzender.
	$redirect	= "verzonden.html";	//Welke pagina moet de gebruiker zien nadat de e-mail is verstuurd?
	foreach($_POST as $key => $val) {					//Vraag elk veld uit het formulier op in naam-waarde-paren.
		$message .= "$key: $val\n";						//Voeg de naam-waarde-paren toe aan de variabele $message.
	} 
	mail($to, $subject, $message, $headers);			//Verstuur de e-mail naar $to, met $subject als onderwerp, $message als bericht en $headers als afzender.
	header("Location: $redirect");						//Verwijs de gebruiker direct na het versturen (fractie van een seconde) terug naar de gewenste pagina.
?>