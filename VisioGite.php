<html>

<head>
<meta http-equiv="Content-Language" content="it">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Visualizzazioni gite/uscite</title>
</head>

<body>
<?php
		$host_name='localhost';
		$user_name='root';
		$conn=mysql_connect($host_name,$user_name,'')
			or die ("Impossibile stabilire una connessione con il server, chiudere la pagina di inserimento dati");
		$db=mysql_select_db("grest")
			or die ("Impossibile selezionare il database desiderato, chiudere la pagina di inserimento dati");
		$i=0;
?>
<p align="center"><u><font size="4">E' possibile effettuare le operazioni seguenti:</font></u></p>
<p align="center">&nbsp;</p>
<p align="center"><font size="5">.<A HREF="VisioDatiUscite.php">Visualizzazione 
dei dati di ogni uscita</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
. <A HREF="VisioNumUscite.php">Visualizzazione del numero delle uscite</A></font></p>
<p align="center">&nbsp;</p>
<FIELDSET style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
<form name='VisioIscrittiUscita' ACTION='VisioIscrittiUscita.php' METHOD='POST'>
	<p align="center"><font size="5">.Visualizzazione di dati e numero degli 
	iscritti ad un'uscita da selezionare nell'elenco sottostante</font>
	</tr>
	</p>
	<div align="center">
	<font size="4">Elenco uscite</font>
			
				<SELECT NAME="gita">
				<?php
					$query="SELECT *
						    FROM gite
						    ORDER BY Codice";
					$risultato=mysql_query($query)
						or die("Impossibile mostrare le gite; chiudere la pagina");
					echo"<OPTION VALUE=''>Seleziona";
					while ($descrizione=mysql_fetch_row($risultato))
						echo("<OPTION VALUE=".$descrizione[$i].">".$descrizione[$i+1]);
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
<A HREF="Index.htm">Torna alla pagina di gestione grest</A><BR><BR>
<?php
	mysql_close($conn);
?>
</body>
</html>