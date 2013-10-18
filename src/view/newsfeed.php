<html>
<body>
<form>
<h1>News Feed</h1>

<?php
foreach ('array' as $result) {
	echo '<p>@' . $result['user'] . ' - ' . $result['message'] . '</p>'; 
}

?>
</form>
</body>
</html>
