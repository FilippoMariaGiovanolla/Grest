<HTML>
<HEAD>
	<TITLE>Modifica dati animatore</TITLE>
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
	<B><h3>Seleziona nome e cognome dell'animatore di cui vuoi modificare i dati</h3></B>
	<FORM NAME="modifica" ACTION="ModificaAnimatore2.php" METHOD="POST" >
	      <TABLE BORDER="0">
		<TR>
			<TD>Nome</TD>
			<TD>
				<SELECT NAME="nome_vecchio">
				    <?php
					$query="SELECT DISTINCT Nome
					            FROM Animatori 
						    ORDER BY Nome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i nomi degli animatori e procedere alla modifica; chiudere la pagina");
					echo"<OPTION VALUE=''>Seleziona";
					while ($nome_vecchio=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$nome_vecchio[$i].">".$nome_vecchio[$i]);			
					   }
				    ?>	
				</SELECT>
			</TD>
		</TR>
		<TR>
			<TD>Cognome</TD>
			<TD>
				<SELECT NAME="cognome_vecchio">
				    <?php
					$query="SELECT DISTINCT Cognome
					            FROM Animatori
						    ORDER BY Cognome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i cognomi degli animatori e procedere alla modifica; chiudere la pagina");
					echo"<OPTION VALUE=''>Seleziona";
					while ($cognome_vecchio=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$cognome_vecchio[$i].">".$cognome_vecchio[$i]);			
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
</BODY>
</HTML>