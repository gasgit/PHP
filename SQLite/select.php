<?php

 class MyTestDB extends SQLite3{
        function __construct(){
            $this->open('testDB.db');
        }
    }

    $db = new MyTestDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }else{
        echo "Opened Sucessfully\n";
    }
   
# select all students query
    function select_students($db){
    $sql = <<<EOF
    SELECT * FROM students;

EOF;

    $ret = $db->query($sql);
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        echo "SID: ".$row['sid']."\n";
        echo "Name: ".$row['name']."\n";
    }
    }
# calls
    select_students($db);


?>