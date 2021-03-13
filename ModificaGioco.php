<HTML>
<HEAD>
	<TITLE>Attuazione modifica</TITLE>
<HEAD>
<BODY>
     <?php
	$nome_vecchio=$_POST["nome_vecchio"];
	$codice=$_POST["codice"];
	$nome=$_POST["nome"];
	$descrizione=$_POST["descrizione"];
	$nomerelatore=$_POST["nomerelatore"];
	$cognomerelatore=$_POST["cognomereleatore"];	
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="UPDATE giochi
		    SET Codice='".$codice."',Nome='".$nome."',Descrizione='".$descrizione."',NomeRelatore='".$nomerelatore."', CognomeRelatore='".$cognomerelatore."'
		    WHERE Nome='".$nome_vecchio."'";
	$risultato=mysql_query($query);
	if($risultato)
             {	
		echo("Modifica effettuata con successo, i nuovi dati del gioco sono i seguenti: <BR><BR>");
		$query2="SELECT *
			      FROM giochi
			      WHERE Codice='".$codice."'";
		$risultato2=mysql_query($query2)
			or die("Impossibile mostrare i nuovi dati del bambino: ".mysql_error());
		$righe=mysql_num_rows($risultato2);
		$colonne=mysql_num_fields($risultato2);
		if ($righe>0)
		  {
		        echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Codice</B></TD>
					<TD><B>Nome</B></TD>
					<TD><B>Descrizione</B></TD>
					<TD><B>Nome animatore che lo spiega</B></TD>
					<TD><B>Cognome animatore che lo spiega</B></TD>

				</TR>");
			while ($riga=mysql_fetch_row($risultato2))
			   {
				echo("<TR>");
				for ($j=0;$j<$colonne;$j++)
				    echo("<TD>".$riga[$j]."</TD>");
				echo("</TR>");
			   } // fine while
			echo("</TABLE>");
		  } // fine if($righe>0)
	      } // fine if($risultato)
	else
	      {
		echo("Modifica fallita <BR>");
		echo("".mysql_error()); // visualizza il messaggio di errore del server MySQL
	      }
	mysql_close($conn);
     ?>
     <BR>
     <A HREF="ModificaGioco1.php">Torna alla pagina di inserimento dati di modifica</A><BR><BR>
     <A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>