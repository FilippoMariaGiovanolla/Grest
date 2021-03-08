<HTML>
<HEAD>
	<TITLE>Dati bambini</TITLE>
</HEAD>
<BODY>
<?php
	$hostname='localhost';
	$username='pippo';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server");
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest");
	$query="SELECT *
		    FROM Bambini
		    ORDER BY Classe, Cognome, Nome";
	$risultato=mysql_query($query)
		or die("Query fallita");
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo("<H3><CENTER>Elenco dei dati di tutti i bambini iscritti al Grest</CENTER></H3>");
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Nome</B></TD>
					<TD><B>Cognome</B></TD>
					<TD><B>Classe</B></TD>
					<TD><B>Sesso</B></TD>
					<TD><B>Pre-Grest</B></TD>
					<TD><B>Fruizione servizio mensa</B></TD>
					<TD><B>Iscrizione alla prima settimana</B></TD>
					<TD><B>Pagamento prima settimana</B></TD>
					<TD><B>Iscrizione alla seconda settimana</B></TD>
					<TD><B>Pagamento seconda settimana</B></TD>
					<TD><B>Iscrizione alla terza settimana</B></TD>
					<TD><B>Pagamento terza settimana</B></TD>
					<TD><B>Iscrizione alla quarta settimana</B></TD>
					<TD><B>Pagamento quarta settimana</B></TD>
					<TD><B>Telefono 1</B></TD>
					<TD><B>Telefono 2</B></TD>
					<TD><B>Telefono 3</B></TD>
					<TD><B>Squadra</B></TD>
					<TD><B>Uscita 1 sett 1</B></TD>
					<TD><B>Uscita 2 sett 1</B></TD>
					<TD><B>Uscita 1 sett 2</B></TD>
					<TD><B>Uscita 2 sett 2</B></TD>
					<TD><B>Uscita 1 sett 3</B></TD>
					<TD><B>Uscita 2 sett 3</B></TD>
					<TD><B>Uscita 1 sett 4</B></TD>
					<TD><B>Uscita 2 sett 4</B></TD>					
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
    <A HREF="VisualizzazioniBambini.html">Torna alle visualizzazioni dei bambini</A>
</BODY>
</HTML>
