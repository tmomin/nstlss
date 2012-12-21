<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>NST Add New Teams</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
    <script type="text/javascript">
        //when the webpage has loaded do this
        $(document).ready(function() {  
            //if the value within the dropdown box has changed then run this code            
            $('#num_cat').change(function(){
                //get the number of fields required from the dropdown box
                var num = $('#num_cat').val();                  

                var i = 0; //integer variable for 'for' loop
                var html = ''; //string variable for html code for fields 
                //loop through to add the number of fields specified
                for (i=1;i<=num;i++) {
                    //concatinate number of fields to a variable
                    html += 'Team ' + i + ': <input type="text" name="team-' + i + '"/><br/>'; 
			}

                //insert this html code into the div with id catList
                $('#catList').html(html);
            });
        }); 
    </script>
    
<?php
    
	//connect to db
	include '../includes/dbconnect.php';
	
	//check if form has been posted
	if(isset($_POST['submit']))
	{
		//assign variable	
		$numTeam = $_POST['num_cat'];
		$sport = $_POST['sport'];
        $region = $_POST['region'];
		$i = 1;
		$teamName = "team-" . $i;
		
		//loop through post data and insert into db
		while ($i <= $numTeam) {
			mysql_query("INSERT INTO $sport (team, region)  VALUES ('" . $_POST[$teamName] . "_" . $region . "', '" . $region . "')");
			$i++;
			$teamName = "team-" . $i;
		}
		
		//close db
		mysql_close();
	};
	
?>

</head>
<body>
    <form name="newteams" method="post" action="newteams.php">
    Select Sport:
    <select id="sport" name="sport">
    	<option value="0">- SELECT -</option>
    	<option value="basketball_teams">Basketball</option>
    	<option value="football_teams">Flag Football</option>
    	<option value="cricket_teams">Cricket</option>
    	<option value="soccer_teams">Soccer</option>
    	<option value="softball_teams">Softball</option>
    	<option value="volleyball_teams">Volleyball</option>
    </select>
    &nbsp;
    Select Region:
    <select id="region" name="region">
        <option value="0">- SELECT -</option>
        <option value="Central">Central</option>
        <option value="Florida">Florida</option>
        <option value="Midwest">Midwest</option>
        <option value="Northwest">Northwest</option>
        <option value="Southeast">Southeast</option>
        <option value="Southwest">Southwest</option>
        <option value="West">West</option>
    </select>
    &nbsp;
    Number of teams: <input type="text" id="num_cat" name="num_cat" />
	
    <div id="catList"></div>
    <input type="submit" name="submit" value="Submit"/>
    </form>
</body>
</html>