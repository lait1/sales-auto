<template>
    <main class="container box">
        <div class="box-header">
            <h2>Статьи</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <router-link :to="'/post/create'" class="btn btn-success">Добавить</router-link>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th>Черновик</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in posts">
                        <td>{{item.id}}</td>
                        <td>{{item.title}}</td>
                       <td>
                            <a @click.prevent="toggleDraft(item)" href="#"
                               v-bind:class="[item.draft ? 'fa-check-square' : 'fa-square-o', 'fa' ]"></a>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/post/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deletePost(item.id, index)"></button>
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
                posts: {},
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
            update() {
                axios.get('/api/post').then((response) => {
                    this.posts = response.data;
                })
            },
            deletePost(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/post/' + id)
                        .then((response) => {
                            this.posts.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Ошибка удаления");
                        });
                }
            },
            toggleDraft(item) {
                axios.get('/api/post/draft/' + item.id)
                    .then((response) => {
                        item.draft = response.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>