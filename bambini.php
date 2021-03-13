<HTML>
<HEAD>
	<TITLE>Conferma inserimento</TITLE>
</HEAD>
<BODY>
<?php
	$nome=$_POST["nome"]; 
	$cognome=$_POST["cognome"];
	$classe=$_POST["classe"];
	$sesso=$_POST["sesso"];
	$pregrest=$_POST["pregrest"];
	$mensa=$_POST["mensa"];
	$iscritto_sett_1=$_POST["iscritto_sett_1"];
	$pagata_sett_1=$_POST["pagata_sett_1"];
	$iscritto_sett_2=$_POST["iscritto_sett_2"];
	$pagata_sett_2=$_POST["pagata_sett_2"];
	$iscritto_sett_3=$_POST["iscritto_sett_3"];
	$pagata_sett_3=$_POST["pagata_sett_3"];
	$iscritto_sett_4=$_POST["iscritto_sett_4"];
	$pagata_sett_4=$_POST["pagata_sett_4"];
	$telefono1=$_POST["telefono1"];
	$telefono2=$_POST["telefono2"];
	$telefono3=$_POST["telefono3"];
	$squadra=$_POST["squadra"];
	$gita1sett1=$_POST["gita1sett1"];
	$gita2sett1=$_POST["gita2sett1"];
	$gita1sett2=$_POST["gita1sett2"];
	$gita2sett2=$_POST["gita2sett2"];
	$gita1sett3=$_POST["gita1sett3"];
	$gita2sett3=$_POST["gita2sett3"];
	$gita1sett4=$_POST["gita1sett4"];
	$gita2sett4=$_POST["gita2sett4"];
	// inizio gestione connessione e inserimento
	$host_name='localhost';
	$user_name='root';
	$conn=mysql_connect($host_name,$user_name,'')
	        or die ("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
	       or die ("Impossibile selezionare il database desiderato: ".mysql_error());
	$query="INSERT INTO bambini VALUES ('".$nome."','".$cognome."','".$classe."','".$sesso."','".$pregrest."','".$mensa."','".$iscritto_sett_1."','".$pagata_sett_1."','".$iscritto_sett_2."','".$pagata_sett_2."','".$iscritto_sett_3."','".$pagata_sett_3."','".$iscritto_sett_4."','".$pagata_sett_4."','".$telefono1."','".$telefono2."','".$telefono3."','".$squadra."','".$gita1sett1."','".$gita2sett1."','".$gita1sett2."','".$gita2sett2."','".$gita1sett3."','".$gita2sett3."','".$gita1sett4."','".$gita2sett4."')";
	$risultato=mysql_query($query)
		or die("Impossibile effettuare l'inserimento del bambino: ".mysql_error());
	if($risultato) 
		echo("Inserimento effettuato con successo");
	else
		echo("Inserimento fallito");
	mysql_close($conn);
?>
<BR><BR>
<A HREF="bambini1.php">Torna alla pagina di inserimento dati nella tabella bambini</A>
<BR>
<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>