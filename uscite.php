<HTML>
<HEAD>
	<TITLE>Conferma inserimento</TITLE>
</HEAD>
<BODY>
<?php
	$codice=$_POST["codice"];
	$descrizione=$_POST["descrizione"];
	// inizio gestione connessione e inserimento
	$host_name='localhost';
	$user_name='root';
	$conn=mysql_connect($host_name,$user_name,'')
	        or die ("Impossibile stabilire una connessione con il server");
	$db=mysql_select_db("grest")
	       or die ("Impossibile selezionare il database desiderato");
	$query="INSERT INTO gite VALUES ('$codice','$descrizione')";
	$risultato=mysql_query($query);
	if($risultato) 
		echo("Inserimento effettuato con successo");
	else
		echo("Inserimento fallito");
	mysql_close($conn);
?>
<BR><BR>
<A HREF="uscite.html">Torna alla pagina di inserimento dati nella tabella Gite/Uscite</A>
<BR>
<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>