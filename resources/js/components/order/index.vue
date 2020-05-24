<template>
    <main class="container box">
        <div class="box-header">
            <h2>Заказы</h2>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Автомобиль</th>
                        <th>Клиент</th>
                        <th>В работе</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in orders">
                        <td>{{item.id}}</td>
                        <td>{{item.auto}}</td>
                        <td>{{item.client}}</td>
                        <td>{{item.username}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/order/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deleteOrder(item.id, index)"></button>
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
                orders: {},
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
                axios.get('/api/order?page=' + page).then((response) => {
                    // console.log(response.data.data);
                    this.orders = response.data.data;
                    this.laravelData = response.data;
                })
            },
            deleteOrder(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/order/' + id)
                        .then((response) => {
                            this.orders.splice(index, 1);
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