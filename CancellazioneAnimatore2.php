<HTML>
<HEAD>
	<TITLE>Attuazione cancellazione</TITLE>
</HEAD>
<BODY>
	<?php
		$nome=$_POST["nome"];
		$cognome=$_POST["cognome"];
		$hostname='localhost';
		$username='pippo';
		$conn=mysql_connect($hostname,$username,'')
			or die("Impossibile stabilire una connessione con il server");
		$db=mysql_select_db("grest")
			or die("Impossibile selezionare il database del grest");
		$query="DELETE FROM Animatori
			    WHERE Nome='$nome' AND Cognome='$cognome' ";
		$risultato=mysql_query($query)
			or die("Cancellazione fallita; chiudere la pagina");
		echo("Cancellazione avvenuta con successo; ".$nome." ".$cognome." non rientra pi� nella tabella Animatori");
	?>
	<BR>
	<BR>
	<A HREF="CancellazioneAnimatore.php">Torna alla pagina precedente</A><BR><BR>
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>