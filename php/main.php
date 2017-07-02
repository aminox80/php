<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php
    //取得したいURLを指定
    $html = file_get_contents("http://navi.hamabus.city.yokohama.lg.jp/koutuu/smart/location/BusLocationResult?startId=00090441&courseIds=0001600057.0001600116.0001600005.0001600401.0001600467.0001600473.0001600543");

    if($html != ""){

        //取得したHTMLを表示出来るように変換
        $html = htmlspecialchars($html);
        //$html = mb_convert_encoding($html,"SJIS", "auto");

        //改行コードを変換
        //$html = str_replace("\n", "<br/>", $html);

$data = explode( "\n", $html );
$cnt = count( $data );
for( $i=0;$i<$cnt;$i++ )
{
    if(strpos($data[$i],'個前の停留所を発車') !== false){
      //'abcd'のなかに'bc'が含まれている場合
      preg_match('/(\w+)個前の停留所を発車/', $data[$i], $match);
      //var_dump($match);
      echo($match[1]);
      echo nl2br("\n");
    }

    if(strpos($data[$i],'個前の停留所を発車') === false){
      //'abcd'のなかに'bc'が含まれていない場合
    }
}


}else{

        $info_msg = "ファイルの取得に失敗しました";
        echo ($info_msg);

    }
?>
</body>
</html>
