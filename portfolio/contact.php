<?php

require_once("lib/PHPMailer/PHPMailerAutoload.php");

//ajax, es-tu là ? 
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	$output = json_encode(
	array(
		'type'=>'error', 
		'text' => 'La requête doit etre faite en AJAX'
	));

	die($output);
} 

//sanitisationner les valeurs 
$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$mailAddress = filter_var($_POST["mail"], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
$message  = filter_var($_POST["message"], FILTER_SANITIZE_STRING);



//name mail subject message

if (isset($name) && !empty($name)){
	$mail = new PHPMailer();
	$mail->FromName = $name;
	$mail->addAddress('somebodywas@gmail.com','Victor Viale');
	
	if (isset($subject) && !empty($subject)) {
		$mail->Subject = $subject;

		if (isset($mailAddress) && !empty($mailAddress)) {
			$mail->From = $mailAddress;

			if (isset($message) && !empty($message)) {
				$mail->Body = $message;

				if (!$mail->send()){
					$erreur = json_encode(array('type'=>'error', 'text' => "Erreur lors de l'envoi du mail : $mail->ErrorInfo"));
					die($erreur);

				}
				else {
					$message = json_encode(array('type'=>'message', 'text' => 'Le message a bien été envoyé !'));
					die($message);
				}
			}//message

		} //courriel expéditeur

	}//sujet

}//nom expediteur

?>