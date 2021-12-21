<?php
	if (isset($_POST['getData'])) {
		$conn = new mysqli('localhost', 'root', '', 'testdata');
		// 					host,	 username,password, database

		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$sql = $conn->query("SELECT name, about FROM country LIMIT $start, $limit");
		if ($sql->num_rows > 0) {
			$response = "";

			while($data = $sql->fetch_array()) {
				$response .= '
				<div class="posts">
						<div class="user">
							<img src="' .$data['']. '" alt="image" class="avatar">
							<p class="username">' .$data['']. '</p>
						</div>
					<h2 class="title">' .$data['']. '</h2>
					<p class="content">' .$data['']. '</p>
					<img src="' .$data['']. '" alt=""class = "post-img">
				</div>
					
						<h2>'.$data['name'].'</h2>
						<p>'.$data['about'].'</p>
					</div>
				';
			}

			exit($response);
		} else
			exit('reachedMax');
	}
?>