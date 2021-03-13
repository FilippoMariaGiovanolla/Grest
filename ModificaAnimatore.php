<HTML>
<HEAD>
	<TITLE>Attuazione modifica</TITLE>
<HEAD>
<BODY>
     <?php
    $nome_vecchio=$_POST["nome_vecchio"];
	$cognome_vecchio=$_POST["cognome_vecchio"];
	$nome=$_POST["nome"]; 
	$cognome=$_POST["cognome"];
	$sesso=$_POST["sesso"];
	$turno=$_POST["turno"];
	$telefono1=$_POST["telefono1"];
	$telefono2=$_POST["telefono2"];
	$telefono3=$_POST["telefono3"];
	$squadra=$_POST["squadra"];
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="UPDATE Animatori
		    SET Nome='".$nome."', Cognome='".$cognome."', Sesso='".$sesso."', Turno='".$turno."', Telefono1='".$telefono1."', Telefono2='".$telefono2."',
                          Telefono3='".$telefono3."', ColoreSquadra='".$squadra."' 
		    WHERE Nome='".$nome_vecchio."' AND Cognome='".$cognome_vecchio."'";
	$risultato=mysql_query($query);
	if($risultato)
             {	
		echo("Modifica effettuata con successo, i nuovi dati dell'animatore sono i seguenti: <BR><BR>");
		$query2="SELECT *
			      FROM Animatori
			      WHERE Nome='".$nome."' AND Cognome='".$cognome."'";
		$risultato2=mysql_query($query2)
			or die("Impossibile mostrare i nuovi dati dell'animatore: ".mysql_error());
		$righe=mysql_num_rows($risultato2);
		$colonne=mysql_num_fields($risultato2);
		if ($righe>0)
		  {
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
     <A HREF="ModificaAnimatore1.php">Torna alla pagina di inserimento dati di modifica</A><BR>
     <A HREF="index.htm">Torna alla pagina di gestione grest</A>
</BODY>
</HTML>