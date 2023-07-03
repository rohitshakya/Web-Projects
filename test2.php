<?php 

$handle = fopen("test_data_file.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
      
      $currentDate   = date("Y/m/d");
      if (strpos($line, $currentDate)) 
      {     
        echo $line."<br>"; 
      }
    }

    fclose($handle);
}


?>