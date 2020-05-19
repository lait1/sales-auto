<template>
    <main class="container box">
        <div class="box-header">
            <h2>Объявления</h2>
        </div>
        <div class="box-body">
            <div class="form-group">

                <router-link to="/category/create" class="btn btn-success">Добавить</router-link>

            </div>
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in content">
                        <td>{{item.id}}</td>
                        <td>{{item.name}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/category/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deleteEntry(item.id, index)"></button>
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
                content: [],
            }
        },
        mounted() {
            console.log('Index Component mounted.');
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/api/category').then((response) => {
                    console.log(response.data);
                    this.content = response.data;
                })
            },
            deleteEntry(id, index) {
                if (confirm("Вы уверены?"+index)) {
                    axios.delete('/api/category/'+id)
                        .then((response) =>{
                            this.content.splice(index, 1);
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