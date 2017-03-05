<?php

    /*
        ubuntu 16.04 preloaded with php7   
        sudo apt-get update
        sudo apt-get install php7.0-sqlite3
    */

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
# create student table
    function create_student($db){
        $sql = <<<EOF
            DROP TABLE IF EXISTS students;
            CREATE TABLE students(
            sid  int  PRIMARY KEY,
            name text NOT NULL);
EOF;
        $ts = $db->exec($sql);
        if(!$ts){
            echo $db->lastErrorMsg();   
        }else{
            echo "Table students created\n";
        }   
        //$db->close();
    }
# create teacher table
    function create_teacher($db){
        $sql = <<<EOF
            DROP TABLE IF EXISTS teachers;
            CREATE TABLE teachers(
            tid  int  PRIMARY KEY,
            name text NOT NULL);
EOF;
        $tt = $db->exec($sql);
        if(!$tt){
            echo $db->lastErrorMsg();   
        }else{
            echo "Table teachers created\n";
        }   
        //$db->close();
    }
# create subjects table
    function create_subjects($db){
        $sql = <<<EOF
            DROP TABLE IF EXISTS subjects;
            CREATE TABLE subjects(
            subid  int  PRIMARY KEY,
            name text NOT NULL);
EOF;
        $tsub = $db->exec($sql);
        if(!$tsub){
            echo $db->lastErrorMsg();   
        }else{
            echo "Table Subjects created\n";
        }   
        //$db->close();
    }
# create grades table
    function create_grades($db){
        $sql = <<<EOF
            DROP TABLE IF EXISTS grades;
            CREATE TABLE grades(
            student_id INTEGER REFERENCES sid(id),
            teacher_id  INTEGER not null references teachers(tid),
            subject_id  INTEGER not null references subjects(subid),
            grade varchar(3),
            primary key(student_id, teacher_id, subject_id)
            );
EOF;
        $tg = $db->exec($sql);
        if(!$tg){
            echo $db->lastErrorMsg();   
        }else{
            echo "Table Grades created\n";
        }   
        //$db->close();
    }

# insert students
    function insert_students($db){

        $sql =<<<EOF
        INSERT INTO students (sid, name) VALUES(1, 'Bowie');
        INSERT INTO students (sid, name) VALUES(2, 'Cohen');
        INSERT INTO students (sid, name) VALUES(3, 'Prince');
        INSERT INTO students (sid, name) VALUES(4, 'Lemmy');
EOF;
       $in = $db->exec($sql);
        if(!$in){
            echo $db->lastErrorMsg();   
        }else{
            echo "Grades created\n";
        }   
        //$db->close();
    }

# calls
    create_student($db);
    create_teacher($db);
    create_subjects($db);
    create_grades($db);
    insert_students($db);
    
    echo "Operations successfull:)\n";
    $db->close();
?>