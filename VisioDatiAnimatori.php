<HTML>
<HEAD>
	<TITLE>Dati animatori</TITLE>
</HEAD>
<BODY>
<?php
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server");
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest");
	$query="SELECT *
		    FROM Animatori
		    ORDER BY ColoreSquadra, Cognome, Nome";
	$risultato=mysql_query($query)
		or die("Query fallita");
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo("<H3><CENTER>Elenco dei dati di tutti gli animatori</CENTER></H3>");
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Nome</B></TD>
					<TD><B>Cognome</B></TD>
					<TD><B>Sesso</B></TD>
					<TD><B>Turno</B></TD>
					<TD><B>Telefono 1</B></TD>
					<TD><B>Telefono 2</B></TD>
					<TD><B>Telefono 3</B></TD>
					<TD><B>Squadra</B></TD>
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
     <BR>
    <A HREF="index.htm">Torna alla pagina di Gestione Grest</A> <BR>
</BODY>
</HTML>
