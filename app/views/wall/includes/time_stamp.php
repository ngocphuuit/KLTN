
<?php
//Loading Comments link with load_updates.php 
function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"$seconds giây trước"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo"one minute ago"; 
    }
   else
   {
   echo"$minutes phút trước"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"một giờ trước";
   }
  else
  {
  echo"$hours giờ trước";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"một giờ trước";
   }
  else
  {
  echo"$days ngày trước";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"một tuần trước";
   }
  else
  {
  echo"$weeks tuần trước";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"một tháng trước";
   }
  else
  {
  echo"$months tháng trước";
  }
 
   
}

else
{
if($years==1)
   {
   echo"một năm trước";
   }
  else
  {
  echo"$years năm trước";
  }


}
 


} 



?>