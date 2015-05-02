<?	
header("Content-Type:text/html; charset=utf-8");

$mimi = $_POST['mimi'];
$upid = $_POST['upid'];

// echo $mimi;
// echo "<br>";
// echo $upid;
// echo "<br>";
function my_curl($url,$post)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	//curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT," Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36" );

	$result = curl_exec($ch);
	curl_close ($ch);
	if($result=="err_code=404&filepath=&sec=0")
		return "sorry";
	else
		return $result;
	}

$postUrl='http://video.fc2.com/ginfo.php?';
$postBODY = array(
'mimi' => $mimi,
// 'mimi' => "c5e51ed4de1f4e6246b851bef4a210de",
'upid' => $upid,
// 'upid' => '20140528bpRKSJWR',
);

$getBody = my_curl($postUrl,$postBODY);
echo $getBody;
?>