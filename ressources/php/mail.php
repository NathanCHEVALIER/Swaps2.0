<?php

function sendmail($email){
	
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email))
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = 'Et si on changeait nos habitudes de navigation sur Internet ? Et si on créait de vraies relations sociales basées sur l’entraide ? Et si on mettait vraiment en avant nos compétences plutôt que nos diplômes ? Avec Swaps, concrétisez ces propositions !
            Swaps a pour objectif de faciliter l’échange sur les multiples sujets pour lesquels vous avez des compétences et des connaissances, de vous rapprocher autour de vos centres d’intérêts, en mettant vraiment l’accent sur l’échange et en respectant votre vie privée.
			Puisque les premiers retours ont été positifs, nous avons lancé comme prévu une campagne de financement participatif. Elle nous permettra de pouvoir faire face aux divers coûts générés par le lancement du projet (hébergement serveurs, certificats de sécurité, matériel...).
Vous pouvez donc dès à présent mettre un peu d\'argent dans la cagnotte Kisskissbankbank: https://www.kisskissbankbank.com/fr/projects/swaps-le-reseau-d-echange-qui-protege-votre-vie-privee';
	$message_html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
					   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
					<html xlmns:v="urn:schemas-microsoft-com:vml" >
						<head>
							<meta http-equiv="content-type" content="text/html; charset=utf-8" />
                            <meta charset="utf-8" />
							<meta name="viewport" content="width=device-width; initial-scape=1.0; maximum-scale=1.0;" />
							<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
						</head>

						<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
							<table bgcolor="#FFFFFF" width="100%" border="0" cellpadding="0" cellspacing="0" >
								<tbody>
								<!-- Header -->
									<tr>
										<td valign="top" bgcolor="#AF0000">
											<table bgcolor="#AF0000" align="center" width="50%" border="0" cellpadding="0" cellspacing="0" >
											    <tbody>
													<tr>
												 		<td height="15" style="font-size: 15px; line-height: 15px;">
												 			&nbsp;
												    	</td>
												    </tr>
												    <tr>
												    	<td style="text-align: center;">
												    		<a href="http://swaps.esy.es">
												    			<img src="http://swaps.esy.es/ressources/images/images/swaps/logo_accueil_blanc.png" height="80px" border="0" alt="Logo de Swaps" />
												    		</a>
												    	</td>
												    </tr>
												    <tr>
												    	<td height="15" style="font-size: 15px; line-height: 15px;">
															&nbsp;
												    	</td>
												    </tr>
												    <tr>
												    	<td align="center" style="text-align: center; font-size: 24px; color: #FFFFFF; font-family: \'Ubuntu\', sans-serif;">
															Swaps: le réseau d\'échange qui protège votre vie privée
												    	</td>
												    </tr>
												    <tr>
												    	<td height="15" style="font-size: 15px; line-height: 15px;">
															&nbsp;
												    	</td>
												    </tr>
											    </tbody>
											</table>
										</td>
									</tr>
									<!-- Fin header-->
									<!-- body -->
									<tr>
										<td valign="top" bgcolor="#FFFFFF">
											<table bgcolor="#FFFFFF" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" >
											    <tbody>
													<tr>
														<td height="30" style="font-size: 30px; line-height: 30px;">
															&nbsp;
												    	</td>
													</tr>
													<tr>
														<table align="center" width="80%" border="0" cellpadding="0" cellspacing="0" >
												    		<tbody>
												    			<tr>
												    				<td align="center" style="text-align: center; font-size: 16px; color: #444444; font-family: \'Ubuntu\', sans-serif;">
												    					Et si on changeait nos habitudes de navigation sur Internet ? Et si on créait de vraies relations sociales basées sur l’entraide ? Et si on mettait vraiment en avant nos compétences plutôt que nos diplômes ? Avec Swaps, concrétisez ces propositions !
                                                                        <br /><br />
												    				</td>
												    			</tr>
																<tr>
																	<td align="center" style="text-align: center; font-size: 14px; color: #444444; font-family: \'Ubuntu\',sans-serif;">
																		Swaps a pour objectif de faciliter l’échange sur les multiples sujets pour lesquels vous avez des compétences et des connaissances, de vous rapprocher autour de vos centres d’intérêts, en mettant vraiment l’accent sur l’échange et en respectant votre vie privée.<br /><br />
																	</td>
																</tr>
																
																<tr>
																	<td align="center" style="text-align: center; font-size: 14px; color: #444444; font-family: \'Ubuntu\',sans-serif;">
																		Puisque les premiers retours ont été positifs, nous avons lancé comme prévu une campagne de financement participatif. Elle nous permettra de pouvoir faire face aux divers coûts générés par le lancement du projet (hébergement serveurs, certificats de sécurité, matériel...).<br /><br />
Vous pouvez donc dès à présent mettre un peu d\'argent dans la cagnotte Kisskissbankbank: https://www.kisskissbankbank.com/fr/projects/swaps-le-reseau-d-echange-qui-protege-votre-vie-privee

																	</td>
																</tr>
																
																<tr>
																	<td align="center" height="20" style="font-size: 20px; line-height: 20px; text-align: center; font-size: 14px; color: #AAAAAA; font-family: sans-serif;">
																		------------------------------------
															    	</td>
																</tr>
																<tr>
																	<td height="20" style="font-size: 20px; line-height: 20px;">
																		&nbsp;
															    	</td>
																</tr>
																<tr>
																	<td align="center" style="text-align: center; font-size: 14px; color: #777777; font-family: sans-serif;">
																
																		Toute L\'équipe Swaps vous souhaite la meilleure expérience possible sur Swaps-online !<br /><br />

																		Ceci est un mail automatique, Merci de ne pas y répondre.<br />

																		Pour toute question, veuillez nous contacter via le formulaire sur http://swaps.esy.es/contact ou à l\'email nathanchevalier.lechatelet@gmail.com
																	</td>
																</tr>
																<tr>
																	<td height="20" style="font-size: 20px; line-height: 20px;">
																		&nbsp;
															    	</td>
																</tr>
												    		</tbody>
											    		</table>
													</tr>
											    </tbody>
											</table>
										</td>
									</tr>
									<!--Fin body -->
								</tbody>
							</table>
						</body>
					</html>';
	
	$boundary = "-----=".md5(rand());

	$header = "From: \"Swaps\"<contact@swaps.esy.es>".$passage_ligne;
	$header.= "Reply-to: \"Swaps Team\"<nathanchevalier.lechatelet@gmail.com>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header .= "X-Priority: 3".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	
	$sujet = "Swaps: nous avons besoin de votre aide!";

	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;

	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

	$verif = mail($email,$sujet,$message,$header);

    if($verif == true){
        echo $email." envoyé! <br />";
    }
    else{
        echo "echoué <br />";
    }
}

    $mails = array("benjamin.stocker2@gmail.com", "killeur78320@gmail.com", "louhan1912@orange.fr", "brauninger@wandaoo.fr", "barbeherve@gmail.com", "familygigleux@free.fr",
"family.monin@gmail.com", "chevalier2139@gmail.com", "nicoledebrux@sfr.fr", "annevbb@hotmail.fr", "yves.boulenaz@laposte.net", "sea.lacroix@orange.fr", "florian.yvorra@gmail.com", "eulalie.garrigues@gmail.com",
"Killian-oliver@outlook.fr", "angeliquejulie.chevalier@gmail.com", "pierre.chevalier@inawa.fr", "benji.coupez@gmail.com", "rnbofficial.productions@gmail.com", "fannyclara.chevalier@neuf.fr", "florence.ktseurre@gmail.com", "nathanchevalier.lechatelet@gmail.com";

    foreach($mails as $email){
        sendmail($email);
    }

?>