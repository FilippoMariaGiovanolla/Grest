<HTML>
<HEAD>
	<TITLE>Inserimento giochi</TITLE>
</HEAD>
<BODY>
	<?php
		$host_name='localhost';
		$user_name='pippo';
		$conn=mysql_connect($host_name,$user_name,'')
			or die ("Impossibile stabilire una connessione con il server, chiudere la pagina di inserimento dati");
		$db=mysql_select_db("grest")
			or die ("Impossibile selezionare il database desiderato, chiudere la pagina di inserimento dati");
		$i=0;
	?>
	<B><h3>Inserimento dei dati nella tabella "Giochi"</h3></B>
	<FORM NAME="giochi" ACTION="giochi.php" METHOD="POST" >
	      <TABLE BORDER="0">
		<TR>
			<TD>Codice</TD>
			<TD><INPUT TYPE="TEXT" NAME="codice" SIZE 10></TD>
		</TR>
		<TR>
			<TD>Nome</TD>
			<TD><INPUT TYPE="TEXT" NAME="nome" SIZE 20></TD>
		</TR>
		<TR>
			<TD>Descrizione (opzionale)</TD>
			<TD><INPUT TYPE="TEXT" NAME="descrizione" SIZE 200></TD>
		</TR>
		<TR>
			<TD>Nome animatore che lo spiega</TD>
			<TD>
				<SELECT NAME="nomerelatore">
				    <?php
					$query="SELECT DISTINCT Nome
					            FROM Animatori
						    ORDER BY Nome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i nomi dei bambini e procedere alla modifica; chiudere la pagina");
					echo"<OPTION VALUE=''>Seleziona";
					while ($nome=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$nome[$i].">".$nome[$i]);			
					   }
				    ?>	
				</SELECT>
			</TD>		      
		</TR>
		<TR>
			<TD>Cognome animatore che lo spiega</TD>
			<TD>
				<SELECT NAME="cognomerelatore">
				    <?php
					$query="SELECT DISTINCT Cognome
						    FROM Animatori
						    ORDER BY Cognome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i cognomi dei bambini e procedere alla modifica; chiudere la pagina");
					echo"<OPTION VALUE=''>Seleziona";
					while ($cognome=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$cognome[$i].">".$cognome[$i]);			
					   }
				    ?>	
				</SELECT>
			</TD>		     
		</TR>		
	      </TABLE> <!-- Fine tabella contenente il modulo form per l'inserimento dei dati-->
	      <BR>
	      <INPUT TYPE="SUBMIT" NAME="invio" VALUE="Invio dati">
	      <INPUT TYPE="RESET" NAME="cancellazione" VALUE="Cancella modulo">
	</FORM>
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
	<?php
		mysql_close($conn);
	?>
</BODY>
</HTML>