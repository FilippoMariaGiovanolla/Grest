<HTML>
<HEAD>
<TITLE>Numero gite/uscite</TITLE>
</HEAD>
<BODY>
<?php
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server");
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest");
	$query="SELECT COUNT(*)
		    FROM gite";
	$risultato=mysql_query($query)
		or die("Query fallita");
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Numero delle gite/uscite presenti</B></TD>
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
    <A HREF="VisioGite.php">Torna alla pagina precedente</A> <BR>
    <A HREF="index.htm">Torna alla pagina di Gestione Grest</A> <BR>
</BODY>
</HTML>