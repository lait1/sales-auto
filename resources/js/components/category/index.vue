<template>
    <main class="container box">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="box-header">
            <h2>Категории</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <button v-if="!create" @click="create=true" class="btn btn-success">Добавить</button>
               <div v-if="create" class="form-group col-sm-6">
                    <input type="text" class="form-control" v-model="category.name">
                    <div class="d-flex">
                        <button @click="addCategory()" type="submit" class="content-form__button-save">Сохранить</button>
                        <button @click="update()" class="content-form__button-cancel">Отменить</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in categories" >
                        <td @click="testClick(item.id)">{{item.name}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/category/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deleteCategory(item.id, index)"></button>
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
                categories: [],
                category:{},
                create: false
            }
        },
        mounted() {
            console.log('Index Component mounted.');
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/api/category').then((response) => {
                    this.create = false;
                    this.categories = response.data;
                })
            },
            addCategory() {
                axios.post('/api/category', this.category)
                    .then((response) => {
                        this.create=false;
                        this.category = {};
                        this.update();
                    })
                    .catch((response) => {
                        console.log(response);
                        alert("Не удалось соxранить");
                    });
            },
            deleteCategory(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/category/'+id)
                        .then((response) =>{
                            this.categories.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Ошибка удаления");
                        });
                }
            },
            testClick(id){
                this.$router.push({path: '/category/'+id+'/edit'});
            }
        }
    }
</script>

<style scoped>

</style>