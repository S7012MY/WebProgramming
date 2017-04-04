<html>
	<head>
	<script>
	function showHint(str) {
	    if (str.length == 0) { 
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else {
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET", "../gethint.php?q=" + str, true);
	        xmlhttp.send();
	    }
	}
	</script>
	</head>
	<body>
		<p><b>Find student:</b></p>
		<form> 
		First name: <input type="text" onkeyup="showHint(this.value)">
		</form>
		<p>Suggestions: <span id="txtHint"></span></p>
		<h3>Create user</h3>
		<form action="../lab9/add" method="post">
			Id:
			<input type="number" name="id" required><br>
			Name:
			<input type="text" name="name" required><br>
			<input type="submit" value="Submit"><br/>
		</form>
	</body>
</html>
<?php
	echo $_SERVER['REQUEST_URI'] . "<br>";
	$sq = new mysqli("localhost", "root", "", "web");
	if ($sq->connect_error) {
	    die("Connection failed: " . $sq->connect_error);
	}
	//$sq->query("CREATE TABLE students (id int(6) primary key, name VARCHAR(20))");
	if(strpos($_SERVER['REQUEST_URI'], 'add') !== false) {
		echo $_POST["name"] . "<br/>";
		$id = $_POST["id"];
		$name = $_POST["name"];
		if($sq->query("INSERT INTO students (id, name) VALUES ('$id', '$name')") === TRUE) {
			    echo "New record created successfully <br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $sq->error;
		}
	}

	if(strpos($_SERVER['REQUEST_URI'], 'delete') !== false) {
		$id = $_POST["id"];
		echo "id:" . $id . "<br>";
		if($sq->query("DELETE FROM students WHERE id = '$id'") === TRUE) {
			echo "Deleted " . $id . " successfully <br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $sq->error;
		}
	}
	if(strpos($_SERVER['REQUEST_URI'], 'update') !== false) {
		$id = $_POST["id"];
		$name = $_POST["name"];
		if($sq->query("UPDATE students SET name = '$name' WHERE id = '$id'") === TRUE) {
			echo "updated " . $id . " successfully <br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $sq->error;
		}
	}
	if(strpos($_SERVER['REQUEST_URI'], 'gethint') !== false) {
		echo "ajax";
	}


	$req = $sq->query("SELECT * FROM students");
	if ($req->num_rows > 0) {
	    // output data of each row
	    while($row = $req->fetch_assoc()) {
	        echo "id: " . $row["id"]. " - Name: " . $row["name"] . "<form action=\"../lab9/delete\" method=\"post\">" . 
	        "<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">" .
	        "<input type=\"submit\" value=\"Delete\"><br/></form>" . "<br>" .
	        "update name" . "<form action=\"../lab9/update\" method=\"post\">" . 
	        	"<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">" .
	        	"<input type=\"text\" name=\"name\" value=\"". $row["name"] ."\" required><br>".
	        	"<input type=\"submit\" value=\"Update\"><br/></form>" . "<br>" .
	        "</form>";
	    }
	} else {
	    echo "0 results <br>";
	}

    print("Hello World");
?>