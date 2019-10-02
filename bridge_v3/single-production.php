<?php
/*
Template Name: Production Index
*/
?>
<?php
if(get_field('show_page_styles') == "show_temptype")
{
	include(TEMPLATEPATH."/showpage.php");
}
elseif(get_field('show_page_styles') == "quarter_temptype")
{
	include(TEMPLATEPATH."/show_quarter.php");
}
elseif(get_field('show_page_styles') == "season_temptype")
{
	include(TEMPLATEPATH."/show_season.php");
}
else
{
	
	include(TEMPLATEPATH."/404.php");
}
?>  