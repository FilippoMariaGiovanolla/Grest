<HTML>
<HEAD>
	<TITLE>Attuazione cancellazione</TITLE>
</HEAD>
<BODY>
	<?php
		$codice=$_POST["codice"];
		$hostname='localhost';
		$username='root';
		$conn=mysql_connect($hostname,$username,'')
			or die("Impossibile stabilire una connessione con il server");
		$db=mysql_select_db("grest")
			or die("Impossibile selezionare il database del grest");
		$query="DELETE FROM Giochi
			    WHERE Codice='$codice' ";
		$risultato=mysql_query($query)
			or die("Cancellazione fallita; chiudere la pagina");
		echo("Cancellazione avvenuta con successo; il gioco avente codice ".$codice." non rientra pi� nella tabella Giochi");
	?>
	<BR>
	<BR>
	<A HREF="CancellazioneGioco.php">Torna alla pagina precedente</A><BR><BR>
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>