<HTML>
<HEAD>
<TITLE>Dati del gioco selezionato</TITLE>
</HEAD>
<BODY>
<?php
	$nome=$_POST["nome"];
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="SELECT *
		    FROM giochi
		    WHERE Nome='".$nome."'";
	$risultato=mysql_query($query)
		or die("Query fallita: ".mysql_error());
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo"<CENTER>Dati del gioco selezionato</CENTER>";
		echo"<BR>";
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Codice</B></TD>
					<TD><B>Nome</B></TD>
					<TD><B>Descrizione</B></TD>
					<TD><B>NomeRelatore</B></TD>
					<TD><B>CognomeRelatore</B></TD>
				</TR>");
		while ($riga=mysql_fetch_row($risultato))
		       {
			  echo("<TR>");
			  for ($j=0;$j<$colonne;$j++)
			      echo("<TD><CENTER>".$riga[$j]."</CENTER></TD>");
			  echo("</TR>");
		       }
		echo("</TABLE>");
	  } // fine if ($righe>0)
	else echo("<H3>Non sono presenti dati che soddisfano la richiesta</H3>");
	mysql_close($conn);
?>
     <BR>
    <A HREF="VisioGiochi.php">Torna alla pagina precedente</A> <BR>
    <A HREF="index.htm">Torna alla pagina di Gestione Grest</A> <BR>
</BODY>
</HTML>