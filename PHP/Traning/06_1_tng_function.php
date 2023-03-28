<?php
    // 두 매개변수의 차를 구하는 함수를 구현해 주세요.

    function fnc_sub($a, $b)
    {
        // $sub = $a - $b;
        // return $sub;


        //바로 리턴을 하여도 상관없다. 개발자의 취향차이
        return $a - $b;
    }
    $fnc_result_sub = fnc_sub(5,3);

    // 두 매개변수를 나눈 함수를 구현해 주세요.

    function fnc_div($c, $d)
    {
        $div = $c / $d;
        return $div;
    }
    $fnc_result_div = fnc_div(6,2);

    // 두 매개 변수를 곱하는 함수를 구현해 주세요.

    function fnc_mul($e, $f)
    {
        $mul = $e * $f;
        return $mul;
    }
    $fnc_result_mul = fnc_mul(5,3);

    // 각가의 결과를 출력해주세요.

    // echo $fnc_result_sub,"\n";
    // echo $fnc_result_div,"\n";
    // echo $fnc_result_mul,"\n";



// 빼기

function fnc_args_sub()
{
    $args = func_get_args();
    $sub = 0;

    foreach ($args as $key => $val)
    {
        if($key === 0)
        {
            $sub = $val;
        }
        else(
            $sub -= $val
        );
    }
    return $sub;
}
echo fnc_args_sub(10,2,5),"\n";


// 나누기

    function fnc_args_div()
    {
        $args = func_get_args();
        $sub = $args[0]*$args[0];
    
        foreach ($args as $val)
        {
            $sub /= $val;
        }
        return $sub;
    }
    echo fnc_args_div(10,2,5),"\n";

// 곱하기
    function fnc_args_mul()
    {
        $args = func_get_args();
        $sub = $args[0]/$args[0];
    
        foreach ($args as $val)
        {
            $sub *= $val;
        }
        return $sub;
    }
    echo fnc_args_mul(10,2,5),"\n";

    


function fnc_args_minus()
{
    $result_args = func_get_args();
    $result_minus = null;

    foreach ($result_args as $val) {
        if(is_null($result_minus))
        {
            $result_minus = $val;
        }
        else{
            $result_minus -= $val;
        }
    }
    return $result_minus;
}
echo fnc_args_minus(10, 2, 5);



?>