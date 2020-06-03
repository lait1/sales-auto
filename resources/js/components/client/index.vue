<template>
    <main class="container box">
        <div class="box-header">
            <h2>Клиенты</h2>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Телефон</th>
                        <th>Почта</th>
                        <th>Город</th>
                        <th>Блокировка</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in clients">
                        <td>{{item.id}}</td>
                        <td>{{item.fio}}</td>
                        <td>{{item.phone}}</td>
                        <td>{{item.email}}</td>
                        <td>{{item.city}}</td>
                        <td>
                            <a @click.prevent="toggleBlock(item)" href="#"
                               v-bind:class="[item.blocked ? 'fa-check-square' : 'fa-square-o', 'fa' ]"></a>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/client/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deleteClient(item.id, index)"></button>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <pagination :data="laravelData" :limit="3" @pagination-change-page="update"></pagination>

        </div>
    </main>
</template>

<script>
    export default {
        name: "index",
        data: function () {
            return {
                clients: {},
                laravelData: {},
            }
        },
        mounted() {
            console.log('Index Component mounted.');
            this.update()
        },
        methods: {
            // update: function () {
            //     axios.get('/api/client').then((response) => {
            //         response.data.forEach(item => {
            //             item.city = "loading...";
            //             axios.get('/api/city/' + item.city_id).then((response) => {
            //                 item.city = response.data.name;
            //             })
            //         });
            //         this.clients = response.data;
            //     })
            // },
            update(page = 1) {
                axios.get('/api/client?page=' + page).then((response) => {
                    this.clients = response.data.data;
                    this.laravelData = response.data;
                })
            },
            toggleBlock(item) {
                axios.get('/api/client/blocked/' + item.id)
                    .then((response) => {
                        item.blocked = response.data;
                    });
            },
            deleteClient(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/client/' + id)
                        .then((response) => {
                            this.clients.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Ошибка удаления");
                        });
                }
            },
        }
    }
</script>

<style scoped>

</style>