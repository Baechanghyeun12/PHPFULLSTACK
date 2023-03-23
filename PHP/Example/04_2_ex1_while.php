<?php
    //1. while문
    // while (조건) {
    //     //반복하고 싶은 처리
    // }
    // $i = 2;
    // $l = 1;
    // $br = "  ";
    // while ($i === 2 && $l < 11) 
    // {
    //     echo $i."$br"."*"."$br".$l."$br"."="."$br".$i*$l."\n";
    //     $l++;
    // }


    // $i = 2;
    // while ($i < 10) 
    // {
    //     echo "[".$i."]"."단\n";
    //     $l = 1;
    //     while ($l < 10) 
    //     {
    //         echo $i." * ".$l." = ".$i*$l."\n";
    //         $l++;
    //     }
    //     $i++;
    // }


    //2. do while문 : 먼저 실행한 후 while의 조건을 확인한다.
    // do{
    //     반복 할 처리
    // }
    // while(조건);

    // $i = 0;

    
    // do{
    //     echo $i, " do while";
    // }
    // while($i === 1);

    // while($i === 1)
    // {
    //     echo $i, "while";
    // }


    //3. for문
    // for ($i=0; $i < ; $i++) { 
        
    // }

    for ($i=2; $i <= 9; $i++)
    { 
        echo $i,"단\n";
        for ($j=1; $j <= 9; $j++)
        { 
            $resurt = $i." * ".$j." = ".$i*$j."\n";
            echo $resurt;
        }
    }










?>