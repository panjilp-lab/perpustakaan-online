<?php
	$date1=date_create("10-11-1998");
	$date2=date_create("11-11-1998");

	echo date_diff($date1,$date2);
?>