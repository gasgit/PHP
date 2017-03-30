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

    # insert students
    function insert_students($db){

        $sql =<<<EOF
        INSERT INTO students (sid, name) VALUES(1, 'Bowie');
        INSERT INTO students (sid, name) VALUES(2, 'Cohen');
        INSERT INTO students (sid, name) VALUES(3, 'Prince');
        INSERT INTO students (sid, name) VALUES(4, 'Lemmy');
EOF;
       $students_in = $db->exec($sql);
        if(!$students_in){
            echo $db->lastErrorMsg();
        }else{
            echo "Grades created\n";
        }
        //$db->close();
    }

    function insert_teachers($db){
        $sql =<<<EOF
        INSERT INTO teachers(tid, name) VALUES(123,'Mozart');
        INSERT INTO teachers(tid, name) VALUES(456, 'Beethoven');
        INSERT INTO teachers(tid, name) VALUES(789, 'Strauss');
        INSERT INTO teachers(tid, name) VALUES(012, 'Bach');
EOF;

        $in = $db->exec($sql);
          if(!$in){
            echo $db->lastErrorMsg();
          }
          else{
            echo "Teachers Created\n";

          }
        }


     insert_students($db);
     insert_teachers($db);



?>
