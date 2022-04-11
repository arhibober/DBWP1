<?php
/**
 * Template Name: Парсинг клиентской версии дневника
 */

	get_header ();
	$dir = opendir ("D:/Alex/site/DayBook");
	while ($file = readdir ($dir))
		if (((strstr ($file, "199")) || (strstr ($file, "20"))) && (strstr ($file, ".htm")) && (strlen ($file) > 8))
		{
			/*echo "<br/><br/><br/>".$file."<br/><br/><br/>".iconv ("windows-1251", "UTF-8", file_get_contents ("D:/Alex/DayBook_Main/".$file));*/
			$days = explode ("<h2", iconv ("windows-1251", "UTF-8", file_get_contents ("D:/Alex/site/DayBook/".$file)));
			$i = 0;
			foreach ($days as $day)
			{
				//echo "<br/><br/><br/>".$day."<br/><br/><br/>";
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
					$year = substr ($file, strlen ($file) - 8, 4);
					switch (substr ($file, 0, strlen ($file) - 8))
					{
						case "January";
							$month = "01";
							break;
						case "February";
							$month = "02";
							break;
						case "March";
							$month = "03";
							break;
						case "April";
							$month = "04";
							break;
						case "May";
							$month = "05";
							break;
						case "June";
							$month = "06";
							break;
						case "July";
							$month = "07";
							break;
						case "August";
							$month = "08";
							break;
						case "September";
							$month = "09";
							break;
						case "October";
							$month = "10";
							break;
						case "November";
							$month = "11";
							break;
						case "December";
							$month = "12";
							break;
					}
					$daym = strstr (substr(strstr ($day1, "chapter"), 7, strlen (strstr ($day1, "chapter")) - 7), "\"", true);
					if (strlen ($daym) == 1)
						$daym = "0".$daym;
					echo $year."-".$month."-".$daym." 00:00:00";
					$post_data = array(
						"post_title" => "",
						"post_content" => $day,
						"post_status" => "publish",
						"post_type" => "post",
						"post_author" => 1,
						"post_date" => $year."-".$month."-".$daym." 00:00:00",
						"post_date_gmt" => $year."-".$month."-".$daym." 00:00:00"  
						);
					// Вставляем запись в базу данных
					$post_id = wp_insert_post ($post_data);
					global $wdb;
					$wpdb->query("UPDATE wp_posts SET POST_DATE='".$year."-".$month."-".$daym." 00:00:00' where ID=".$post_id);
					$wpdb->query("UPDATE wp_posts SET POST_DATE_GMT='".$year."-".$month."-".$daym." 00:00:00' where ID=".$post_id);
					$wpdb->query("UPDATE wp_posts SET POST_CONTENT='".$day." where ID=".$post_id);
				}
				$i++;
			}
		}
	get_sidebar ();
	get_footer ();
?>
