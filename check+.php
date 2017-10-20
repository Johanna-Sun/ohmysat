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
	// echo $ret[0];
	echo "还没有 别急\n";
	if($ret[0] != '<div class="nsat-home-testScoreDate">'.$argv[1].'</div>')
	{
		echo 'HOLY SHIT!!!';
		for($i=0;$i<100;$i++){
			echo exec('echo \'\a\'');
		}
		exec('echo \'出了！（\' | terminal-notifier -sound glass');
		break;
	}
	sleep(10);
}

?>
