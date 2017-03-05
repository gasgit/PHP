<?php
    # non static 
    function my_score_keeper(){
        $s=0; 
        print "Non: $s \n";
        $s++;
    }

    # static 
    function my_static_score_keeper(){
        static $score = 0;
         print "Static: $score \n";    
        $score++;
    }

    for($i = 0; $i <= 5; $i++){
        my_score_keeper();
        my_static_score_keeper();
    }
    # print day of week
    $d = date("D:d:M:Y");
    print "Day is: $d\n";

