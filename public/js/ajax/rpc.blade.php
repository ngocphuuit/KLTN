<p id="searchresults">
<?php
	// PHP5 Implementation - uses MySQLi.
	// mysqli('localhost', 'root', '', 'test');
	$db = new mysqli('localhost', 'root', '', 'kltn');
	
	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			// Is the string length greater than 0?
			if(strlen($queryString) >0) {
				$query = $db->query("SELECT * FROM user WHERE username LIKE '%" . $queryString . "%' ORDER BY username LIMIT 5");
				
				if($query) {
					// While there are results loop through them - fetching an Object.
					
					// Store the category id
					$catid = 0;
					while ($result = $query ->fetch_object()) {
						if($result->username != $catid) { // check if the category changed
							echo '<span class="category">'.$result->username.'</span>';
							$catid = $result->username;
						}
	         			echo '<a href="http://localhost/KLTN2/personal/infor/'.$result->username.'">';
	         			echo '<img class="search-img" src="http://localhost/KLTN2/public/uploads/ava/'.$result->avatar.'" alt="" />';
	         			
	         			$name = $result->username;
	         			if(strlen($name) > 35) { 
	         				$name = substr($name, 0, 35) . "...";
	         			}	         			
	         			echo '<span class="searchheading">'.$name.'</span>';
	         			
	         			$description = $result->email;
	         			if(strlen($description) > 80) { 
	         				$description = substr($description, 0, 80) . "...";
	         			}
	         			
	         			echo '<span>'.$description.'</span></a>';
	         		}
	         		echo '<span class="seperator"><a href="#" title="Sitemap">Hãy điền đầy đủ tên chi tiết để tìm kiếm chính xác hơn</a></span><br class="break" />';
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'Không tìm thấy người dùng nào có tên này';
		}
	}
?>
</p>