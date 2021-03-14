<HTML>
<HEAD>
	<TITLE>Conferma inserimento</TITLE>
</HEAD>
<BODY>
<?php
	$nome=addslashes($_POST["nome"]); 
	$cognome=addslashes($_POST["cognome"]);
	$sesso=$_POST["sesso"];
	$turno=addslashes($_POST["turno"]);
	$telefono1=addslashes($_POST["telefono1"]);
	$telefono2=addslashes($_POST["telefono2"]);
	$telefono3=addslashes($_POST["telefono3"]);
	$squadra=addslashes($_POST["squadra"]);
	// inizio gestione connessione e inserimento
	$host_name='localhost';
	$user_name='root';
	$conn=mysql_connect($host_name,$user_name,'')
	        or die ("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
	       or die ("Impossibile selezionare il database desiderato: ".mysql_error());
	$query="INSERT INTO animatori VALUES ('".$nome."','".$cognome."','".$sesso."','".$turno."','".$telefono1."','".$telefono2."','".$telefono3."','".$squadra."')";
	$risultato=mysql_query($query);
	if($risultato) 
		echo("Inserimento effettuato con successo");
	else
		echo("Inserimento fallito");
	mysql_close($conn);
?>
<BR><BR>
<A HREF="animatori1.php">Torna alla pagina di inserimento dati nella tabella animatori</A>
<BR>
<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>