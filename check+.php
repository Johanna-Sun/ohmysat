<?php
error_reporting( E_ALL&~E_NOTICE );

include_once('simple_html_dom.php');

// var_dump($argv);

$count = 1;


while(true)
{
	$flag = 0;

	$c=curl_init();
	$cookie=$argv[2];
	curl_setopt($c, CURLOPT_URL, 'https://nsat.collegeboard.org/satweb/satHomeAction.action');
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_HTTPHEADER, array($cookie));
	$data=curl_exec($c);
	// echo $data;
	$html = new simple_html_dom();
	// $html=str_get_html($data);
	$html->load($data);
	// var_dump($html);
	$ret=$html->find('div.nsat-home-test-info h3');
	// echo $ret[0]->plaintext;
	// echo 'SAT with Essay &mdash; '.$argv[1];
	foreach ($ret as $element) {
		if($element->plaintext == 'SAT with Essay &mdash; '.$argv[1]) {
			echo "还没有 别急(已查".$count."次)\n";
			$flag = 1;
		}
	}
	if($flag == 0)
	{
		echo 'HOLY SHIT!!!';
		for($i=0;$i<100;$i++){
			echo exec('echo \'\a\'');
		}
		exec('echo \'出了！（\' | terminal-notifier -sound glass');
		break;
	}
	$count += 1;
	sleep(10);
}

?>
