<template>
    <main class="container content">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="content-header">
            <h2>Категория</h2>
        </div>

        <form v-on:submit.prevent="updateCategory()" class="content-form">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label content-form__label">Наименование</label>
                <input type="text" class="form-control col-sm-4" id="inputName" v-bind:disabled="!is_active"
                       v-model="category.name">
                <a href="#" @click.prevent="editCategory()" class="content-form__edit"><i class="fa fa-pencil"></i></a>
            </div>

            <div v-if="is_active" class="form-group col-sm-6 content-form__button">
                <button type="submit" class="content-form__button-save">Сохранить</button>
                <button @click="update()" class="content-form__button-cancel">Отменить</button>
            </div>
        </form>
        <div class="form-group">
            <h2>Подкатегории</h2>
            <div class="form-group">
                <button v-if="!create" @click="create=true" class="btn btn-success">Добавить</button>

                <div v-if="create" class="form-group col-sm-6">
                    <input type="text" class="form-control" v-model="type.name">
                    <div class="d-flex">
                        <button @click="addType()" type="submit" class="content-form__button-save">Сохранить</button>
                        <button @click="update()" class="content-form__button-cancel">Отменить</button>
                    </div>
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
                <tr v-for="item, index in category.type">
                    <td>
                        <span v-if="edit !== item.id">
                            {{item.name}}
                        </span>
                        <div v-if="edit === item.id" class="table__row-edit">
                            <input type="text" class="form-control col-sm-4" v-model="item.name">
                            <a href="#" @click.prevent="saveType(item)">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a @click.prevent="editType(item.id)" href="#" class="fa fa-pencil"></a>
                            <button class="delete fa fa-remove" @click="deleteType(item.id, index)"></button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                category: {},
                type: {},
                is_active: false,
                edit: '',
                create: false
            }
        },
        name: "edit",
        mounted() {
            console.log('edit Component mounted.');
            this.update();
        },
        methods: {
            update() {
                axios.get(`/api/category/${this.$route.params.id}/edit/`)
                    .then((response) => {
                        this.is_active = false;
                        this.create = false;
                        this.type = {};
                        this.category = response.data;
                    })
                    .catch((response) => {
                        alert("Ошибка");
                    });
            },
            updateCategory() {
                axios.patch(`/api/category/${this.$route.params.id}`, this.category)
                    .then((response) => {
                        this.is_active = false;
                    })
                    .catch((response) => {
                        alert("Ошибка Изменения");
                    });
            },
            editCategory() {
                this.is_active = true;
            },
            addType() {
                this.type.category_id = this.category.id;
                axios.post('/api/type', this.type)
                    .then((response) => {
                        this.create = false;
                        this.update();
                    })
                    .catch((response) => {
                        console.log(response);
                        alert("Не удалось соxранить");
                    });
            },
            editType(id) {
                this.edit = id;
            },
            saveType(item) {
                axios.patch(`/api/type/${item.id}`, item)
                    .then((response) => {
                        this.edit = false;
                    })
                    .catch((response) => {
                        alert("Ошибка Изменения");
                    });
            },
            deleteType(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/type/' + id)
                        .then((response) => {
                            this.category.type.splice(index, 1);
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