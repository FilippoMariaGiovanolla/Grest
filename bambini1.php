<HTML>
<HEAD>
	<TITLE>Inserimento bambini</TITLE>
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
	<B><h3>Inserimento dei dati nella tabella "Bambini"</h3></B>
	<FORM NAME="bambini" ACTION="bambini.php" METHOD="POST" >
	      <TABLE BORDER="0">
		<TR>
			<TD>Nome</TD>
			<TD><INPUT TYPE="TEXT" NAME="nome" SIZE 30></TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Cognome</TD>
			<TD><INPUT TYPE="TEXT" NAME="cognome" SIZE 30></TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Sesso</TD>
			<TD>
				<SELECT NAME="sesso">
					<OPTION VALUE="M">M
					<OPTION VALUE="F">F
				</SELECT>	
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Classe</TD>
			<TD>
				<SELECT NAME="classe">
					<OPTION VALUE="e1">Prima elementare
					<OPTION VALUE="e2">Seconda elementare
					<OPTION VALUE="e3">Terza elementare
					<OPTION VALUE="e4">Quarta elementare
					<OPTION VALUE="e5">Quinta elementare
					<OPTION VALUE="m1">Prima media
					<OPTION VALUE="m2">Seconda media
					<OPTION VALUE="m3">Terza media 
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- FINE PRIMA TABELLA -->
	      <BR>
	      <TABLE BORDER="0">
		<TR>
			<TD>Telefono 1</TD>
			<TD><INPUT TYPE="TEXT" NAME="telefono1" SIZE 15></TD>
		<TD></TD><TD></TD><TD></TD>
			<TD>Telefono 2</TD>
			<TD><INPUT TYPE="TEXT" NAME="telefono2" SIZE 15></TD>
		<TD></TD><TD></TD><TD></TD>
			<TD>Telefono 3</TD>
			<TD><INPUT TYPE="TEXT" NAME="telefono3" SIZE 15></TD>
	       </TABLE> <!-- FINE SECONDA TABELLA -->
	       <BR>
	       <TABLE BORDER="0">
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
		<TD></TD><TD></TD><TD></TD>
			<TD>Pre-Grest</TD>
			<TD>
				<SELECT NAME="pregrest">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
		<TD></TD><TD></TD><TD></TD>
			<TD>Mensa</TD>
			<TD>
				<SELECT NAME="mensa">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- FINE TERZA TABELLA -->
	      <BR>

	      <FIELDSET style="border-style: solid; border-width: 3px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">

	      <legend>&nbsp;</legend>

	      <FIELDSET style="border-style: solid; border-width: 1px"> <!-- INIZIO FIELDSET PRIMA SETTIMANA --> 
	        <LEGEND ALIGN="left">Prima settimana</LEGEND>
	      <TABLE BORDER="0">
		<TR>
			<TD>Iscritto</TD>
			<TD>
				<SELECT NAME="iscritto_sett_1">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_1">
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett1">
				    <?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$query="SELECT Codice
						    FROM Gite";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				   ?>	
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett1">
				    <?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				   ?>	
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- FINE QUARTA TABELLA -->
	      </FIELDSET> <!-- FINE FIELDSET PRIMA SETTIMANA -->
	      
	      
	      <FIELDSET style="border-style: solid; border-width: 1px"> <!-- INIZIO FIELDSET SECONDA SETTIMANA --> 
	        <LEGEND ALIGN="left">Seconda settimana</LEGEND>
	      <TABLE BORDER="0">
		<TR>
			<TD>Iscritto</TD>
			<TD>
				<SELECT NAME="iscritto_sett_2">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_2">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett2">
				<?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett2">
				<?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				?>
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- FINE QUINTA TABELLA -->
	      </FIELDSET> <!-- FINE FIELDSET SECONDA SETTIMANA -->
	      
	      
	      <FIELDSET style="border-style: solid; border-width: 1px"> <!-- INIZIO FIELDSET TERZA SETTIMANA --> 
	        <LEGEND ALIGN="left">Terza settimana</LEGEND>
	      <TABLE BORDER="0">
		<TR>
			<TD>Iscritto</TD>
			<TD>
				<SELECT NAME="iscritto_sett_3">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_3">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett3">
				<?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett3">
				<?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				?>
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- FINE SESTA TABELLA -->
	      </FIELDSET> <!-- FINE FIELDSET TERZA SETTIMANA -->
	      
	      
	      <FIELDSET style="border-style: solid; border-width: 1px"> <!-- INIZIO FIELDSET QUARTA SETTIMANA --> 
	        <LEGEND ALIGN="left">Quarta settimana</LEGEND>
	      <TABLE BORDER="0">
		<TR>
			<TD>Iscritto</TD>
			<TD>
				<SELECT NAME="iscritto_sett_4">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_4">					
					<OPTION VALUE="No">No
					<OPTION VALUE="Si">S�
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett4">
				<?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett4">
				<?php
					echo("<OPTION VALUE='no'>Non iscritto");
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina");					
					while ($codice=mysql_fetch_row($risultato))
					   {
						echo("<OPTION VALUE=".$codice[$i].">".$codice[$i]);			
					   }	
				?>
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- FINE SETTIMA TABELLA -->
	      </FIELDSET> <!-- FINE FIELDSET QUARTA SETTIMANA -->
	      
	      </FIELDSET>
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