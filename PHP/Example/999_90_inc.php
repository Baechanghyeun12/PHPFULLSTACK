<?php
$num = 91;
include_once("999_93_config.php");
// require_once 랑 include_once의 차이점은 require_once는 에러가 났을 때 페이탈 에러를 내고 include_once는 워링을 낸다.
if($num === 91)
{
    include_once("999_".$num."_inc.php");
}
else if($num === 94)
{
    include_once("999_".$num."_inc.php");
}
?>