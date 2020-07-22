<template>
    <main class="container box">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="box-header">
            <h2>Статусы</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <button v-if="!create" @click="create=true" class="btn btn-success">Добавить</button>
                <div v-if="create" class="form-group col-sm-6">
                    <input type="text" class="form-control" v-model="status.name">
                    <div class="d-flex">
                        <button @click="addStatus()" type="submit" class="content-form__button-save">Сохранить</button>
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
                    <tr v-for="item, index in statuses">
                        <td>
                             <span v-if="edit !== item.id">
                                {{item.name}}
                            </span>
                            <div v-if="edit === item.id" class="table__row-edit">
                                <input type="text" class="form-control col-sm-4" v-model="item.name">
                                <a href="#" @click.prevent="saveStatus(item)">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a @click.prevent="editStatus(item.id)" href="#" class="fa fa-pencil"></a>
                                <button class="delete fa fa-remove" @click="deleteStatus(item.id, index)"></button>
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
                statuses: [],
                status: {},
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
                axios.get('/api/status').then((response) => {
                    this.create = false;
                    this.status = {};
                    this.statuses = response.data;
                })
            },
            addStatus() {
                axios.post('/api/status', this.status)
                    .then((response) => {
                        this.create = false;
                        this.update();
                    })
                    .catch((response) => {
                        console.log(response);
                        alert("Не удалось соxранить");
                    });
            },
            editStatus(id) {
                this.edit = id;
            },
            saveStatus(item) {
                axios.patch(`/api/status/${item.id}`, item)
                    .then((response) => {
                        this.edit = false;
                    })
                    .catch((response) => {
                        alert("Ошибка Изменения");
                    });
            },
            deleteStatus(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/status/' + id)
                        .then((response) => {
                            this.statuses.splice(index, 1);
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