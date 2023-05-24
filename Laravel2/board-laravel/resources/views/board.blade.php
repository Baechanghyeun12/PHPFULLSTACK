@foreach($boards as $key)
    <span>{{'board_no'.' : '.$key->board_no}}</span><br>
    <span>{{'board_title'.' : '.$key->board_title}}</span><br>
    <span>{{'board_contents'.' : '.$key->board_contents}}</span><br>
    <span>{{'board_write_date'.' : '.$key->board_write_date}}</span><br>
    <span>{{'board_del_flg'.' : '.$key->board_del_flg}}</span><br>
    <span>{{'board_del_date'.' : '.$key->board_del_date}}</span><br>
    <hr>
@endforeach
<a href="{{route('board.create')}}">go create</a>