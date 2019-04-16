<?php
include ("connection/config.php");
$link=mysqli_connect(db_host,db_user,db_password,db_name);

------------Select with fetch assoc---------------------

$SQL_ALL =mysqli_query($link,"SELECT USER_ID,USER_FNAME FROM users WHERE USER_NAME = 'support@elitecommunityaid.com'");
$data = mysqli_fetch_assoc($SQL_ALL);
$user_id = $data['USER_ID'];
$user_FNAME = $data['USER_FNAME'];
echo "$user_id $user_FNAME";

-----------select last decord on the database-----------
$SQL_USER =mysqli_query($link,"SELECT * FROM TABLE_NAME ORDER BY USER_ID DESC LIMIT 1");
while($data=mysqli_fetch_array($SQL_USER)){
	$user_id = $data['USER_ID'];
}

----------------select specific column-------------------
SQL_ALL =mysqli_query($link,"SELECT USER_ID,USER_FNAME FROM users WHERE USER_NAME = 'support@elitecommunityaid.com'");
while($data=mysqli_fetch_array($SQL_ALL)){
  $user_id = $data['USER_ID'];
  $user_FNAME = $data['USER_FNAME'];
  echo "$user_id $user_FNAME";
}

--------------select sum Scrip for PHP-------------------------
$user_amount = mysqli_query($link,"SELECT SUM(AMOUNT) FROM history WHERE USER_NAME ='supoort@elitecommunityaid.com'");
while($total = mysqli_fetch_array($user_amount)){
	$total_amount_each = $total[0];
}

----------------update user column (for more colum use comma to separate, USE set once)-----------------------
$SQL_UPDATE =mysqli_query($link,"UPDATE users SET USER_PASSWORD ='00000' WHERE USER_NAME ='support@elitecommunityaid.com'");
if($SQL_UPDATE){
	echo "USER UPDATED";
}
------------------update AMOUNT on the Query--------------------
$num = 5;
$SQL_UPDATE = mysqli_query($link,"UPDATE users SET permit = permit+ '$num' WHERE USER_NAME = 'support@elitecommunityaid.com'");
if($SQL_UPDATE){
	echo "USER UPDATED";
}else{echo "USER NOT UPDATED";}

-----------select users and get their sum-----------------------
$password = "dollar321";
$total_amount_each = 0;
$total_amount = 0;

$all_users= mysqli_query($link,"SELECT * FROM users WHERE USER_PASSWORD = '$password'");

while($data=mysqli_fetch_array($all_users)){
	$user_name = $data['USER_NAME'];

	$user_amount = mysqli_query($link,"SELECT SUM(AMOUNT) FROM history WHERE USER_NAME ='$user_name'");
	while($total = mysqli_fetch_array($user_amount)){
		$total_amount_each = $total[0];
	}
	echo "$user_name R $total_amount_each";
	$total_amount = $total_amount + $total_amount_each;
}
echo "Total R $total_amount";
?>
