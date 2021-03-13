<HTML>
<HEAD>
	<TITLE>Modifica dati</TITLE>
</HEAD>
<BODY>
	<?php
		$host_name='localhost';
		$user_name='root';
		$conn=mysql_connect($host_name,$user_name,'')
			or die ("Impossibile stabilire una connessione con il server, chiudere la pagina di inserimento dati: ".mysql_error());
		$db=mysql_select_db("grest")
			or die ("Impossibile selezionare il database desiderato, chiudere la pagina di inserimento dati: ".mysql_error());
		$i=0;
		$nome_vecchio=$_POST["nome_vecchio"];
		$query="SELECT *
			    FROM giochi
			    WHERE Nome='".$nome_vecchio."'";
		$risultato=mysql_query($query)
			or die("Impossibile selezionare i dati del gioco desiderato; chiudere la pagina o tornare indietro: ".mysql_error());
		$riga=mysql_fetch_row($risultato);
		echo("<h3>Modifica ora i campi del modulo sottostante con tutti i dati aggiornati relativi al gioco</h3>");
		
		//inizio form
		echo("<FORM NAME='Modifica' ACTION='ModificaGioco.php' METHOD='POST'>");
		echo"<INPUT TYPE='hidden' NAME='nome_vecchio' VALUE='".$nome_vecchio."'";
		echo"<BR>";
	        echo"<TABLE>";
		echo"<TR>";
			echo"<TD>Codice</TD>";
			echo"<TD><INPUT TYPE='TEXT' NAME='codice' SIZE 10 VALUE='".$riga[0]."'></TD>";
		echo"</TR>";
		echo"<TR>";
			echo"<TD>Nome</TD>";
			echo"<TD><INPUT TYPE='TEXT' NAME='nome' SIZE 20 VALUE='".$riga[1]."'></TD>";
		echo"</TR>";
		echo"<TR>";
			echo"<TD>Descrizione (opzionale)</TD>";
			echo"<TD><INPUT TYPE='TEXT' NAME='descrizione' SIZE 200 VALUE='".$riga[2]."'></TD>";
		echo"</TR>";
		echo"<TR>";
			echo"<TD>Nome animatore che lo spiega</TD>";
			echo"<TD>";
				echo"<SELECT NAME='nomerelatore'>";
					$query="SELECT DISTINCT Nome
					            FROM animatori
						    ORDER BY Nome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i nomi degli animatori e procedere alla modifica; chiudere la pagina: ".mysql_error());
					echo("<OPTION VALUE='".$riga[3]."'>".$riga[3]);
					while ($nome=mysql_fetch_row($risultato))
					   {
						if($nome[$i]!=$riga[3])
							echo("<OPTION VALUE='".$nome[$i]."'>".$nome[$i]);			
					   }
				echo"</SELECT>";
			echo"</TD>";
		echo"</TR>";
		echo"<TR>";
			echo"<TD>Cognome animatore che lo spiega</TD>";
			echo"<TD>";
				echo"<SELECT NAME='cognomereleatore'>";
					$query="SELECT DISTINCT Cognome
					            FROM animatori
						    ORDER BY Cognome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i cognomi degli animatori e procedere alla modifica; chiudere la pagina: ".mysql_error());
					echo("<OPTION VALUE='".$riga[4]."'>".$riga[4]);
					while ($cognome=mysql_fetch_row($risultato))
					   {
						if($cognome[$i]!=$riga[4])
							echo("<OPTION VALUE='".$cognome[$i]."'>".$cognome[$i]);			
					   }
				echo"</SELECT>";
			echo"</TD>";		     
		echo"</TR>";
	      echo"</TABLE>"; //Fine tabella contenente il modulo form per l'inserimento dei dati
	?>
		<BR>
		<INPUT TYPE="SUBMIT" NAME="invio" VALUE="Attua modifica">
		<INPUT TYPE="RESET" NAME="cancellazione" VALUE="Ripristina valori">
	</FORM>
	<A HREF="ModificaGioco1.php">Torna alla pagina precedente</A>
	<?php
		mysql_close($conn);
	?>
</BODY>
</HTML>