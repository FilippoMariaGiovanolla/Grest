<HTML>
<HEAD>
	<TITLE>Numero bambini a mensa seconda settimana</TITLE>
</HEAD>
<BODY>
<?php
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="SELECT COUNT(*) 
		    FROM bambini
		    WHERE IscrittoSett_2='si' AND Mensa='si' ";
	$risultato=mysql_query($query)
		or die("Query fallita: ".mysql_error());
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Numero totale dei bambini che si fermano a mensa la seconda settimana</B></TD>					
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
    <A HREF="index.htm">Torna alla pagina di Gestione Grest</A> <BR>
    <A HREF="VisualizzazioniBambini.html">Torna alle visualizzazioni dei bambini</A>
</BODY>
</HTML>
