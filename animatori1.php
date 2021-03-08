<HTML>
<HEAD>
	<TITLE>Inserimento animatori</TITLE>
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
	<B><h3>Inserimento dei dati nella tabella "Animatori"</h3></B>
	<FORM NAME="animatori" ACTION="animatori.php" METHOD="POST" >
	      <TABLE BORDER="0">
		<TR>
			<TD>Nome</TD>
			<TD><INPUT TYPE="TEXT" NAME="nome" SIZE 30></TD>
		</TR>
		<TR>
			<TD>Cognome</TD>
			<TD><INPUT TYPE="TEXT" NAME="cognome" SIZE 30></TD>
		</TR>
		<TR>
			<TD>Telefono 1</TD>
			<TD><INPUT TYPE="TEXT" NAME="telefono1" SIZE 15></TD>
		</TR>
		<TR>
			<TD>Telefono 2</TD>
			<TD><INPUT TYPE="TEXT" NAME="telefono2" SIZE 15></TD>
		</TR>
		<TR>
			<TD>Telefono 3</TD>
			<TD><INPUT TYPE="TEXT" NAME="telefono3" SIZE 15></TD>
		</TR>
		<TR>
			<TD>Colore squadra</TD>
			<TD>
				<SELECT NAME="squadra">
				    <?php
					$query="SELECT Colore
						    FROM Squadre";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i colori delle squadre e procedere alla modifica; chiudere la pagina");					
					while ($squadra=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$squadra[$i].">".$squadra[$i]);			
					   }	
				   ?>	
				</SELECT>
			</TD>
		</TR>
                    <TR>
			<TD>Sesso</TD>
			<TD>
				<SELECT NAME="sesso">
					<OPTION VALUE="M">M
					<OPTION VALUE="F">F
				</SELECT>	
			</TD>
		</TR>
		<TR>
			<TD>Turno</TD>
			<TD>
				<SELECT NAME="turno">
					<OPTION VALUE="Lunedi">Lunedì
					<OPTION VALUE="Martedi">Martedì
					<OPTION VALUE="Mercoledi">Mercoledì
					<OPTION VALUE="Giovedi">Giovedì
					<OPTION VALUE="Venerdi">Venerdì
					<OPTION VALUE="Nessuno">Nessuno
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