<HTML>
<HEAD>
	<TITLE>Bambini pre-Grest</TITLE>
</HEAD>
<BODY>
<?php
	$hostname='localhost';
	$username='pippo';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server");
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest");
	$query="SELECT Nome, Cognome, IscrittoSett_1, IscrittoSett_2, IscrittoSett_3, IscrittoSett_4
		    FROM Bambini
		    WHERE PreGrest='si'
		    ORDER BY Classe, Cognome, Nome";
	$risultato=mysql_query($query)
		or die("Query fallita");
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo("<H3><CENTER>Elenco dei bambini che usufruiscono del pre-Grest</CENTER></H3>");
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Nome</B></TD>
					<TD><B>Cognome</B></TD>
					<TD><B>Iscrizione alla prima settimana</B></TD>					
					<TD><B>Iscrizione alla seconda settimana</B></TD>					
					<TD><B>Iscrizione alla terza settimana</B></TD>					
					<TD><B>Iscrizione alla quarta settimana</B></TD>		
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
