<HTML>
<HEAD>
	<TITLE>Modifica dati gioco</TITLE>
</HEAD>
<BODY>
	<?php
		$host_name='localhost';
		$user_name='root';
		$conn=mysql_connect($host_name,$user_name,'')
			or die ("Impossibile stabilire una connessione con il server, chiudere la pagina di inserimento dati");
		$db=mysql_select_db("grest")
			or die ("Impossibile selezionare il database desiderato, chiudere la pagina di inserimento dati");
		$i=0;
	?>
	<B><h3>Seleziona il codice del gioco di cui vuoi modificare i dati</h3></B>
	<FORM NAME="modifica" ACTION="ModificaGioco2.php" METHOD="POST">
	      <TABLE BORDER="0">
		<TR>
			<TD>Nome</TD>
			<TD>
				<SELECT NAME="nome_vecchio">
				    <?php
					$query="SELECT Nome
					            FROM Giochi
						    ORDER BY Nome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici dei giochi e procedere alla modifica; chiudere la pagina");
					echo"<OPTION VALUE=''>Seleziona";
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }
				    ?>		
				</SELECT>
			</TD>
		</TR>
	      </TABLE>		
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