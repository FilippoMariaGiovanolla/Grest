<HTML>
<HEAD>
	<TITLE>Attuazione cancellazione</TITLE>
</HEAD>
<BODY>
	<?php
		$nome=addslashes($_POST["nome"]);
		$cognome=addslashes($_POST["cognome"]);
		$nomeConfermaCancellazione=$_POST["nome"];
		$cognomeConfermaCancellazione=$_POST["cognome"];
		$hostname='localhost';
		$username='root';
		$conn=mysql_connect($hostname,$username,'')
			or die("Impossibile stabilire una connessione con il server: ".mysql_error());
		$db=mysql_select_db("grest")
			or die("Impossibile selezionare il database del grest: ".mysql_error());
		$query="DELETE FROM bambini
			    WHERE Nome='".$nome."' AND Cognome='".$cognome."'";
		$risultato=mysql_query($query)
			or die("Cancellazione fallita; chiudere la pagina");
		echo("Cancellazione avvenuta con successo; ".$nomeConfermaCancellazione." ".$cognomeConfermaCancellazione." non rientra pi&ugrave; nella tabella Bambini");
	?>
	<BR>
	<BR>
	<A HREF="CancellazioneBambino.php">Torna alla pagina precedente</A><BR><BR>
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>