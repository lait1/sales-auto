<template>
    <main class="container box">
        <div class="box-header">
            <h2>Чат</h2>
        </div>
        <div class="box-body">
            <div class="col-sm-4">
                <select name="" multiple class="form-control" v-model='userSelect'>
                    <option v-for="user in users" :value="'new-action.' +user.id">{{user.login}}</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="" cols="30" rows="10" class="form-control">{{dataMessage.join('\n')}}</textarea>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" v-model="message">
                <div class="input-group-append">
                    <button @click="sendMessage()" class="btn btn-outline-secondary">Отправить</button>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        name: "index",
        data: function () {
            return {
                dataMessage: [],
                message: '',
                userSelect: [],
                users: {},
                user: ""
            }
        },
        computed: {
            currentUser(){
                return this.$store.state.user;
            },
        },
        mounted() {
            this.update();
            this.getUser();

        },
        methods: {
            sendMessage: function () {
                if (!this.userSelect.length) {
                    this.userSelect.push('new-action.')
                }
                axios({
                    method: 'get',
                    url: '/api/start/send-private-message',
                    params: {channels: this.userSelect, message: this.message, user: this.currentUser.login}
                }).then((response) => {
                    this.dataMessage.push(this.currentUser.login + ': ' + this.message);
                    this.message = "";
                });
            },
            update: function () {
                // this.user = this.currentUser.id;
                axios.get('/api/user').then((response) => {
                    this.users = response.data;
                })
            },
            getUser() {
                axios.get('/api/user/access').then((response) => {
                    this.user = response.data.id;
                    var socket = io.connect('http://localhost:3000');

                    socket.on("new-action."+this.user+":App\\Events\\NewPrivateMessage", function (data) {
                        console.log(data.message);
                        this.dataMessage.push(data.message.user + ':' + data.message.message);
                    }.bind(this));
                }).catch((response) => {
                    alert("Ошибка");
                });
            }
            // toggleBlock(item) {
            //     axios.get('/api/user/blocked/' + item.id)
            //         .then((response) => {
            //             item.blocked = response.data;
            //         });
            // },
            // deleteUser(id, index) {
            //     if (confirm("Вы уверены?")) {
            //         axios.delete('/api/user/' + id)
            //             .then((response) => {
            //                 this.users.splice(index, 1);
            //             })
            //             .catch((response) => {
            //                 alert("Ошибка удаления");
            //             });
            //     }
            // },
        }
    }
</script>

<style scoped>

</style>