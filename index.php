<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fgjя</title>
</head>

<body>
<?php
// Обратите внимание, что оператор !== не существовал до версии 4.0.0-RC2

if ($handle = opendir('.')) {
    echo "Дескриптор каталога: $handle\n";
    echo "Файлы:\n";

    /* Именно этот способ чтения элементов каталога является правильным. */
    while (false !== ($file = readdir($handle))) { 
        echo "$file\n";
    }

    /* Этот способ НЕВЕРЕН. */
    while ($file = readdir($handle)) { 
        echo "$file\n";
    }

    closedir($handle); 
}
?> 
<?php
$dir = opendir ("."); 
        while (false !== ($file = readdir($dir))) {
                if (strpos($file, '.gif',1)||strpos($file, '.jpg',1) ) {
                    echo "$file <br />";
                }
        }
?>
<?php

  /**
   * Return the number of files that resides under a directory.
   * 
   * @return integer
   * @param    string (required)   The directory you want to start in
   * @param    boolean (optional)  Recursive counting. Default to FALSE. 
   * @param    integer (optional)  Initial value of file count
   */ 

  function num_files($dir, $recursive=false, $counter=0) {
    static $counter;
    if(is_dir($dir)) {
      if($dh = opendir($dir)) {
        while(($file = readdir($dh)) !== false) {
          if($file != "." && $file != "..") {
              $counter = (is_dir($dir."/".$file)) ? num_files($dir."/".$file, $recursive, $counter) : $counter+1;
          }
		  echo "$counter <br />";
	echo "$file <br />";
        }
        closedir($dh);
      }
    }
    return $counter;
	
  }

  // Usage:
  $nfiles = num_files(".", true); // count all files that resides under /home/kchr, including subdirs
  $nfiles = num_files("."); // count the files directly under /tmp
	
?>

</body>
</html>