<HTML>
<HEAD>
	<TITLE>Attuazione modifica</TITLE>
<HEAD>
<BODY>
     <?php
	$colore_vecchio=$_POST["colore_vecchio"];
	$colore=$_POST["colore"];
	$nome=$_POST["nome"]; 
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="UPDATE squadre
		    SET Colore='".$colore."',Nome='".$nome."' 
		    WHERE Colore='".$colore_vecchio."'";
	$risultato=mysql_query($query);
	if($risultato)
             {	
		echo("Modifica effettuata con successo, i nuovi dati della squadra sono i seguenti: <BR><BR>");
		$query2="SELECT *
			      FROM squadre
			      WHERE Colore='".$colore."'";
		$risultato2=mysql_query($query2)
			or die("Impossibile mostrare i nuovi dati della squadra: ".mysql_error());
		$righe=mysql_num_rows($risultato2);
		$colonne=mysql_num_fields($risultato2);
		if ($righe>0)
		  {
		        echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Colore</B></TD>
					<TD><B>Nome</B></TD>									
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
     <A HREF="ModificaSquadra1.php">Torna alla pagina di inserimento dati di modifica</A><BR><BR>
     <A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>