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

    $sel = $db->query($sql);
    while($row = $sel->fetchArray(SQLITE3_ASSOC) ){
        echo "SID: ".$row['sid']."\n";
        echo "Name: ".$row['name']."\n";
    }
    }


    function select_teachers($db){
    $sql = <<<EOF
    SELECT * FROM teachers;

EOF;

    $sel = $db->query($sql);
    while($row = $sel->fetchArray(SQLITE3_ASSOC) ){
        echo "TID: ".$row['tid']."\n";
        echo "Name: ".$row['name']."\n";
    }
    }
# calls
    select_students($db);
    select_teachers($db);


?>
