<?php
//블랙잭 게임
//-카드 숫자를 합쳐 가능한 21에 가깝게 만들면 이기는 게임

//1. 게임 시작시 유저와 딜러는 카드를 2개 받는다.
// 1-1. 이때 유저 또는 딜러의 카드 합이 21이면 결과 출력
//2. 카드 합이 21을 초과하면 패배
// 2-1. 유저 또는 딜러의 카드의 합이 21이 넘으면 결과 바로 출력
//4. 카드의 계산은 아래의 규칙을 따른다.
// 4-1.카드 2~9는 그 숫자대로 점수
// 4-2. K·Q·J,10은 10점
// 4-3. A는 1점 또는 11점 둘 중의 하나로 계산
//5. 카드의 합이 같으면 다음의 규칙에 따름
// 5-1. 카드수가 적은 쪽이 승리
// 5-2. 카드수가 같을경우 드로우한다.
//6. 유저가 카드를 받을 때 딜러는 아래의 규칙을 따른다.
// 6-1. 딜러는 카드의 합이 17보다 낮을 경우 카드를 더 받음
// 6-2. 17 이상일 경우는 받지 않는다.
// 한번 사용한 카드는 다시 쓸 수 없다.
//7. 1입력 : 카드 더받기, 2입력 : 카드비교, 0입력 : 게임종료

class blackjack
{
    public $arr_n = array(
                        "0"=>
                            array
                                (
                                    "spade_A"
                                    ,"spade_2"
                                    ,"spade_3"
                                    ,"spade_4"
                                    ,"spade_5"
                                    ,"spade_6"
                                    ,"spade_7"
                                    ,"spade_8"
                                    ,"spade_9"
                                    ,"spade_10"
                                    ,"spade_J"
                                    ,"spade_Q"
                                    ,"spade_K"
                                )
                        ,"1" =>
                            array
                                (
                                    "dia_A"
                                    ,"dia_1"
                                    ,"dia_2"
                                    ,"dia_3"
                                    ,"dia_4"
                                    ,"dia_5"
                                    ,"dia_6"
                                    ,"dia_7"
                                    ,"dia_8"
                                    ,"dia_9"
                                    ,"dia_10"
                                    ,"dia_J"
                                    ,"dia_Q"
                                    ,"dia_K"
                                )
                        ,"2"=>
                            array
                                (
                                    "clover_A"
                                    ,"clover_2"
                                    ,"clover_3"
                                    ,"clover_4"
                                    ,"clover_5"
                                    ,"clover_6"
                                    ,"clover_7"
                                    ,"clover_8"
                                    ,"clover_9"
                                    ,"clover_10"
                                    ,"clover_J"
                                    ,"clover_Q"
                                    ,"clover_K"
                                )
                        ,"3"=>
                            array
                                (
                                    "heart_A"
                                    ,"heart_2"
                                    ,"heart_3"
                                    ,"heart_4"
                                    ,"heart_5"
                                    ,"heart_6"
                                    ,"heart_7"
                                    ,"heart_8"
                                    ,"heart_9"
                                    ,"heart_10"
                                    ,"heart_J"
                                    ,"heart_Q"
                                    ,"heart_K"
                                )
                        );

public function rand_user_card()
{
    $result= $this->arr_card[rand(0,3)][rand(0, 12)];
    // echo $result;
}
}

// while(true) {
// 	echo '시작';
// 	print "\n";
// 	fscanf(STDIN, "%d\n", $input);        

// 	if($input === 0) {
// 		break;
// 	}
//     else if($input === 1)
//     {
        
//     }
//     else if($input === 2 )
//     {

//     }
// 	echo $input;
// 	print "\n";
// }
// echo "끝!\n";

// $obj_blackjack = new blackjack();
// echo $obj_blackjack->rand_user_card();







$card_arra = array();

    for ($n=0; $n <4; $n++) 
    { 
        for ($i=1; $i < 14 ; $i++) 
        { 
            if ($n=== 1) 
            {
                $card_arra[$i]="a";
            }
            elseif ($n === 11) 
            {
                $card_arra[$i]="j";
            }
            elseif ($n === 12) 
            {
                $card_arra[$i]="k";
            }
            elseif ($n === 13) 
            {
                $card_arra[$i]="q"."\n";
            }
            else
            {
                $card_arra[$i]=$i;
            }
        }
    }

    $player = array();
    $dealer = array();
    $dealer = array_rand($card_arra,2); 
    $player = array_rand($card_arra,2); 

    // var_dump($player);
    foreach ($card_arra as $key => $val)
    {
        $key
    }

    
