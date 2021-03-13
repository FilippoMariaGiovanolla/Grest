<HTML>
<HEAD>
	<TITLE>Cancellazione bambino</TITLE>
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
	<B><h3>Seleziona il nominativo del bambino di cui vuoi cancellare i dati</h3></B>
	<FORM NAME="modifica" ACTION="CancellazioneBambino2.php" METHOD="POST">
	      <TABLE BORDER="0">
		<TR>
			<TD>Nome</TD>
			<TD>	
				<SELECT NAME="nome">
				<?php
					$query="SELECT DISTINCT Nome
					            FROM Bambini
						    ORDER BY Nome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i nomi dei bambini e procedere alla modifica; chiudere la pagina: ".mysql_error());
					echo("<OPTION VALUE=''>Seleziona");	
					while ($nome=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE='".$nome[$i]."'>".$nome[$i]);
					   }
				?>
				</SELECT>
			</TD>
		</TR>
		<TR>
			<TD>Cognome</TD>
			<TD>
				<SELECT NAME="cognome">
				<OPTION VALUE=''>Seleziona
				    <?php
					$query="SELECT DISTINCT Cognome
					            FROM Bambini
						    ORDER BY Cognome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i cognomi dei bambini e procedere alla modifica; chiudere la pagina: ".mysql_error());					
					while ($cognome=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE='".$cognome[$i]."'>".$cognome[$i]);			
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