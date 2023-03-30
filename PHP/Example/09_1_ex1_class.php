<?php

// CLASS : 동종의 객체들이 함수들이 모여있는 집합

class Student
{
    // 앞에 접근제어 지시자를 붙인 변수는 클래스 멤버 변수 라고 부른다
    public $std_name; // 어디서든 접근 가능
    private $std_id; // Student Class 내에서만 접근 가능
    protected $std_age; // 상속 Class 내에서만 접근 가능
    // 접근제어 지시자 : public, private, protected

    // Class 안에 있는 function을 method라고 부름
    public function print_student($param_std_name, $param_std_age)
    {
        $result_name = "이름 : ". $param_std_name;
        $result_age = "나이 : ". $param_std_age."세";
        echo $result_name;
        echo "\n";
        echo $result_age;
    }

    // private 객체를 사용할 수 있는 방법
    public function set_std_id($param_id)
    {
        // this 포인터 : Class 자기 자신을 가르키고 있음
        $this->std_id = $param_id;
    }

    public function get_std_id()
    {
        return $this->std_id;
    }


}
// 클래스 호출하는 방법 new를 써서 호출한다.(Class를 초기화)
$obj_student = new Student;  // Class를 변수에 담아준다.

// Class안에 있는 function(method)를 호출하는 방법
// $obj_student ->print_student("홍길동", 27);

// Class의 멤버변수 사용방법
// $obj_student ->std_name = "갑돌이"; // class안의 멤버변수를 적용해주는 방법
// echo $obj_student ->std_name; // class안의

// 지시자가 private이기 때문에 접근 권한이 없다.
// $obj_student -> $std_id = "갑순이"; : Class안에서만 사용할 수 있어서 밖에서 사용하면 오류가 생긴다.



// 지시자가 protected이기 때문에 접근 권한이 없다.
// $obj_student -> $std_age = 24; : 상속된 Class안에서만 사용할 수 있어서 밖에서 사용하면 오류가생김

// getter, setter로 private 객체에 접근
$obj_student->set_std_id("갑순이id");
echo $obj_student->get_std_id();


