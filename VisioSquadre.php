<html>

<head>
<meta http-equiv="Content-Language" content="it">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Visualizzazioni squadre</title>
</head>

<body>
<?php
		$host_name='localhost';
		$user_name='root';
		$conn=mysql_connect($host_name,$user_name,'')
			or die ("Impossibile stabilire una connessione con il server, chiudere la pagina di inserimento dati: ".mysql_error());
		$db=mysql_select_db("grest")
			or die ("Impossibile selezionare il database desiderato, chiudere la pagina di inserimento dati: ".mysql_error());
		$i=0;
?>
<p align="center"><u><font size="4">E' possibile effettuare le operazioni seguenti:</font></u></p>
<p align="center">&nbsp;</p>
<p align="center"><font size="5">.<A HREF="VisioDatiSquadre.php">Visualizzazione 
dei dati di ogni squadra</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
. <A HREF="VisioNumSquadre.php">Visualizzazione del numero delle squadre</A></font></p>
<p align="center">&nbsp;</p>
<FIELDSET style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
<form name='VisioBimbiSquadra' ACTION='VisioBimbiSquadra.php' METHOD='POST'>
	<p align="center"><font size="5">.Visualizzazione dei componenti della squadra da 
		selezionare nell'elenco sottostante</font>
	</tr>
	</p>
	<div align="center">
	<font size="4">Squadra di cui visualizzare i componenti</font>
			
				<SELECT NAME="colore">
				<?php
					$query="SELECT Colore
						    FROM Squadre";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i colori delle squadre; chiudere la pagina: ".mysql_error());
					echo"<OPTION VALUE=''>Seleziona";
					while ($colore=mysql_fetch_row($risultato))
						echo("<OPTION VALUE='".$colore[$i]."'>".$colore[$i]);
				?>
				</SELECT>
	</div> <br>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;
		  <INPUT TYPE="SUBMIT" NAME="invio" VALUE="Invio dato">
</form>
</FIELDSET style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
<br><br>
<FIELDSET style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
<form name='VisioAnimatoriSquadra' ACTION='VisioAnimatoriSquadra.php' METHOD='POST'>
	<p align="center"><font size="5">.Visualizzazione degli animatori abbinati alla squadra da 
		selezionare nell'elenco sottostante</font>
	</tr>
	</p>
	<div align="center">
	<font size="4">Squadra di cui visualizzare gli animatori</font>
			
				<SELECT NAME="colore">
				<?php
					$risultato=mysql_query($query)
						or die("Impossibile selezionare i colori delle squadre; chiudere la pagina: ".mysql_error());
					echo"<OPTION VALUE=''>Seleziona";	
					while ($colore=mysql_fetch_row($risultato))
						echo("<OPTION VALUE='".$colore[$i]."'>".$colore[$i]);
				?>
				</SELECT>
	</div> <br>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;
		<INPUT TYPE="SUBMIT" NAME="invio" VALUE="Invio dato">
</form>
</FIELDSET>
<BR>
<A HREF="Index.htm">Torna alla pagina di gestione grest</A><BR><BR>
<?php
	mysql_close($conn);
?>
</body>
</html>