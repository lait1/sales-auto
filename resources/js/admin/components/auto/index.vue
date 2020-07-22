<template>
    <main class="container box">
        <div class="box-header">
            <h2>Объявления</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <router-link :to="'/auto/create'" class="btn btn-success">Добавить</router-link>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Категория</th>
                        <th>Город</th>
                        <th>Цена</th>
                        <th>Черновик</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in autos">
                        <td>{{item.id}}</td>
                        <td>{{item.name}}</td>
                        <td>{{item.category}}</td>
                        <td>{{item.city}}</td>
                        <td>{{item.price}}</td>
                       <td>
                            <a @click.prevent="toggleDraft(item)" href="#"
                               v-bind:class="[item.draft ? 'fa-check-square' : 'fa-square-o', 'fa' ]"></a>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/auto/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deleteAuto(item.id, index)"></button>
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
                autos: {},
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
                axios.get('/api/auto?page=' + page).then((response) => {
                    this.autos = response.data.data;
                    this.laravelData = response.data;
                })
            },
            deleteAuto(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/auto/' + id)
                        .then((response) => {
                            this.autos.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Ошибка удаления");
                        });
                }
            },
            toggleDraft(item) {
                axios.get('/api/auto/draft/' + item.id)
                    .then((response) => {
                        item.draft = response.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>