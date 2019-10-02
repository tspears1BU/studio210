<?php
/*
Template Name: Cast Index
*/
?>
<?php
if(get_field('cast_post_type') == "show")
{
	include(TEMPLATEPATH."/casting_solo.php");
}
elseif(get_field('cast_post_type') == "quarter")
{
	include(TEMPLATEPATH."/casting_list.php");
}
else
{
	include(TEMPLATEPATH."/404.php");
}
?>  