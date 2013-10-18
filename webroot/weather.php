<h1>Weather Station Control</h1>
<form>
Weather:
 <select name="weather">
  <option>Sunny</option>
  <option>Cloudy</option>
  <option>Thundering</option>
</select>
<br />

<input type="checkbox" name="clear" value="1">Clear History 
<br />
<input type="submit" value="Submit">
</form> 

<h2>Historical Output of weather</h2>
<?php
	session_start();
        if (array_key_exists('clear', $_GET) && $_GET['clear'] == 1)
        {
	        $_SESSION['weather'] = array();
        }
       	if (array_key_exists('weather', $_GET) && $_GET['weather'] != null)
        {
		$whitelist = Array('Sunny', 'Cloudy', 'Thundering');
        	if (in_array($_GET['weather'], $whitelist)) 
		{ 
	        	$_SESSION['weather'][] = "It's " . $_GET['weather'] . " at " . date('r');
		} else {
			echo 'Invalid Input';
		}
	}
foreach ($_SESSION['weather'] as $event)
{
	echo $event . '<br/>';
}

