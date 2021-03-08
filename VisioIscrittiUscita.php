<HTML>
<HEAD>
<TITLE>Elenco bambini iscritti all'uscita selezionata</TITLE>
</HEAD>
<BODY>
<?php
	$gita=$_POST["gita"];
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server");
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest");
	$query="SELECT Nome, Cognome
		    FROM bambini
		    WHERE gita1sett1='$gita' or gita2sett1='$gita' or gita1sett2='$gita' or gita2sett2='$gita' or gita1sett3='$gita' or 
			      gita2sett3='$gita' or gita1sett4='$gita' or gita2sett4='$gita'
		    ORDER BY Cognome";
	$risultato=mysql_query($query)
		or die("Query fallita");
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo"<CENTER>Elenco bambini iscritti alla gita/uscita selezionata</CENTER>";
		echo"<BR>";
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B><CENTER>Nome</CENTER></B></TD>
					<TD><B><CENTER>Cognome</CENTER></B></TD>
				</TR>");
		while ($riga=mysql_fetch_row($risultato))
		       {
			  echo("<TR>");
			  for ($j=0;$j<$colonne;$j++)
			      echo("<TD><CENTER>".$riga[$j]."</CENTER></TD>");
			  echo("</TR>");
		       }
		echo("</TABLE>");
		echo"<BR>";
		$query="SELECT Count(*)
		    FROM bambini
		    WHERE gita1sett1='$gita' or gita2sett1='$gita' or gita1sett2='$gita' or gita2sett2='$gita' or gita1sett3='$gita' or 
			      gita2sett3='$gita' or gita1sett4='$gita' or gita2sett4='$gita'";
		$risultato=mysql_query($query)
		or die("Query fallita");
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B><CENTER>Numero totale</CENTER></B></TD>					
				</TR>");
		while ($riga=mysql_fetch_row($risultato))
		       {
			  echo("<TR>");
			  for ($j=0;$j<$colonne-1;$j++)
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