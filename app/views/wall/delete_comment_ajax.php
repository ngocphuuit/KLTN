 <?php
//Load latest update 
error_reporting(0);
echo @include_once 'includes/db.php';
echo @include_once 'includes/functions.php';
echo @include_once 'includes/tolink.php';
echo @include_once 'includes/time_stamp.php';
echo @include_once 'session.php';
$Wall = new Wall_Updates();
if(isSet($_POST['com_id']))
{
$com_id=$_POST['com_id'];
$data=$Wall->Delete_Comment($uid,$com_id);
echo $data;

}
?>
