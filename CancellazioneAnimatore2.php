<HTML>
<HEAD>
	<TITLE>Attuazione cancellazione</TITLE>
</HEAD>
<BODY>
	<?php
		$nome=addslashes($_POST["nome"]);
		$cognome=addslashes($_POST["cognome"]);
		$nomeFraseConferma=$_POST["nome"];
		$cognomeFraseConferma=$_POST["cognome"];
		//echo("Nome: ".$nome."<br>");
		//echo("Cognome: ".$cognome."<br>");
		$hostname='localhost';
		$username='root';
		$conn=mysql_connect($hostname,$username,'')
			or die("Impossibile stabilire una connessione con il server: ".mysql_error());
		$db=mysql_select_db("grest")
			or die("Impossibile selezionare il database del grest: ".mysql_error());
		$query="DELETE FROM animatori
			    WHERE Nome='".$nome."' AND Cognome='".$cognome."'";
		$risultato=mysql_query($query)
			or die("Cancellazione fallita; chiudere la pagina: ".mysql_error());
		echo("Cancellazione avvenuta con successo; ".$nomeFraseConferma." ".$cognomeFraseConferma." non rientra pi&ugrave; nella tabella Animatori");
	?>
	<BR>
	<BR>
	<A HREF="CancellazioneAnimatore.php">Torna alla pagina precedente</A><BR><BR>
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>