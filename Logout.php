<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'repit');
	$query = "SELECT * FROM users";
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result))
	{
		if(isset($_COOKIE[$row['username']]))
		{
			unset($_COOKIE[$row['username']]);
			setcookie($row['username'], '', time() - 3600, '/');
		}
	}
	header('Location: index.html')
?>
