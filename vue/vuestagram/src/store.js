import { createStore } from 'vuex'
import axios from 'axios'

const store = createStore({
    state() {
        return{
            boardData: [], // 게시글 데이터 저장할 변수
            lastId: '', // 가장 마지막에 로드된 게시물의 ID
            addBtnFlg: true, // 더보기 버튼 표시용 플래그
            tapFlg: 0, // 텝UI flg (0:메인,1:필터,2:작성)
            imgUrl: '', // 이미지 URL
            filt: '',
        }
    },
    mutations:{ // 일반적인 자바스크립트 함수를 정의 한다.
        // 초기 데이터 셋팅용
        createBoardData(state, data) {
            state.boardData = data;
            this.commit('changeLastId', data[data.length-1].id);
        },
        // 더보기 데이터 셋팅용
        addBoardData(state, data) {
            state.boardData.push(data);
            this.commit('changeLastId', data.id);
        },
        // lastId 변경
        changeLastId(state, id) {
            state.lastId = id;
        },
        // 탭UI flg 변경
        changeTabFlg(state, num){
            state.tapFlg =num;
        },
        // 이미지 URL 변경
        changeImgUrl(state, imgUrl){
            state.imgUrl = imgUrl;
        },
        saveFilter(state, filt){
            state.filt = filt;
        }
    },
    actions:{ // 비동기나 시간이 오래 걸리는 함수를 정의한다.
        getMainList(context) {
            axios.get('http://192.168.0.66/api/boards')
            .then(res => {
                console.log(res.data);
                context.commit('createBoardData', res.data)
            })
        },
        getMoreList(context) {
            axios.get(`http://192.168.0.66/api/boards/${context.state.lastId}`)
            .then(res => {
                if(res.data){
                context.commit('addBoardData', res.data);
                }else {
                    context.state.addBtnFlg = false;
                    alert('없음');
                }
            })
            .catch(err => {
                console.log(err);
            })
        }
    }
})

export default store