 $sql2 = "SELECT name FROM user WHERE id=$id"; //for descending order use "ORDER BY title DESC"
  $result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {

  // output data of each row
  while($row = $result2->fetch_assoc()) {
    echo  "<h3><strong>".$row["name"]."</strong></h3>";
    

  }