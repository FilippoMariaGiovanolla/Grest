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
			or die("Impossibile stabilire una connessione con il server: ".mysql_error());
		$db=mysql_select_db("grest")
			or die("Impossibile selezionare il database del grest: ".mysql_error());
		$query="DELETE FROM gite
			    WHERE Codice='".$codice."'";
		$risultato=mysql_query($query)
			or die("Cancellazione fallita; chiudere la pagina: ".mysql_error());
		echo("Cancellazione avvenuta con successo; la gita/uscita avente codice ".$codice." non rientra pi&ugrave; nella tabella Gite/uscite");
	?>
	<BR>
	<BR>
	<A HREF="CancellazioneGita.php">Torna alla pagina precedente</A><BR><BR>
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>