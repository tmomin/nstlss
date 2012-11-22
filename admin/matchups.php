<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>NST Set Matchups</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<?php

	include '../includes/dbconnect.php';
	
	$query = "SELECT `team` FROM `basketball_teams`";

	$home = mysql_query($query);
	$away = mysql_query($query);
	
	mysql_close();
	
?>

<body>

<p>Select Sport</p>
<table>
	<tr>
		<td><center>HOME</center></td>
		<td><center>VS</center></td>
		<td><center>AWAY</center></td>
	</tr>
	<tr>
		<td><center>
			<select name="home">
			<?php while ($row = mysql_fetch_assoc($home)) { echo('team'); ?>
			<option value="<?php echo($row['team']); ?>"><?php echo($row['team']); ?></option> 
			<?php } ?>
			</select>
		</center></td>
		<td></td>
		<td><center>
			<select name="away">
			<?php while ($row = mysql_fetch_assoc($away)) { ?>
			<option value="<?php echo($row['team']); ?>"><?php echo($row['team']); ?></option> 
			<?php } ?>
			</select>
		</center></td>
	</tr>	
		
</table>

</body>

</html>