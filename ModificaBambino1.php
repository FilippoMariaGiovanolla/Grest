<HTML>
<HEAD>
	<TITLE>Selezione nominativo</TITLE>
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
	<B><h3>Seleziona il nominativo del bambino di cui vuoi modificare i dati</h3></B>
	<FORM NAME="modifica" ACTION="ModificaBambino2.php" METHOD="POST">
	      <TABLE BORDER="0">
		<TR>
			<TD>Nome</TD>
			<TD>	
				<SELECT NAME="nome_vecchio">
				<?php
					$query="SELECT DISTINCT Nome
					            FROM Bambini
						    ORDER BY Nome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i nomi dei bambini e procedere alla modifica; chiudere la pagina: ".mysql_error());
					echo("<OPTION VALUE=''>Seleziona");	
					while ($nome_vecchio=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE='".$nome_vecchio[$i]."'>".$nome_vecchio[$i]);
					   }
				?>
				</SELECT>
			</TD>
		</TR>
		<TR>
			<TD>Cognome</TD>
			<TD>
				<SELECT NAME="cognome_vecchio">
				<OPTION VALUE=''>Seleziona
				    <?php
					$query="SELECT DISTINCT Cognome
					            FROM Bambini
						    ORDER BY Cognome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i cognomi dei bambini e procedere alla modifica; chiudere la pagina: ".mysql_error());					
					while ($cognome_vecchio=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE='".$cognome_vecchio[$i]."'>".$cognome_vecchio[$i]);			
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