<HTML>
<HEAD>
	<TITLE>Cancellazione animatore</TITLE>
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
	?>
	<B><h3>Seleziona il colore della squadra di cui vuoi cancellare i dati</h3></B>
	<FORM NAME="modifica" ACTION="CancellazioneSquadra2.php" METHOD="POST">
	      <TABLE BORDER="0">
		<TR>
			<TD>Colore</TD>
			<TD>	
				<SELECT NAME="colore">
				<?php
					$query="SELECT Colore
					            FROM squadre";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i colori delle squadre e procedere alla modifica; chiudere la pagina: ".mysql_error());
					echo("<OPTION VALUE=''>Seleziona");	
					while ($colore=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE='".$colore[$i]."'>".$colore[$i]);
					   }
				?>
				</SELECT>
			</TD>
		</TR>
	      </TABLE>
	 <BR>	      
	      <INPUT TYPE="SUBMIT" NAME="invio" VALUE="Attua cancellazione">
	      <INPUT TYPE="RESET" NAME="cancellazione" VALUE="Reset modulo">
	</FORM>     
	<A HREF="index.htm">Torna alla pagina di Gestione Grest</A>
	<?php
		mysql_close($conn);
	?>
</BODY>
</HTML>