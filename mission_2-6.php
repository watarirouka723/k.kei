<?php
//削除ボタンを押した場合
if (isset($_POST['sakujyo'])) {

//echo $_POST['delno'];

//file_nameに格納
$file_name = "mission2-2.txt";

//file_nameに格納できているか確認
//echo $file_name;

//配列として読み、$sakucontentsniに格納
$sakucontents = file($file_name);

/*
echo"<pre>";
print_r($sakucontents);
echo"</pre>";
*/

	//ループ処理の中でexplodeし、$bbに格納
	for ($i = 0 ; $i < count($sakucontents); $i++){

	//$iに何が格納されているか確認
	/*
	echo"<pre>";
	print_r($i);
	echo"</pre>";
	*/

	$bb = explode("<>",$sakucontents[$i]);
	//$iに何が格納されているか確認
	/*
	echo"<pre>";
	print_r($bb);
	echo"</pre>";
	*/

		//パスワードと一致した場合 
		if ($bb [5] == $_POST['sakupasu'] ){
		/* 
		sakupasuが受け取れているか確認
		echo"<pre>";
		print_r($_POST['sakupasu']);
		echo"</pre>";
		*/


			//値が一致した場合
			if ($bb [1] == $_POST['delno'] ){
	
			/*
			//一致したものが表示されるか確認
			echo"<pre>";
			print_r($i);
			echo"</pre>";
			*/

			//削除する　（$変数,  ,一個だけ）
			array_splice($sakucontents, $i,1); 

			//上書き
			file_put_contents($file_name, implode($sakucontents));

			}
		}
	}

}

//編集ボタンを押した時
if (isset($_POST['hensyu'])) {

//edinoが送られているか確認
/*
echo"<pre>";
print_r($_POST['edino'] );
echo"</pre>";
*/

//file_nameに格納
$file_name = "mission2-2.txt";
//echo $file_name;

//配列として読み、$hencontentsに格納
$hencontents = file($file_name);
/*
echo"<pre>";
print_r($hencontents);
echo"</pre>";
*/

	//ループ処理の中でexplodeし、$ccに格納
	for ($j = 0 ; $j < count($hencontents); $j++){

	//$iに何が格納されているか確認
	/*
	echo"<pre>";
	print_r($j);
	echo"</pre>";
	*/

	$cc = explode("<>",$hencontents[$j]);

	/*
	echo"<pre>";
	print_r($cc);
	echo"</pre>";
	*/
		//パスワードと一致したら実行
		if ($cc [5] == $_POST['henpasu'] ){


			//値が一致した場合
			if ($cc [1] == $_POST['edino'] ){

			//一致したものが表示されるか確認

			/*
			echo"<pre>";
			print_r( $_POST['edino']);
			echo"</pre>";
			*/
			$onamae=$cc [2] ;

			/*
			echo"<pre>";
			print_r( $onamae);
			echo"</pre>";
			*/

			$koment=$cc [3] ;

			//delnoで受け取った投稿番号にある、名前とコメントをテキストボックスに表示 formに記述
			//echo $cc [3];

			}
		}

	}
}

//hiddenタグが機能しているか確認
//編集の場合
if ( !empty( $_POST['test'] ) ) {
   /* var_dump( $_POST['test'] ); */

//file_nameに格納
$file_name = "mission2-2.txt";
//echo $file_name;

//配列として読み、$hencontentsに格納
$hencontents = file($file_name);

/*
echo"<pre>";
print_r($hencontents);
echo"</pre>";
*/


$time=date('Y/m/d H:i:s');
$edinum=$_POST['test'];

/*
echo"<pre>";
print_r($_POST['test'] );
echo"</pre>";
*/

/*
echo"<pre>";
print_r($time);
echo"</pre>";
*/


array_splice($hencontents, $_POST['test'] , 1 , "<>".  $_POST['test'] ."<>". $_POST['name']. "<>". $_POST['comment']. "<>". $time."<>".$_POST['pasu']. "<>" ."\n" ); 

file_put_contents($file_name, $hencontents );
 


echo"<pre>";
print_r($_POST['pasu']);
echo"</pre>";

}

//編集でない時
else {
   // echo '新規投稿だよ';
//テキストファイル名を変数$filenameに代入する
$filename ='mission2-2.txt';

if(isset($_POST['sousin']))
{ 

/*
echo"<pre>";
print_r($_POST['pasu']);
echo"</pre>";
*/

//fopenのaモードでファイルを開く
$fp=fopen($filename,'a');

//配列として読み込む

//配列をcount関数で処理し、その値をcntに格納する
$count = count( file( $filename ) );

//date関数で処理したものをtimeに格納
$time =  date('Y/m/d H:i:s');

if ( !empty( $count ) ) {

//fopenで開いたテキストファイルに受け取った文字列を書き込む
fwrite($fp,"<>". $count ."<>". $_POST['name']. "<>". $_POST['comment']. "<>". $time. "<>" .$_POST['pasu']. "<>". "\n" );
}

else {
fwrite($fp,"<>". 1 ."<>". $_POST['name']. "<>". $_POST['comment']. "<>". $time. "<>" .$_POST['pasu']. "<>". "\n" );
}

//fopenで開いたテキストファイルを閉じる
fclose($fp);

}


}


?>

<html lang="ja">

<head>

<meta charset="UFT-8">

<title>わんわんぶろぐ</title>

</head>

<body>

<h1>わんわんブログ</h1>

<!_actionで送信先　methodで方法_>
<form action="mission_2-6.php" method="post">

<!_「名前」を入れる_>
名前:<br />

<!_一行タイプ_>
<input type="text"name="name" value = "<?php echo $onamae;?>">  <br />

<!_「コメント」を入れる_>
コメント：<br />

<!_textarea name="example" cols="入力欄の幅を文字数で指定" rows="入力欄の高さを行数で指定"  _>
<textarea name="comment" cols="30" rows="5"><?php echo $koment;?></textarea>
<br />
<input type="hidden" name="test" value="<?php echo $_POST['edino']; ?>">

パスワード:<br />
<input type="text"name="pasu">  <br />

<input type="submit" name="sousin" value="送信 "/> <br />

<!_削除フォーム作る_>
<form action="mission_2-6.php" method="post">
<br />
削除対象番号：
<input type="text"name="delno">  <br />
パスワード：
<input type="text"name="sakupasu">  <br />
<input type="submit" name="sakujyo" value="削除 "/>
</form>

<!_編集フォーム作る_>
<form action="mission_2-6.php" method="post">

編集対象番号：
<input type="text"name="edino"> <br />
パスワード：
<input type="text"name="henpasu">  <br />
<input type="submit" name="hensyu" value="編集 "/>
</form>

</body>

</html>


<?php


//forでループ
$file_name = "mission2-2.txt";

$contents = file('mission2-2.txt');

//exploedeで処理

 
//forでループ
foreach ($contents as $content ){
$aa = explode("<>",$content);


 echo $aa[1];
  echo "<br>";
 echo $aa[2];
  echo "<br>";
 echo $aa[3];
  echo "<br>";
 echo $aa[4];
  echo "<br>";
  echo "<br>";
echo "<hr>";

}

?>

