<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //--------------------
        // 쿼리 빌더
        //--------------------
        // select
        $result = DB::select('select * from categories');
        $no = 5;
        $result = DB::select(
            'select * from categories where no = :no'
            ,['no' => $no]
        );
        // $result = DB::select(
        //     'select * from categories where no = ? and no = ?'
        //     ,[$no,7]
        // );

        $input =['4', '7', '8']; // categories의 no 컬럼
        // 게시글 번호, 게시글 제목, 카테고리명을 출력해 주세요. (게시글 번호로 오름차순 정렬 후 상위 5개만)
        // SELECT bno, category FROM boards WHERE category IN('4', '7', '8') order by bno LIMIT 5

        $result = DB::select(
            'SELECT b.bno, b.btitle, c.name 
            FROM categories c 
                inner join boards b 
                    on c.no = b.category 
            WHERE c.no = :no1 OR c.no = :no2 OR c.no = :no3 
            ORDER BY b.bno 
            limit 5'
            ,['no1'=> '4','no2'=>'7','no3'=>'8']
        );

        // $result = DB::insert(
        //     'INSERT INTO boards(
        //     category
        //     ,btitle
        //     ,bcontent
        //     ,created_at
        //     ,updated_at
        //     ) values (
        //     :category
        //     ,:btitle
        //     ,:bcontent
        //     ,now()
        //     ,now()
        //     )'
        //     ,['1', '제목', '내용']
        // );

        // 방금 등록한 게시글의 제목 : test, 내용 : testtest로 변경해 주세요.
        // $result = DB::update(
        //     'UPDATE boards
        //     SET btitle = :btitle, bcontent = :bcontent ,updated_at = now()
        //     WHERE bno = :bno
        //     ',['test', 'testtest', 22003]);

        // $result =DB::delete('delete from boards where bno = ?', [22003]);


        //-------------------------------
        // 쿼리 빌더 체이닝
        //-------------------------------
        // $no = 5;
        // select * from categories where no = :no
        // $result = DB::table('categories')->where('no', '=', $no)->get();
        
        // $no1 = '5';
        // $no2 = '8';
        // select * from categories where no = ? or no = ?(등호가 '='일 때는 생략 가능)
        // $result = DB::table('categories')->where('no',$no1)->orwhere('no',$no2)->get();

        // select * from categories where no in(?, ?)
        // $result = DB::table('categories')->whereIn('no',[$no1, $no2])->get();

        // select * from categories where no NOT IN(?, ?)
        // $result = DB::table('categories')->whereNotIn('no',[$no1, $no2])->get();

        // select id, no, name from categories
        // $result = DB::table('categories')->select('id','no','name')->get();

        // select id, no, name from categories order by name desc
        // $result = DB::table('categories')->select('id','no','name')->orderby('name','desc')->get();

        // *** 주의해서 사용(사용 안하는 걸 추천) *** whereRaw()   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        // $result = DB::table('categories')->whereRaw('no = ', $no1);

        // first() : Limit 1과 비슷한 작동(하나만 가지고 온다.)
        // $result = DB::table('boards')->orderby('bno','DESC')->first();

        // firstOrFail() : first()와 같은 동작을 하는데, 쿼리에 실패시 결과가 예외 발생 404에러(엘로퀀트[ORM] 모델 객체에서만 사용 가능).
        // $result = DB::table('boards')->orderby('bno','DESC')->firstOrFail();
        // $result = Board::orderby('bno','DESC')->firstOrFail();

        // 집계 메소드
        // $result = DB::table('boards')->count(); // 결과의 레코드수를 반환
        // $result = DB::table('boards')->max('bno'); // 해당 컬럼의 최대치를 반환
        // $result = DB::table('boards')->min('bno');
        // $result = DB::table('boards')->sum('bno');
        // $result = DB::table('boards')->avg('bno');

        // // 트랜잭션 
        // DB::beginTransaction(); // 트랜잭션 시작
        // DB::rollback(); // 롤백
        // DB::commit(); // 커밋

        // 카테고리가 활성화 되어 있는 게시글의 카테고리 별 갯수를 출력해 주세요.
        // 카테고리 번호, 카테고리명, 갯수
        $result = DB::table('categories')
                ->select('categories.no','categories.name',DB::raw('COUNT(*) as cnt'))
                ->join('boards','categories.no','=', 'boards.category')
                ->where('categories.active_flg','1')
                ->groupBy('categories.name','categories.no')
                ->get();

        
        return var_dump($result);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
