<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ADD STAFF</title>
</head>
<body>
	<?php
		try{
			$dsn = 'mysql:dbname=docker-database;host=db-host;charset=utf8';
			$user='docker';
			$password='docker';
			$dbh = new PDO($dsn,$user,$password);
			$dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$sql = 'SELECT code,name FROM mst_staff WHERE 1';
			$stmt = $dbh->prepare($sql);
			$stmt ->execute();

			$dbh = null;
			
			print 'スタッフ一覧<br/><br/>';

			print '<form method="post" action="staff_edit.php">';

			while(true){
				$rec = $stmt->fetch(PDO::FETCH_ASSOC);
				if($rec==false){
					break;
				}
				print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
				print $rec['name'];
				print '<br/>';
			}
			print '<input type="submit" value="修正">';
			print '</form>';
			
		}catch (Eeception $e){
			print 'ただいま障害により大変ご迷惑をお掛けしております';
			exit();
		}


	?>
	<br/><a href="staff_add.php">スタッフ追加</a>
</body>
</html>
