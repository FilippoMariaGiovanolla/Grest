<html>

<head>
<meta http-equiv="Content-Language" content="it">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Visualizzazioni giochi</title>
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
<p align="center"><font size="5">.<A HREF="VisioDatiGiochi.php">Visualizzazione dei dati di ogni 
gioco</A>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
. <A HREF="VisioNumGiochi.php">Visualizzazione del numero dei giochi inseriti</A></font></p>
<p align="center">&nbsp;</p>
<FIELDSET style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
<form name='VisioDatiGioco' ACTION='VisioDatiGioco.php' METHOD='POST'>
	<p align="center"><font size="5">.Visualizzazione dei dati di un singolo gioco da selezionare nell'elenco sottostante</font>
	</tr>
	</p>
	<div align="center">
	<font size="4">Gioco di cui visualizzare i dati</font>			
				<SELECT NAME="nome">
				<?php
					$query="SELECT Nome
						    FROM Giochi
						    ORDER BY Nome";
					$risultato=mysql_query($query)
						or die("Impossibile selezionare il nome dei giochi; chiudere la pagina: ".mysql_error());
					echo"<OPTION VALUE=''>Seleziona";
					while ($nome=mysql_fetch_row($risultato))
						echo("<OPTION VALUE=".$nome[$i].">".$nome[$i]);
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
&nbsp;<p>
<A HREF="Index.htm">Torna alla pagina di gestione grest</A><BR><BR>
<?php
	mysql_close($conn);
?>
</p>
</body>
</html>