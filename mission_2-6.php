<?php
//�폜�{�^�����������ꍇ
if (isset($_POST['sakujyo'])) {

//echo $_POST['delno'];

//file_name�Ɋi�[
$file_name = "mission2-2.txt";

//file_name�Ɋi�[�ł��Ă��邩�m�F
//echo $file_name;

//�z��Ƃ��ēǂ݁A$sakucontentsni�Ɋi�[
$sakucontents = file($file_name);

/*
echo"<pre>";
print_r($sakucontents);
echo"</pre>";
*/

	//���[�v�����̒���explode���A$bb�Ɋi�[
	for ($i = 0 ; $i < count($sakucontents); $i++){

	//$i�ɉ����i�[����Ă��邩�m�F
	/*
	echo"<pre>";
	print_r($i);
	echo"</pre>";
	*/

	$bb = explode("<>",$sakucontents[$i]);
	//$i�ɉ����i�[����Ă��邩�m�F
	/*
	echo"<pre>";
	print_r($bb);
	echo"</pre>";
	*/

		//�p�X���[�h�ƈ�v�����ꍇ 
		if ($bb [5] == $_POST['sakupasu'] ){
		/* 
		sakupasu���󂯎��Ă��邩�m�F
		echo"<pre>";
		print_r($_POST['sakupasu']);
		echo"</pre>";
		*/


			//�l����v�����ꍇ
			if ($bb [1] == $_POST['delno'] ){
	
			/*
			//��v�������̂��\������邩�m�F
			echo"<pre>";
			print_r($i);
			echo"</pre>";
			*/

			//�폜����@�i$�ϐ�,  ,������j
			array_splice($sakucontents, $i,1); 

			//�㏑��
			file_put_contents($file_name, implode($sakucontents));

			}
		}
	}

}

//�ҏW�{�^������������
if (isset($_POST['hensyu'])) {

//edino�������Ă��邩�m�F
/*
echo"<pre>";
print_r($_POST['edino'] );
echo"</pre>";
*/

//file_name�Ɋi�[
$file_name = "mission2-2.txt";
//echo $file_name;

//�z��Ƃ��ēǂ݁A$hencontents�Ɋi�[
$hencontents = file($file_name);
/*
echo"<pre>";
print_r($hencontents);
echo"</pre>";
*/

	//���[�v�����̒���explode���A$cc�Ɋi�[
	for ($j = 0 ; $j < count($hencontents); $j++){

	//$i�ɉ����i�[����Ă��邩�m�F
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
		//�p�X���[�h�ƈ�v��������s
		if ($cc [5] == $_POST['henpasu'] ){


			//�l����v�����ꍇ
			if ($cc [1] == $_POST['edino'] ){

			//��v�������̂��\������邩�m�F

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

			//delno�Ŏ󂯎�������e�ԍ��ɂ���A���O�ƃR�����g���e�L�X�g�{�b�N�X�ɕ\�� form�ɋL�q
			//echo $cc [3];

			}
		}

	}
}

//hidden�^�O���@�\���Ă��邩�m�F
//�ҏW�̏ꍇ
if ( !empty( $_POST['test'] ) ) {
   /* var_dump( $_POST['test'] ); */

//file_name�Ɋi�[
$file_name = "mission2-2.txt";
//echo $file_name;

//�z��Ƃ��ēǂ݁A$hencontents�Ɋi�[
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

//�ҏW�łȂ���
else {
   // echo '�V�K���e����';
//�e�L�X�g�t�@�C������ϐ�$filename�ɑ������
$filename ='mission2-2.txt';

if(isset($_POST['sousin']))
{ 

/*
echo"<pre>";
print_r($_POST['pasu']);
echo"</pre>";
*/

//fopen��a���[�h�Ńt�@�C�����J��
$fp=fopen($filename,'a');

//�z��Ƃ��ēǂݍ���

//�z���count�֐��ŏ������A���̒l��cnt�Ɋi�[����
$count = count( file( $filename ) );

//date�֐��ŏ����������̂�time�Ɋi�[
$time =  date('Y/m/d H:i:s');

if ( !empty( $count ) ) {

//fopen�ŊJ�����e�L�X�g�t�@�C���Ɏ󂯎�������������������
fwrite($fp,"<>". $count ."<>". $_POST['name']. "<>". $_POST['comment']. "<>". $time. "<>" .$_POST['pasu']. "<>". "\n" );
}

else {
fwrite($fp,"<>". 1 ."<>". $_POST['name']. "<>". $_POST['comment']. "<>". $time. "<>" .$_POST['pasu']. "<>". "\n" );
}

//fopen�ŊJ�����e�L�X�g�t�@�C�������
fclose($fp);

}


}


?>

<html lang="ja">

<head>

<meta charset="UFT-8">

<title>�����Ԃ낮</title>

</head>

<body>

<h1>�����u���O</h1>

<!_action�ő��M��@method�ŕ��@_>
<form action="mission_2-6.php" method="post">

<!_�u���O�v������_>
���O:<br />

<!_��s�^�C�v_>
<input type="text"name="name" value = "<?php echo $onamae;?>">  <br />

<!_�u�R�����g�v������_>
�R�����g�F<br />

<!_textarea name="example" cols="���͗��̕��𕶎����Ŏw��" rows="���͗��̍������s���Ŏw��"  _>
<textarea name="comment" cols="30" rows="5"><?php echo $koment;?></textarea>
<br />
<input type="hidden" name="test" value="<?php echo $_POST['edino']; ?>">

�p�X���[�h:<br />
<input type="text"name="pasu">  <br />

<input type="submit" name="sousin" value="���M "/> <br />

<!_�폜�t�H�[�����_>
<form action="mission_2-6.php" method="post">
<br />
�폜�Ώ۔ԍ��F
<input type="text"name="delno">  <br />
�p�X���[�h�F
<input type="text"name="sakupasu">  <br />
<input type="submit" name="sakujyo" value="�폜 "/>
</form>

<!_�ҏW�t�H�[�����_>
<form action="mission_2-6.php" method="post">

�ҏW�Ώ۔ԍ��F
<input type="text"name="edino"> <br />
�p�X���[�h�F
<input type="text"name="henpasu">  <br />
<input type="submit" name="hensyu" value="�ҏW "/>
</form>

</body>

</html>


<?php


//for�Ń��[�v
$file_name = "mission2-2.txt";

$contents = file('mission2-2.txt');

//exploede�ŏ���

 
//for�Ń��[�v
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

