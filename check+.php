<?php

include_once('simple_html_dom.php');

// var_dump($argv);

while(true)
{
	$c=curl_init();
	$cookie=$argv[2];
	curl_setopt($c, CURLOPT_URL, 'https://nsat.collegeboard.org/satweb/satHomeAction.action');
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_HTTPHEADER, array($cookie));
	$data=curl_exec($c);
	// echo $data;
	$html=str_get_html($data);
	$ret=$html->find('.nsat-home-testScoreDate');
	echo $ret[0];
	if($ret[0] != '<div class="nsat-home-testScoreDate">'.$argv[1].'</div>')
	{
		echo 'HOLY SHIT!!!';
		exec('echo \'出了！（\' | terminal-notifier -sound glass');
	}
	sleep(10);
}

?>
