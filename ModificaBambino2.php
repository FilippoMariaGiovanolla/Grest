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
		$nome_vecchio=addslashes($_POST["nome_vecchio"]);
		$cognome_vecchio=addslashes($_POST["cognome_vecchio"]);
		//echo("Nome vecchio: ".$nome_vecchio."<br>");
		//echo("Cognome vecchio: ".$cognome_vecchio."<br>");
		$query="SELECT *
			    FROM bambini
			    WHERE Nome='".$nome_vecchio."' AND Cognome='".$cognome_vecchio."'";
		//echo("Query: ".$query."<br>");
		$risultato=mysql_query($query)
			or die("Impossibile selezionare i dati del bambino selezionato; chiudere la pagina o tornare indietro: ".mysql_error());
		$colonne=mysql_num_fields($risultato);
		echo("<H3>Modifica ora i campi del modulo sottostante con tutti i dati aggiornati relativi al bambino</H3>");
		
		//inzio form
		echo("<FORM NAME='Modifica' ACTION='ModificaBambino.php' METHOD='POST'>");
		echo('<INPUT TYPE="hidden" NAME="nome_vecchio" VALUE="'.$nome_vecchio.'">');
		echo('<INPUT TYPE="hidden" NAME="cognome_vecchio" VALUE="'.$cognome_vecchio.'">');
		echo("<TABLE BORDER='0'>");
		echo("<TR>");
			$riga=mysql_fetch_row($risultato);
			echo("<TD>Nome</TD>");
			echo('<TD><INPUT TYPE="TEXT" NAME="nome" SIZE 30 VALUE="'.$riga[0].'"></TD>');
			echo("<TD></TD><TD></TD><TD></TD>");
			echo("<TD>Cognome</TD>");
			echo('<TD><INPUT TYPE="TEXT" NAME="cognome" SIZE 30 VALUE="'.$riga[1].'"></TD>');
			echo("<TD></TD><TD></TD><TD></TD>");
			echo("<TD>Sesso</TD>");
			echo("<TD>"); 
			echo"<SELECT NAME='sesso'>";
				echo("<OPTION VALUE='".$riga[3]."'>".$riga[3]);
				if($riga[3]=='F')
					echo("<OPTION VALUE='M'>M");
				else
					echo("<OPTION VALUE='F'>F");
			echo"</SELECT>";
			echo("</TD>");
			echo("<TD></TD><TD></TD><TD></TD>");
			echo("<TD>Classe</TD>");
			echo("<TD>");
		    ?>	
			<SELECT NAME="classe">
			<?php 
				if($riga[2]=='e1') echo"<OPTION VALUE='".$riga[2]."'>Prima elementare";
				if($riga[2]=='e2') echo"<OPTION VALUE='".$riga[2]."'>Seconda elementare";
				if($riga[2]=='e3') echo"<OPTION VALUE='".$riga[2]."'>Terza elementare";
				if($riga[2]=='e4') echo"<OPTION VALUE='".$riga[2]."'>Quarta elementare";
				if($riga[2]=='e5') echo"<OPTION VALUE='".$riga[2]."'>Quinta elementare";
				if($riga[2]=='m1') echo"<OPTION VALUE='".$riga[2]."'>Prima media";
				if($riga[2]=='m2') echo"<OPTION VALUE='".$riga[2]."'>Seconda media";
				if($riga[2]=='m3') echo"<OPTION VALUE='".$riga[2]."'>Terza media";
				if($riga[2]!='e1') echo"<OPTION VALUE='e1'>Prima elementare";
				if($riga[2]!='e2') echo"<OPTION VALUE='e2'>Seconda elementare";
				if($riga[2]!='e3') echo"<OPTION VALUE='e3'>Terza elementare";
				if($riga[2]!='e4') echo"<OPTION VALUE='e4'>Quarta elementare";
				if($riga[2]!='e5') echo"<OPTION VALUE='e5'>Quinta elementare";
				if($riga[2]!='m1') echo"<OPTION VALUE='m1'>Prima media";
				if($riga[2]!='m2') echo"<OPTION VALUE='m2'>Seconda media";
				if($riga[2]!='m3') echo"<OPTION VALUE='m3'>Terza media";
			?>
			</SELECT>
			</TD>		    
		</TR>
	      </TABLE> <!-- FINE PRIMA TABELLA -->
	      <BR>
	      <TABLE BORDER="0">
		<TR>
			<TD>Telefono 1</TD>
			<?php 
				if($riga[14]!="")
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono1' VALUE='".$riga[14]."' SIZE 15></TD>";
				else
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono1' SIZE 15></TD>";
			?>
		<TD></TD><TD></TD><TD></TD>
			<TD>Telefono 2</TD>
			<?php 
				if($riga[15]!="")
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono2' VALUE='".$riga[15]."' SIZE 15></TD>";
				else
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono2' SIZE 15></TD>";
			?>
		<TD></TD><TD></TD><TD></TD>
			<TD>Telefono 3</TD>
			<?php 
				if($riga[16]!="")
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono3' VALUE='".$riga[16]."' SIZE 15></TD>";
				else
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono3' SIZE 15></TD>";
			?>
	       </TABLE> <!-- FINE SECONDA TABELLA -->
	       <BR>
	       <TABLE BORDER="0">
			<TD>Colore squadra</TD>
			<TD>
				<SELECT NAME="squadra">
				    <?php
					$query="SELECT Colore
						    FROM squadre
						    ORDER BY Colore";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i colori delle squadre e procedere alla modifica; chiudere la pagina: ".mysql_error());
					echo"<OPTION VALUE='".$riga[17]."'>".$riga[17];
					while ($squadra=mysql_fetch_row($risultato))
					   {
						if($squadra[$i]!=$riga[17])
							echo("<OPTION VALUE='".$squadra[$i]."'>".$squadra[$i]);			
					   }
				   ?>	
				</SELECT>
			</TD>
		<TD></TD><TD></TD><TD></TD>
			<TD>Pre-Grest</TD>
			<TD>
				<SELECT NAME="pregrest">
				<?php
					echo("<OPTION VALUE='".$riga[4]."'>".$riga[4]);
					if($riga[4]=='Si')
						echo("<OPTION VALUE='No'>No");
					else
						echo("<OPTION VALUE='Si'>S&igrave;");
				?>
				</SELECT>
			</TD>
		<TD></TD><TD></TD><TD></TD>
			<TD>Mensa</TD>
			<TD>
				<SELECT NAME="mensa">					
				<?php
					echo"<OPTION VALUE='".$riga[5]."'>".$riga[5];
					if($riga[5]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>
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
				<?php
					echo"<OPTION VALUE='".$riga[6]."'>".$riga[6];
					if($riga[6]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_1">
				<?php
					echo"<OPTION VALUE='".$riga[7]."'>".$riga[7];
					if($riga[7]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>	
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett1">
				    <?php
					$iscritto="no";	
					$query="SELECT Codice
						    FROM gite
						    ORDER BY Codice";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[18]=="no")
						echo"<OPTION VALUE='".$riga[18]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[18]."'>".$riga[18];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[18]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[18]!="no")
							$iscritto="si"; // variabile che serve per testare se il bambino risulta o meno già iscritto ad una gita
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
				   ?>	
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett1">
				    <?php
					$iscritto="no";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[19]=="no")
						echo"<OPTION VALUE='".$riga[19]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[19]."'>".$riga[19];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[19]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[19]!="no")
							$iscritto="si";
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
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
				<?php
					echo"<OPTION VALUE='".$riga[8]."'>".$riga[8];
					if($riga[8]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>	
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_2">					
				<?php
					echo"<OPTION VALUE='".$riga[9]."'>".$riga[9];
					if($riga[9]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>	
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett2">
				<?php
					$iscritto="no";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[20]=="no")
						echo"<OPTION VALUE='".$riga[20]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[20]."'>".$riga[20];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[20]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[20]!="no")
							$iscritto="si";
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett2">
				<?php
					$iscritto="no";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[21]=="no")
						echo"<OPTION VALUE='".$riga[21]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[21]."'>".$riga[21];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[21]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[21]!="no")
							$iscritto="si";
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
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
				<?php
					echo"<OPTION VALUE='".$riga[10]."'>".$riga[10];
					if($riga[10]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_3">					
				<?php
					echo"<OPTION VALUE='".$riga[11]."'>".$riga[11];
					if($riga[11]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>	
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett3">
				<?php
					$iscritto="no";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[22]=="no")
						echo"<OPTION VALUE='".$riga[22]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[22]."'>".$riga[22];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[22]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[22]!="no")
							$iscritto="si";
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett3">
				<?php
					$iscritto="no";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[23]=="no")
						echo"<OPTION VALUE='".$riga[23]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[23]."'>".$riga[23];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[23]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[23]!="no")
							$iscritto="si";
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
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
				<?php
					echo"<OPTION VALUE='".$riga[12]."'>".$riga[12];
					if($riga[12]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Pagata</TD>
			<TD>
				<SELECT NAME="pagata_sett_4">					
				<?php
					echo"<OPTION VALUE='".$riga[13]."'>".$riga[13];
					if($riga[13]=="Si")
						echo"<OPTION VALUE='No'>No";
					else
						echo"<OPTION VALUE='Si'>S&igrave;";
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 1</TD>
			<TD>
				<SELECT NAME="gita1sett4">
				<?php
					$iscritto="no";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[24]=="no")
						echo"<OPTION VALUE='".$riga[24]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[24]."'>".$riga[24];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[24]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[24]!="no")
							$iscritto="si";
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
				?>
				</SELECT>
			</TD>
			<TD></TD><TD></TD><TD></TD>
			<TD>Uscita/Gita 2</TD>
			<TD>
				<SELECT NAME="gita2sett4">
				<?php
					$iscritto="no";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i codici delle uscite e procedere alla modifica; chiudere la pagina: ".mysql_error());
					if($riga[25]=="no")
						echo"<OPTION VALUE='".$riga[25]."'>Non iscritto";
					else
						echo"<OPTION VALUE='".$riga[25]."'>".$riga[25];
					while ($codice=mysql_fetch_row($risultato))
					   {
						if(!($codice[$i]==$riga[25]))
							echo("<OPTION VALUE='".$codice[$i]."'>".$codice[$i]);
						if($riga[25]!="no")
							$iscritto="si";
					   }
					if($iscritto=="si")
						echo"<OPTION VALUE='no'>Non iscritto";
				?>
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- FINE SETTIMA TABELLA -->
	      </FIELDSET> <!-- FINE FIELDSET QUARTA SETTIMANA -->
	      
	      </FIELDSET>
	      <BR>
	      <BR>	
	      <INPUT TYPE="SUBMIT" NAME="invio" VALUE="Attua modifica">
	      <INPUT TYPE="RESET" NAME="cancellazione" VALUE="Ripristina valori">
	</FORM>
	
	<A HREF="ModificaBambino1.php">Torna alla pagina precedente</A><BR><BR>
	<?php
		mysql_close($conn);
	?>
</BODY>
</HTML>