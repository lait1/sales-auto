<template>
    <main class="container box">
        <div class="box-header">
            <h2>Администраторы</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <router-link :to="'/user/create'" class="btn btn-success">Добавить</router-link>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Роль</th>
                        <th>Логин</th>
                        <th>Имя</th>
                        <th>Блокировка</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in users">
                        <td>{{item.id}}</td>
                        <td>{{item.role.name}}</td>
                        <td>{{item.login}}</td>
                        <td>{{item.name}}</td>
                        <td>
                            <a @click.prevent="toggleBlock(item)" href="#"
                               v-bind:class="[item.blocked ? 'fa-check-square' : 'fa-square-o', 'fa' ]"></a>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/user/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deleteUser(item.id, index)"></button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        name: "index",
        data: function () {
            return {
                users: {},
            }
        },
        mounted() {
            console.log('Index Component mounted.');
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/api/user').then((response) => {
                    this.users = response.data;
                })
            },
            toggleBlock(item) {
                axios.get('/api/user/blocked/' + item.id)
                    .then((response) => {
                        item.blocked = response.data;
                    });
            },
            deleteUser(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/user/' + id)
                        .then((response) => {
                            this.users.splice(index, 1);
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