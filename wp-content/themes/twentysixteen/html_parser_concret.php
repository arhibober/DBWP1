<?php
/**
 * Template Name: Парсинг одной страницы клиентской версии дневника
 */

	get_header ();
	/*echo "<br/><br/><br/>".$file."<br/><br/><br/>".iconv ("windows-1251", "UTF-8", file_get_contents ("D:/Alex/DayBook_Main/".$file));*/
	$days = explode ("<h2", iconv ("windows-1251", "UTF-8", file_get_contents ("D:/Alex/DayBook_Main/February2007.htm")));
	$i = 0;
	foreach ($days as $day)
	{
		if ((strstr ($day, "<p>")) && ($i > 0))
		{
			$day1 = $day;
			$day = str_replace ("href=\"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("href =\"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("HREF=\"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("HREF =\"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("href= \"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("href = \"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("HREF= \"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("HREF = \"", "href=\"/DBWP/Photos/", $day);
			$day = str_replace ("src=\"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("src =\"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("SRC=\"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("SRC=\"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("src= \"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("src = \"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("SRC= \"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("SRC= \"", "src=\"/DBWP/Photos/", $day);
			$day = str_replace ("<br>", "", $day);
			$day = str_replace ("
", "", $day);
			$day = str_replace ("/n", "", $day);
			if (strstr ($day, "</h2>"))
			{
				$day = substr (strstr ($day, "</h2>"), 5, strlen (strstr ($day, "</h2>")) - 5);
				echo "<br/><br/><br/>".$day."<br/><br/><br/>";
			}
			else
			{
				$day = substr (strstr ($day, "</H2>"), 5, strlen (strstr ($day, "</H2>")) - 5);
				echo "<br/><br/><br/>".$day."<br/><br/><br/>";
			}
			$daym = strstr (substr(strstr ($day1, "chapter"), 7, strlen (strstr ($day1, "chapter")) - 7), "\"", true);
			if (strlen ($daym) == 1)
				$daym = "0".$daym;
			//echo $year."-".$month."-".$daym." 00:00:00";
			$post_data = array(
				"post_title" => "",
				"post_content" => $day,
				"post_status" => "publish",
				"post_type" => "post",
				"post_author" => 1,
				"post_date" => "2007-02-".$daym." 00:00:00",
				"post_date_gmt" => "2007-02-".$daym." 00:00:00"  
			);
			// Вставляем запись в базу данных
			$post_id = wp_insert_post ($post_data);
			global $wdb;
			$wpdb->query("UPDATE wp_posts SET POST_DATE='2007-02-".$daym." 00:00:00' where ID=".$post_id);
			$wpdb->query("UPDATE wp_posts SET POST_DATE_GMT='2007-02-".$daym." 00:00:00' where ID=".$post_id);
			$wpdb->query("UPDATE wp_posts SET POST_CONTENT='".$day." where ID=".$post_id);
		}
		$i++;
	}
	get_sidebar ();
	get_footer ();
?>
