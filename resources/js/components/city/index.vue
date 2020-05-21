<template>
    <main class="container box">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="box-header">
            <h2>Города</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <button v-if="!create" @click="create=true" class="btn btn-success">Добавить</button>
                <div v-if="create" class="form-group col-sm-6">
                    <input type="text" class="form-control" v-model="city.name">
                    <div class="d-flex">
                        <button @click="addCity()" type="submit" class="content-form__button-save">Сохранить</button>
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
                    <tr v-for="item, index in cities">
                        <td>
                             <span v-if="edit !== item.id">
                                {{item.name}}
                            </span>
                            <div v-if="edit === item.id" class="table__row-edit">
                                <input type="text" class="form-control col-sm-4" v-model="item.name">
                                <a href="#" @click.prevent="saveCity(item)">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a @click.prevent="editCity(item.id)" href="#" class="fa fa-pencil"></a>
                                <button class="delete fa fa-remove" @click="deleteCity(item.id, index)"></button>
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
                cities: [],
                city: {},
                create: false,
                edit: '',
            }
        },
        mounted() {
            console.log('Index Component mounted.');
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/api/city').then((response) => {
                    this.create = false;
                    this.city = {};
                    this.cities = response.data;
                })
            },
            addCity() {
                axios.post('/api/city', this.city)
                    .then((response) => {
                        this.create = false;
                        this.update();
                    })
                    .catch((response) => {
                        console.log(response);
                        alert("Не удалось соxранить");
                    });
            },
            editCity(id) {
                this.edit = id;
            },
            saveCity(item) {
                axios.patch(`/api/city/${item.id}`, item)
                    .then((response) => {
                        this.edit = false;
                    })
                    .catch((response) => {
                        alert("Ошибка Изменения");
                    });
            },
            deleteCity(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/city/' + id)
                        .then((response) => {
                            this.cities.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Ошибка удаления");
                        });
                }
            },
            testClick(id) {
                this.$router.push({path: '/city/' + id + '/edit'});
            }
        }
    }
</script>

<style scoped>

</style>