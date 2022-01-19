<?php
/*
$TOKEN="{197662262:AAH5Q0jrpzTZeasI8dQVxwFNXUNSTHaA1MI}";
function request_url($method)
{
 global $TOKEN;
 return "https://api.telegram.org/bot" . $TOKEN . "/". $method;
}
function getLink($url)
{
 require_once ('simplerss.php');
 
 $rss = new simplerss;
 $items = $rss->parse(array($url));
 $i = 1;
 $result = '';
 foreach($items as $feed)
 {
 $result .= '<a href="'.$feed->link.'">'.$feed->title.'</a>
';
 if($i == 5) break;
 $i++;
 }
 return $result;
}
function send_reply($chatid, $msgid, $text)
{
 $data = array(
 'parse_mode' => 'HTML',
 'chat_id' => $chatid,
 'text' => $text,
 'disable_web_page_preview' => true
 //'reply_to_message_id' => $msgid
 );
 // use key 'http' even if you send the request to https://...
 $options = array(
 'http' => array(
 'header' => "Content-type: application/x-www-form-urlencoded\r\n",
 'method' => 'POST',
 'content' => http_build_query($data),
 ),
 );
 $context = stream_context_create($options);
 $result = file_get_contents(request_url('sendMessage'), false, $context);
}
function create_response($text)
{
 if(strpos($text, '/about')!== FALSE)
 {
 $result ='Silahkan Kontak Saya di @syarifurqon Terima Kasih';
 }

 else if(strpos(strtolower($text), '/new')!== FALSE)
	{
 
 $result = '<b>Artikel Terbaru SyariFurqon.ID</b>';

 $result .= getLink('http://syarifurqon.id/feed/');
 }
 else if(strpos(strtolower($text), '/help')!== FALSE){
 
 $result = '<b>Command List bot</b> ';
 $result .= '<b>/new</b> - Get Update Article Syarifurqon.id
<b>/about</b> - Get Info Developer
<b>/help</b> - Get Command List
';
 }
 else {
 
 $result = 'Senang berkenalan dengan anda';
 }
 return $result;
}
function process_message($message)
{
 $updateid = $message["update_id"];
 $message_data = $message["message"];
 if (isset($message_data["text"])) {
 $chatid = $message_data["chat"]["id"];
 $message_id = $message_data["message_id"];
 $text = $message_data["text"];
 $response = create_response($text);
 send_reply($chatid, $message_id, $response);
 } 
 return $updateid;
}
function get_updates($offset) 
{
 $url = request_url("getUpdates")."?offset=".$offset;
 $resp = file_get_contents($url);
 $result = json_decode($resp, true);
 if ($result["ok"]==1)
 return $result["result"];
 return array();
}
function process_one()
{
 $update_id = 0;
 
 if (file_exists("last_update_id")) {
 $update_id = (int)file_get_contents("last_update_id");
 }
 
 $updates = get_updates($update_id);
 
 foreach ($updates as $message)
 {
 $update_id = process_message($message);
 }
 file_put_contents("last_update_id", $update_id + 1);
 
}
 
while (true) {
 process_one();
}




PROSES BOT TELEGRAM {"ok":true,
"result":
{"message_id":236,"from":{"id":197662262,"is_bot":true,"first_name":"VallBot","username":"VallbotBot"},
"chat":{"id":279222513,"first_name":"muis","last_name":"arghi","username":"muisagp","type":"private"},
"date":1642554932,
"reply_to_message":
	{"message_id":235,"from":{"id":279222513,"is_bot":false,"first_name":"muis","last_name":"arghi","username":"muisagp","language_code":"en"},
"chat":{"id":279222513,"first_name":"muis","last_name":"arghi","username":"muisagp","type":"private"},"date":1642554930,"text":"sasdsaasd"},"text":"Maaf, Data Tidak Ditemukan"}}




tice: Undefined index: username in C:\xampp\htdocs\telegram\index.php on line 219
{"ok":true,"result":
	{"message_id":261,"from":
		{"id":197662262,"is_bot":true,"first_name":"VallBot","username":"VallbotBot"},
		"chat":{"id":-752324758,"title":"ExpBot","type":"group","all_members_are_administrators":true},
		"date":1642564251,
		"reply_to_message":
			{"message_id":260,
			"from":
				{"id":279222513,"is_bot":false,"first_name":"muis","last_name":"arghi","username":"muisagp","language_code":"en"},
				"chat":{"id":-752324758,"title":"ExpBot","type":"group","all_members_are_administrators":true},
				"date":1642564249,
				"text":"@VallbotBot /simpan",
				"entities":[
					{"offset":0,"length":11,"type":"text_link","url":"https://t.me/VallbotBot"},
					{"offset":12,"length":7,"type":"text_link","url":"tg://bot_command?command=simpan"}]
					},
				"text":"chat ID: .-752324758. 260. Nama: , user: Sudah tersimpan"}}
*/


include("token.php");
 
  $page = $_SERVER['PHP_SELF'];
 $sec = "3";
 set_time_limit(5);
// header("Refresh: $sec; url=$page");

?>

<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
	PROSES BOT TELEGRAM
<?php
function request_url($method)
	{
    global $TOKEN;
    return "https://api.telegram.org/bot".$TOKEN."/". $method;
	}
 
function get_updates($offset) 
	{
    $url = request_url("getUpdates")."?offset=".$offset;
        $resp = file_get_contents($url);
        $result = json_decode($resp, true);
        if ($result["ok"]==1)
            return $result["result"];
        return array();
	}
 
function send_reply($chatid, $msgid, $text, $username, $names)
	{
    $data = array(
	'chat_id' => $chatid,
	'text'  => $text,
	'reply_to_message_id' => $msgid);

	$options = array(
	'http' => array(
	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	'method'  => 'POST',
	'content' => http_build_query($data),),);

    $context  = stream_context_create($options);
 
    $result = file_get_contents(request_url('sendMessage'), false, $context);
    print_r($result);
	}
 
function create_response($username, $names, $chatid, $message_id,$text)
	{
	if($text=='Hyosung')
		{
		$result="Permasalahan Mesin Hyosung";
		}
	elseif($text=='Wincor 0 9')
		{
		$result="Permasalahan Mesin Wincor \n\n";
		$result.="Definisi: Seolah-olah posisi switch Locking handle belum lancar \n\n";
		$result.="Solusi: Bisa kita bengkokkan sedikit Plat Handle nya, atau yang paling mudah, ganjal switch nya dengan kabel ties";
		}
	elseif($text=='@VallbotBot /simpan')
		{
		$result="chat ID: .$chatid. $message_id. Nama: $names, user: $username Sudah tersimpan \n\n";
		$result.=" \n\n";
		}
	else
		{
		return "Maaf, Data Tidak Ditemukan";
		}
	return $result;

	}
 
 
function process_message($message)
	{
    $updateid = $message["update_id"];
    $message_data = $message["message"];
    if (isset($message_data["text"])) 
		{
		$chatid = $message_data["chat"]["id"];
        $message_id = $message_data["message_id"];
        $text = $message_data["text"];
		/*
		$first_name = $message_data["chat"]["first_name"];
		$last_name = $message_data["chat"]["last_name"];
		$username = $message_data["chat"]["username"];
		*/
		$first_name = $message_data["reply_to_message"]["from"]["first_name"];
		$last_name = $message_data["reply_to_message"]["from"]["last_name"];
		$username = $message_data["reply_to_message"]["from"]["username"];

		$names=$first_name." ".$last_name;

        $response = create_response($username,$names,$chatid,$message_id,$text);
        send_reply($chatid, $message_id, $response, $username, $names);
		}
    return $updateid;
	}
 
 
function process_one()
	{
    $update_id  = 0;
 
    if (file_exists("last_update_id")) 
		{
        $update_id = (int)file_get_contents("last_update_id");
		}
 
    $updates = get_updates($update_id);
 
    foreach ($updates as $message)
		{
		$update_id = process_message($message);
		}
    file_put_contents("last_update_id", $update_id + 1);
 
	}
 

while (true) 
	{
    process_one();
	}
           
?>


</body>
</html>