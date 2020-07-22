<template>
    <main class="container box">
        <div class="box-header">
            <h2>Чат</h2>
        </div>
        <div class="box-body">
            <div class="messenger">
                <div class="messenger__header">
                    <a href="#" class="messenger__link messenger__link-auto">Горный велосипед Stern Motion 29, новый</a>
                </div>
                <div class="messenger__content">
                    <div v-for="item, index in room.message"
                         v-bind:class="[item.user_id ? 'message-from' : 'message-to', 'message']">
                        <div class="message-text">{{item.message}}
                            <span class="time">{{item.date}}</span></div>
                    </div>

                </div>
            </div>
            <span v-if="isActive"> набирает сообщение...</span>

            <form v-on:submit.prevent="sendMessage()" class="input-group">
                <input type="text" class="form-control" v-model="message" placeholder="Написать сообщение">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary">
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    </main>
</template>

<script>
    export default {
        name: "index",
        props: ['room'],
        data: function () {
            return {
                dataMessage: [],
                message: '',
                isActive: false,
                typingTimer: false,
                // userSelect: [],
                // users: {},
                // user: ""
            }
        },
        // computed: {
        //     currentUser(){
        //         return this.$store.state.user;
        //     },
        // },
        mounted() {
            console.log(this.room);
            // this.update();
            // this.getUser();
            this.channel
                .listen('PrivateMessage', ({message}) => {
                    console.log(message);
                    this.room.message.push(message);
                    this.isActive = false;
                })
                .listenForWhisper('typing', (e) => {
                    this.isActive = e;
                    if(this.typingTimer) clearTimeout(this.typingTimer);
                    this.typingTimer = setTimeout(() => {
                        this.isActive = false;
                    }, 2000);
                });

            // window.Echo.private('room.' + this.room.id)
            //     .listen('PrivateMessage', ({message}) => {
            //         console.log(message);
            //         this.room.message.push(message)
            //     })
        },
        computed: {
            channel() {
                return window.Echo.private('room.' + this.room.id);
            }
        },
        methods: {
            sendMessage: function () {
                axios({
                    method: 'get',
                    url: '/messages',
                    params: {message: this.message, room_id: this.room.id}
                }).then((response) => {
                    var Data = new Date();
                    this.room.message.push( {
                        message: this.message,
                        date: Data.getHours() + ':' + Data.getMinutes(),
                        user_id: null
                    });
                    this.message = "";
                });
            },
            // update: function () {
            //     axios.get(`/api/room/${this.$route.params.id}`).then((response) => {
            //         this.dataMessage = response.data.message;
            //         this.client = response.data.client;
            //         this.auto = response.data.auto;
            //     })
            // },
            // update: function () {
            //     // this.user = this.currentUser.id;
            //     axios.get('/api/user').then((response) => {
            //         this.users = response.data;
            //     })
            // },
            // getUser() {
            //     axios.get('/api/user/access').then((response) => {
            //         this.user = response.data.id;
            //         var socket = io.connect('http://localhost:3000');
            //
            //         socket.on("new-action."+this.user+":App\\Events\\NewPrivateMessage", function (data) {
            //             console.log(data.message);
            //             this.dataMessage.push(data.message.user + ':' + data.message.message);
            //         }.bind(this));
            //     }).catch((response) => {
            //         alert("Ошибка");
            //     });
            // }

        }
    }
</script>

<style lang="sass" scoped>
    .messenger
        display: flex
        flex-flow: column
        background: #fff
        max-height: 100%
        height: 400px
        border: 1px solid #e0e0e0
        border-bottom: none
        border-radius: 4px 4px 0 0
        &__header
            border-bottom: 1px solid #e0e0e0
            padding: 10px 20px
            display: flex
            flex-direction: column
        &__content
            display: flex
            flex-flow: column
            padding: 10px
            overflow-y: auto
            overflow-x: hidden
        &__link
            color: #000
            &:hover
                text-decoration: none
                color: #3490dc
            &-client
                font-size: 16px
                font-weight: 500
            &-auto
                font-size: 14px
        .message
            border-radius: 10px
            text-align: left
            padding: 8px 12px
            margin-bottom: 8px
            &-from
                background-color: #f5f5f5
                margin-right: auto
                .time
                    right: -60px
            &-to
                background-color: #d6f1ff
                margin-left: auto
                .time
                    left: -60px
            &-text
                position: relative
            .time
                position: absolute
                color: #b8b8b8

</style>