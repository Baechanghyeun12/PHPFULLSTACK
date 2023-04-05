<?php
/*********************************
파일명 :
시스템명 :
이력
    v001 : new - d1111
    v002 : star_print 수정 d1111


**********************************/







// 1. while + if가 조합된거(증감연산자가 없으면 무한루프된다.) 조건이 딱 맞을때 계속돈다.
// $i = 0;
// while($i <=4)
// {
//     if ($i === 1 )
//     {
//         echo "1입니다.";
//     }
//     elseif ($i === 4) {
//         echo "4입니다.";
//     }
//     $i++;
// }


//foreach + if 조합

// $arr_ass = array( "a" => 1, "b" => 2, "c" => 3 );
// foreach ($arr_ass as $key => $val)
// {
//     if ($key === "c" || $val === 2)
//     {
//         echo "if";
//     }
// }



// 이중 루프
// for($i = 2; $i <= 9; $i++)
// {
//     echo "$i 단\n";
//     for ($j=1; $j <= 9 ; $j++) { 
//         echo "$i X $j = ",$i*$j,"\n";
//     }
//     echo "\n";
// }

// 1 ~ 100까지 숫자 중에 짝수의 합을 구해주세요.
// $result = 0;
// for ($i=1; $i <= 100 ; $i++)
// { 
//     if ($i % 2 === 0 ) {
//         $result += $i;
//     }
// }

// echo $result;
// $arr_test =
//     array(
//         "a" => 1
//         ,"b" => 2
//         ,"info" => 
//             array(
//                 "info_a" => 3
//                 ,"info_b" =>4
//                 ,"info_arr" =>
//                     array(
//                         "f_1" =>5
//                         ,"f_2" =>7
//                     )
//             )
//     );

// echo $arr_test["info"]["info_b"];
// echo "\n";
// echo $arr_test["info"]["info_arr"]["f_2"];


// $arr_test =
//     array(
//         1
//         ,2
//         ,array(
//                 "info_a" => 3
//                 ,"info_b" =>4
//                 ,"info_arr" =>
//                     array(
//                         "f_1" =>5
//                         ,"f_2" =>7
//                     )
//             )
//     );



//     echo $arr_test[2]["info_arr"]["f_1"];


// 함수

// 함수명       : fnc_sum
// 기능         : 파라미터를 더한 값을 리턴
// 파라미터     : INT $param_a
//             : INT $param_b
// 리턴값       : INT $sum

// function fnc_sum($param_a, $param_b)
// {
//     $sum = $param_a + $param_b;
//     return $sum;
// }


// function fnc_sum2(...$param_numbers)
// {
//     $sum = 0;
//     $sum = $param_numbers[0] + $param_numbers[1] + $param_numbers[2];
//     return $sum;
// }






// function fnc_sum3(...$param_numbers)
// {
//     // $sum = 0;
//     // foreach( $param_numbers as $val)
//     // {
//     //     $sum += $val;
//     // }
//     return array_sum($param_numbers);  // array()의 값을 더해주는 함수
// }

// echo fnc_sum3(60, 80);


// function fnc_global()
// {
//     global $global_i;
//     $global_i = 0;
// }

// fnc_global();
// $global_i = 5;

// echo $global_i;

// function fnc_static()
// {
//     static $static_i = 0;
//     echo $static_i;
//     $static_i++;
// }

// fnc_static();
// fnc_static();
// fnc_static();

// function fnc_reference(&$param_str)
// {
//     $param_str = "fnc_reference";
// }

// $str = "aaa";

// fnc_reference($str);
// echo $str;


//
// function star_print($num) // v002 del : 원하는 문자로 찍기위해서 새로운 파라미터를 추가하기위해서 수정
// function star_print($num, $str) // v002 add
// {
//     for ($i=0; $i < $num ; $i++)
//     {
//         // echo "*"; // v002 del : 원하는 문자의 파라미터를 출력하기 위해서 "*"를 파라미터로 변경
//         echo $str;  // v002 add
//     }
//     echo "\n";
// }

// star_print(1, "ㄱ");
// star_print(2, "ㄴ");
// star_print(3, "ㄷ");









// function star_print_2($num)
// {
//     for ($i=1; $i <= $num ; $i++) { 
//         echo star_print($i),"\n";
//     }
// }


// star_print_2(5);






// function fnc_reference2( &$param_str )
// {
//     echo "2번 : $param_str\n";
//     $param_str ="fnc_refernce2에서 값 변경";
//     echo "3번 : $param_str \n";
// }
// $str = "aaa";
// echo "1번 : $str\n";
// fnc_reference2($str);
// echo "4번 : $str \n";









// ------------------------- Class -------------------------


class food
{
    // 접근 제어 지시자
    // public    : 어디서든(class밖에서도) 접근이 가능
    // private   : 해당 class내에서만 접근 가능
    // protected : class 자기 자신과 상속 class 내에서만 접근 가능


    // 멤버 변수
    // 멤버 변수는 보통 private으로 접근 제어 지시자를 설정한다.
    protected $str_name; // 음식 이름
    protected $int_price; //음식 가격

    // 메소드(함수)
    public function __construct( $param_name, $param_price ) // 객체의 초기값을 설정해주는 함수이다.
    {
        $this->str_name = $param_name;
        $this->int_price = $param_price;
    }

    public function fnc_print_food()
    {
        $str = $this->str_name." : ".$this->int_price."원\n";
        echo $str;
    }

    public function fnc_set_price($param_price )
    {
        $this->int_price = $param_price;
    }
}
// $price = 12000;
// $obj_food = new food( "탕수육", 10000 );
// $obj_food->fnc_print_food();

// // Food Class의 멤버 변수 $int_price의 값을 12000 바꾸어 주세요.
// $obj_food->fnc_set_price($price);
// $obj_food->fnc_print_food();



// 상속 : 부모 클래스의 객체들을 자식 클래스가 상속받아 사용할 수 있다.

class KoreanFood extends food // extend(확장하다, 연장하다) : 상속하는 방법
{
    protected $side_dish;

    public function __construct($param_name, $param_price, $param_side_dish)
    {
        $this->str_name = $param_name;
        $this->int_price = $param_price;
        $this->side_dish = $param_side_dish;
    }

    // 오버라이딩 : 부모클래스에서 정의된 메소드를 자식클래스에서 재정의
    public function fnc_print_food()
    {
        // $str = $this->str_name." : ".$this->int_price."원\n"."반찬 : ".$this->side_dish."\n";

        parent::fnc_print_food(); // 부모한테 있는 메소드(함수)를 사용하겠다는 뜻이다.
        $str = "반찬 : ".$this->side_dish."\n";
        echo $str;
    }
}

// $obj_Korean_Food = new KoreanFood( "치킨", 20000, "치킨무" );
// $obj_Korean_Food->fnc_print_food();


class People
{
    protected $name;

    public function __construct( $param_name )
    {
        $this->name = $param_name;
    }

    public function setName( $param_name )
    {
        $this->name = $param_name;
    }

    public function peoplePrint()
    {
        $print_pp = $this->name;
        echo "이름 : ".$print_pp."\n";
    }
}
class Student extends People
{
    protected $id;

    public function __construct( $param_name, $param_id )
    {
        $this->name = $param_name;
        $this->id = $param_id;
    }

    public function setid( $id )
    {
        $this->id = $id;
    }

    public function studentPrint()
    {
        parent::peoplePrint();
        $student_id_print = $this->id;
        echo "I D : ".$student_id_print;
    }
}
// $obj_people = new People( "부모" );
// $obj_people->peoplePrint();

$obj_student = new Student( "자식", "창현");
$obj_student->studentPrint();