
 <?php
//Load latest comment 
error_reporting(0);
echo @include_once 'includes/db.php';
echo @include_once 'includes/functions.php';
echo @include_once 'includes/tolink.php';
echo @include_once 'includes/time_stamp.php';
echo @include_once 'session.php';

$Wall = new Wall_Updates();
if(isSet($_POST['comment']))
{
$comment=$_POST['comment'];
$msg_id=$_POST['msg_id'];
$ip=$_SERVER['REMOTE_ADDR'];
$cdata=$Wall->Insert_Comment($uid,$msg_id,$comment,$ip);
if($cdata)
{
$com_id=$cdata['com_id'];
 $comment=tolink(htmlentities($cdata['comment'] ));
 $time=$cdata['created'];
 $username=$cdata['username'];
 $uid=$cdata['uid_fk'];
 $cface=$Wall->Gravatar($uid);
 ?>
<div class="stcommentbody" id="stcommentbody<?php echo $com_id; ?>">
<div class="stcommentimg">
<img src="<?php echo $cface; ?>" class='small_face'/>
</div> 
<div class="stcommenttext">
<a class="stcommentdelete" href="#" id='<?php echo $com_id; ?>'>X</a>
<b><?php echo $username; ?></b> <?php echo $comment; ?>
<div class="stcommenttime"><?php time_stamp($time); ?></div> 
</div>
</div>
<?php
}
}
?>
