<HTML>
<HEAD>
	<TITLE>Conferma inserimento</TITLE>
</HEAD>
<BODY>
<?php
	$codice=$_POST["codice"]; 
	$nome=$_POST["nome"];
	$descrizione=$_POST["descrizione"];
	$nomerelatore=$_POST["nomerelatore"];
	$cognomerelatore=$_POST["cognomerelatore"];	
	// inizio gestione connessione e inserimento
	$host_name='localhost';
	$user_name='root';
	$conn=mysql_connect($host_name,$user_name,'')
	        or die ("Impossibile stabilire una connessione con il server");
	$db=mysql_select_db("grest")
	       or die ("Impossibile selezionare il database desiderato");
	$query="INSERT INTO giochi VALUES ('$codice','$nome','$descrizione','$nomerelatore','$cognomerelatore')";
	$risultato=mysql_query($query);
	if($risultato) 
		echo("Inserimento effettuato con successo");
	else
		echo("Inserimento fallito");
	mysql_close($conn);
?>
<BR><BR>
<A HREF="giochi1.php">Torna alla pagina di inserimento dati nella tabella giochi</A>
<BR>
<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>