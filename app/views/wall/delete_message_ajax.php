 <?php
//Load latest update 
error_reporting(0);
echo @include_once 'includes/db.php';
echo @include_once 'includes/functions.php';
echo @include_once 'includes/tolink.php';
echo @include_once 'includes/time_stamp.php';
echo @include_once 'session.php';
$Wall = new Wall_Updates();
if(isSet($_POST['msg_id']))
{
$msg_id=$_POST['msg_id'];
$data=$Wall->Delete_Update($uid,$msg_id);
echo $data;

}
?>
