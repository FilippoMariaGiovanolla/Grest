<HTML>
<HEAD>
	<TITLE>Bambini terza settimana</TITLE>
</HEAD>
<BODY>
<?php
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="SELECT Nome,Cognome
		    FROM bambini
		    WHERE IscrittoSett_3='si'
		    ORDER BY Classe, Cognome, Nome";
	$risultato=mysql_query($query)
		or die("Query fallita: ".mysql_error());
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo("<H3><CENTER>Elenco dei bambini iscritti alla terza settimana</CENTER></H3>");
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Nome</B></TD>
					<TD><B>Cognome</B></TD>
				</TR>");
		while ($riga=mysql_fetch_row($risultato))
		       {
			  echo("<TR>");
			  for ($j=0;$j<$colonne;$j++)
			      echo("<TD>".$riga[$j]."</TD>");
			  echo("</TR>");
		       }
		echo("</TABLE>");
	  } // fine if ($righe>0)
	else echo("<H3>Non sono presenti dati che soddisfano la richiesta</H3>");
	mysql_close($conn);
?>
    <A HREF="index.htm">Torna alla pagina di Gestione Grest</A> <BR>
    <A HREF="VisualizzazioniBambini.html">Torna alle visualizzazioni dei bambini</A>
</BODY>
</HTML>
