<?php
	$dbClass = 'class_DbUtil.php';  //Database class file name
	$dbClassName = 'DbUtil'; //Database class
	$dbInstantiator = 'newDbUtil'; //Database instantiator function
	$senderClass = '';  //Class that will fetch the event details and send the reminder
	require_once($dbClass);
	require_once($senderClass);

	/*Manually set date times for debugging
	*
	$beginningDateTime = '2010-02-04 06:30:00';
	$endingDateTime = '2010-02-04 06:30:59';
	*/
	$cronFreq = '1';
	$date = new DateTime('now', new DateTimeZone('America/Denver'));
	$beginningDateTime = $date->format('Y-m-d H:i:s'); 
	$date->add(new DateInterval("PT{$cronFreq}M"));
	$date->sub(new DateInterval("PT1S"));
	$endingDateTime = $date->format('Y-m-d H:i:s');

	var_dump($beginningDateTime);
	var_dump($endingDateTime);

	$database = 'Reminders';
	$table = 'reminders';
	$eventCol = 'eventId';
	$dateTimeCol = 'reminderTime';

	$dbo = $dbClassName::$dbInstantiator();

	$result = $dbo->query("SELECT $eventCol FROM $database.$table WHERE $dateTimeCol BETWEEN '$beginningDateTime' AND '$endingDateTime'");

	if(is_array($result)){
		foreach($result as $row){
			//Call sender class with $eventCol result as argument		
		}
	}
?>
