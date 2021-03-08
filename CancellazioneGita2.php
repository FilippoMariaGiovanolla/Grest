<HTML>
<HEAD>
	<TITLE>Attuazione cancellazione</TITLE>
</HEAD>
<BODY>
	<?php
		$codice=$_POST["codice"];
		$hostname='localhost';
		$username='pippo';
		$conn=mysql_connect($hostname,$username,'')
			or die("Impossibile stabilire una connessione con il server");
		$db=mysql_select_db("grest")
			or die("Impossibile selezionare il database del grest");
		$query="DELETE FROM Gite
			    WHERE Codice='$codice' ";
		$risultato=mysql_query($query)
			or die("Cancellazione fallita; chiudere la pagina");
		echo("Cancellazione avvenuta con successo; la gita/uscita avente codice ".$codice." non rientra più nella tabella Gite/uscite");
	?>
	<BR>
	<BR>
	<A HREF="CancellazioneGita.php">Torna alla pagina precedente</A><BR><BR>
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>