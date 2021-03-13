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
		$codice_vecchio=$_POST["codice_vecchio"];
		$query="SELECT *
			    FROM gite
			    WHERE Codice='".$codice_vecchio."'";
		$risultato=mysql_query($query)
			or die("Impossibile selezionare i dati della gita/uscita selezionata; chiudere la pagina o tornare indietro: ".mysql_error());
		$riga=mysql_fetch_row($risultato);
		echo("<h3>Modifica ora i campi del modulo sottostante con tutti i dati aggiornati relativi alla gita/uscita</h3>");

		//inizio form
		echo("<FORM NAME='Modifica' ACTION='ModificaGita.php' METHOD='POST'>");
		echo("<TABLE BORDER='0'>");	
		echo"<TABLE>";
		   echo"<TR>";
			echo"<TD>Codice</TD>";
			echo"<TD><INPUT TYPE='TEXT' NAME='codice' SIZE 15 VALUE='".$riga[0]."'></TD>";
		   echo"</TR>";
		   echo"<TR>";
			echo"<TD>Descrizione</TD>";
			echo"<TD><INPUT TYPE='TEXTAREA' NAME='descrizione' VALUE='".$riga[1]."'></TD>";
		   echo"</TR>";
		echo"</TABLE>";// Fine tabella contenente il modulo form per l'inserimento dei dati
		echo"<INPUT TYPE='hidden' NAME='codice_vecchio' VALUE='".$codice_vecchio."'";
		echo"<BR>";
	?>
	<BR>	      
	      <INPUT TYPE="SUBMIT" NAME="invio" VALUE="Attua modifica">
	      <INPUT TYPE="RESET" NAME="cancellazione" VALUE="Ripristina valori">
	</FORM>
	<A HREF="Modifica1Gita.php">Torna alla pagina precedente</A>
	<?php
		mysql_close($conn);
	?>
</BODY>
</HTML>