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
		$nome_vecchio=$_POST["nome_vecchio"];
		$cognome_vecchio=$_POST["cognome_vecchio"];
		$query="SELECT *
			    FROM Animatori
			    WHERE Nome='$nome_vecchio' AND Cognome='$cognome_vecchio'";
		$risultato=mysql_query($query)
			or die("Impossibile selezionare i dati dell'animatore selezionato; chiudere la pagina o tornare indietro: ".mysql_error());
		//$colonne=mysql_num_fields($risultato);
		echo("<h3>Modifica ora i campi del modulo sottostante con tutti i dati aggiornati relativi all'animatore</h3>");
		
		//inizio form
		echo("<FORM NAME='Modifica' ACTION='ModificaAnimatore.php' METHOD='POST'>");
		echo("<TABLE BORDER='0'>");
		echo("<TR>");
			$riga=mysql_fetch_row($risultato);
			echo("<TD>Nome</TD>");
			echo("<TD><INPUT TYPE='TEXT' NAME='nome' SIZE 30 VALUE=$riga[0]></TD>");
			echo("</TR>");
			echo("<TR>");
			echo("<TD>Cognome</TD>");
			echo("<TD><INPUT TYPE='TEXT' NAME='cognome' SIZE 30 VALUE=$riga[1]></TD>");
			echo("</TR>");
		?>
		<TR>
			<TD>Sesso</TD>
			<TD>
				<SELECT NAME="sesso">
				<?php
					echo("<OPTION VALUE=".$riga[2].">".$riga[2]);
					if($riga[2]=='F')
						echo("<OPTION VALUE='M'>M");
					else
						echo("<OPTION VALUE='F'>F");
				?>
				</SELECT>	
			</TD>
		</TR>
		<TR>
			<TD>Turno</TD>
			<TD>
				<SELECT NAME="turno">
				<?php 
					if($riga[3]=='Lunedi') echo"<OPTION VALUE=".$riga[3].">Luned�";
					if($riga[3]=='Martedi') echo"<OPTION VALUE=".$riga[3].">Marted�";
					if($riga[3]=='Mercoledi') echo"<OPTION VALUE=".$riga[3].">Mercoled�";
					if($riga[3]=='Giovedi') echo"<OPTION VALUE=".$riga[3].">Gioved�";
					if($riga[3]=='Venerdi') echo"<OPTION VALUE=".$riga[3].">Venerd�";
					if($riga[3]=='Nessuno') echo"<OPTION VALUE=".$riga[3].">Nessuno";
					if($riga[3]!='Lunedi') echo"<OPTION VALUE='Lunedi'>Luned�";
					if($riga[3]!='Martedi') echo"<OPTION VALUE='Martedi'>Marted�";
					if($riga[3]!='Mercoledi') echo"<OPTION VALUE='Mercoledi'>Mercoled�";
					if($riga[3]!='Giovedi') echo"<OPTION VALUE='Giovedi'>Gioved�";
					if($riga[3]!='Venerdi') echo"<OPTION VALUE='Venerdi'>Venerd�";
					if($riga[3]!='Nessuno') echo"<OPTION VALUE='Nessuno'>Nessuno";
				?>
				</SELECT>	
			</TD>
		</TR>
		<TR>
			<TD>Telefono 1</TD>
			<?php 
				if($riga[4]!="")
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono1' VALUE=".$riga[4]." SIZE 15></TD>";
				else
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono1' SIZE 15></TD>";
			?>
		</TR>
		<TR>
			<TD>Telefono 2</TD>
			<?php 
				if($riga[5]!="")
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono2' VALUE=".$riga[5]." SIZE 15></TD>";
				else
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono2' SIZE 15></TD>";
			?>
		</TR>
		<TR>
			<TD>Telefono 3</TD>
			<?php 
				if($riga[6]!="")
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono3' VALUE=".$riga[6]." SIZE 15></TD>";
				else
					echo"<TD><INPUT TYPE='TEXT' NAME='telefono3' SIZE 15></TD>";
			?>
		</TR>
		<TR>
			<TD>Colore squadra</TD>
			<TD>
				<SELECT NAME="squadra">
				    <?php
					$query="SELECT Colore
						    FROM Squadre
						    ORDER BY Colore";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i colori delle squadre e procedere alla modifica; chiudere la pagina: ".mysql_error());
					echo"<OPTION VALUE=".$riga[7].">".$riga[7];
					while ($squadra=mysql_fetch_row($risultato))
					   {
						if($squadra[$i]!=$riga[7])
							echo("<OPTION VALUE=".$squadra[$i].">".$squadra[$i]);			
					   }
				   ?>	
				</SELECT>
			</TD>
		</TR>
	      </TABLE> <!-- Fine tabella contenente il modulo form per l'inserimento dei dati-->
	      <?php
		//echo"<INPUT TYPE='hidden' NAME='colore_vecchio' VALUE='$colore_vecchio'";
		echo"<INPUT TYPE='hidden' NAME='nome_vecchio' VALUE='$nome_vecchio'>";
		echo"<INPUT TYPE='hidden' NAME='cognome_vecchio' VALUE='$cognome_vecchio'>";
	     ?>
	<BR>	      
	      <INPUT TYPE="SUBMIT" NAME="invio" VALUE="Attua modifica">
	      <INPUT TYPE="RESET" NAME="cancellazione" VALUE="Ripristina valori">
	</FORM>
	<A HREF="ModificaAnimatore1.php">Torna alla pagina precedente</A><BR><BR>
	<?php
		mysql_close($conn);
	?>
</BODY>
</HTML>