<HTML>
<HEAD>
<TITLE>Elenco bambini della squadra selezionata</TITLE>
</HEAD>
<BODY>
<?php
	$colore=$_POST["colore"];
	$hostname='localhost';
	$username='root';
	$conn=mysql_connect($hostname,$username,'')
		or die("Impossibile stabilire una connessione con il server: ".mysql_error());
	$db=mysql_select_db("grest")
		or die("Impossibile selezionare il database del grest: ".mysql_error());
	$query="SELECT Nome, Cognome
		    FROM bambini
		    WHERE ColoreSquadra='".$colore."'
		    ORDER BY Classe, Cognome, Nome";
	$risultato=mysql_query($query)
		or die("Impossibile visualizzare i bambini della squadra selezionata; chiudere la pagina: ".mysql_error());
	$righe=mysql_num_rows($risultato);
	$colonne=mysql_num_fields($risultato);
	if ($righe>0)
	  {
		echo"<CENTER>Elenco bambini della squadra selezionata</CENTER>";
		echo"<BR>";
		echo("<TABLE BORDER='1' ALIGN='CENTER'
				<TR>
					<TD><B>Nome</B></TD>
					<TD><B>Cognome</B></TD>
				</TR>");
		while ($riga=mysql_fetch_row($risultato))
		       {
			  echo("<TR>");
			  for ($j=0;$j<$colonne;$j++)
			      echo("<TD><CENTER>".$riga[$j]."</CENTER></TD>");
			  echo("</TR>");
		       }
		echo("</TABLE>");
		echo"<BR>";
		$query2="SELECT COUNT(*)
			      FROM Bambini
			      WHERE ColoreSquadra='".$colore."'";
		$risultato2=mysql_query($query2)
			or die("Impossibile contare tutti i componenti della squadra: ".mysql_error());
		$righe2=mysql_num_rows($risultato2);
		if($righe2>0)
		{
			$riga=mysql_fetch_row($risultato2);
			echo"<CENTER>Numero componenti: ".$riga[0]."</CENTER>";
		} // fine if($righe2>0)
		echo"<BR>";
		echo"<CENTER>Di cui:</CENTER>";
		for($k=1;$k<5;$k++)
		{
			$query3="SELECT count(*)
				      FROM Bambini
				      WHERE ColoreSquadra='".$colore."' AND IscrittoSett_".$k."='si'";
			$risultato3=mysql_query($query3)
				or die("Impossibile contare quanti dei bambini di questa squadra sono iscritti alla settimana ".$k.": ".mysql_error());
			$righe3=mysql_num_rows($risultato3);
			if($righe3>0)
			{
				$riga=mysql_fetch_row($risultato3);
				echo"<CENTER>Iscritti alla settimana ".$k.": ".$riga[0]."</CENTER>";
			} // if($righe3>0)
		} // fine for che conta i membri della squadra selezionata per settimana
	  } // fine if ($righe>0)
	else echo("<H3>Non sono presenti dati che soddisfano la richiesta</H3>");
	mysql_close($conn);
?>
     <BR>
    <A HREF="VisioSquadre.php">Torna alla pagina precedente</A> <BR>
    <A HREF="index.htm">Torna alla pagina di Gestione Grest</A> <BR>
</BODY>
</HTML>