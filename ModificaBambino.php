<HTML>
<HEAD>
	<TITLE>Attuazione modifica</TITLE>
<HEAD>
<BODY>
     <?php
	$nominativo=$_POST["nominativo"];
	$exp=explode(" ", $nominativo); // la funzione explode è equiparabile allo StringTokenizer di Java
	$nome_vecchio=$exp[0];
	$cognome_vecchio=$exp[1];
	$nome=$_POST["nome"]; 
	$cognome=$_POST["cognome"];
	$classe=$_POST["classe"];
	$sesso=$_POST["sesso"];
	$pregrest=$_POST["pregrest"];
	$mensa=$_POST["mensa"];
	$iscritto_sett_1=$_POST["iscritto_sett_1"];
	$pagata_sett_1=$_POST["pagata_sett_1"];
	$iscritto_sett_2=$_POST["iscritto_sett_2"];
	$pagata_sett_2=$_POST["pagata_sett_2"];
	$iscritto_sett_3=$_POST["iscritto_sett_3"];
	$pagata_sett_3=$_POST["pagata_sett_3"];
	$iscritto_sett_4=$_POST["iscritto_sett_4"];
	$pagata_sett_4=$_POST["pagata_sett_4"];
	$telefono1=$_POST["telefono1"];
	$telefono2=$_POST["telefono2"];
	$telefono3=$_POST["telefono3"];
	$squadra=$_POST["squadra"];
	$gita1sett1=$_POST["gita1sett1"];
	$gita2sett1=$_POST["gita2sett1"];
	$gita1sett2=$_POST["gita1sett2"];
	$gita2sett2=$_POST["gita2sett2"];
	$gita1sett3=$_POST["gita1sett3"];
	$gita2sett3=$_POST["gita2sett3"];
	$gita1sett4=$_POST["gita1sett4"];
	$gita2sett4=$_POST["gita2sett4"];
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="UPDATE Bambini
		    SET Nome='".$nome."', Cognome='".$cognome."', Classe='".$classe."', Sesso='".$sesso."', PreGrest='".$pregrest."', Mensa='".$mensa."', 
		          IscrittoSett_1='".$iscritto_sett_1."', PagataSett_1='".$pagata_sett_1."', IscrittoSett_2='".$iscritto_sett_2."', 
			  PagataSett_2='".$pagata_sett_2."', IscrittoSett_3='".$iscritto_sett_3."', PagataSett_3='".$pagata_sett_3."', 
			  IscrittoSett_4='".$iscritto_sett_4."', PagataSett_4='".$pagata_sett_4."', Telefono1='".$telefono1."', Telefono2='".$telefono2."', 
			  Telefono3='".$telefono3."', ColoreSquadra='".$squadra."', Gita1Sett1='".$gita1sett1."', Gita2Sett1='".$gita2sett1."', 
			  Gita1Sett2='".$gita1sett2."', Gita2Sett2='".$gita2sett2."', Gita1Sett3='".$gita1sett3."', Gita2Sett3='".$gita2sett3."',
			  Gita1Sett4='".$gita1sett4."', Gita2Sett4='".$gita2sett4."'
		    WHERE Nome='".$nome_vecchio."' AND Cognome='".$cognome_vecchio."'";
	$risultato=mysql_query($query);
	if($risultato)
             {	
		echo("Modifica effettuata con successo, i nuovi dati del bambino sono i seguenti: <BR><BR>");
		$query2="SELECT *
			      FROM Bambini
			      WHERE Nome='".$nome."' AND Cognome='".$cognome."'";
		$risultato2=mysql_query($query2)
			or die("Impossibile mostrare i nuovi dati del bambino: ".mysql_error());
		$righe=mysql_num_rows($risultato2);
		$colonne=mysql_num_fields($risultato2);
		if ($righe>0)
		  {
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
     <A HREF="ModificaBambino1.php">Torna alla pagina di inserimento dati di modifica</A><BR><BR>
     <A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
</BODY>
</HTML>