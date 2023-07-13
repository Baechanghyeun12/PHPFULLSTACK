<template>
    <div class="header">
        <h1>Todo List</h1>
            <input type="text" name="content" id="content">
            <button @click="contentSave()">등록</button>
    </div>
    <div v-for="data in data" :key="data">
        <input type="checkbox" @change="cancelLine(data.id,data.completed)" v-model="data.completed">
        <p style="text-align: center;" :id="'l'+ data.id">{{ data.content }}{{ data.completed }}</p>
        <button @click="listDelete(data.id)">삭제</button>
    </div>
</template>
<script>
export default {
    name: 'App',
    data() {
        return {
            data: [],
            ischeck: null,
        }
    },
    created() {
        this.contentSelect()
    },
    methods: {
        cancelLine(data,comp){
            console.log(comp);
            fetch(`/api/items/${data}`,{
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({"item": {
                    "completed": `${comp ? false : true}`
                }})
            }).then(req => console.log(req))
        },
        contentSave(){
            fetch('/api/items',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({"item": {
                    "content": `${document.getElementById('content').value}`,
                }})
            }).then(fetch('/api/items')
            .then(req => req.json())
            .then(data => {
                this.data = data;
                console.log(this.data);
            }))
        },
        contentSelect() {
            fetch('/api/items')
            .then(req => req.json())
            .then(data => {
                this.data = data;
                console.log(this.data);
            })
        },
        listDelete(id){
            fetch(`/api/items/${id}`,{
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                }
            })
            .then(console.log(this.data.id),fetch('/api/items')
            .then(req => req.json())
            .then(data => {
                this.data = data;
                console.log(this.data);
            }))
        }
    },
}

</script>
<style>
.line{
    color: crimson;
    text-decoration: line-through;
}
h1{
    color: bisque;
}
.header{
    background-color: black;
    padding: 40px;
    text-align: center;
}
</style>
