<template>
    <main class="container content">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="content-header">
            <h2>Бренд</h2>
        </div>

        <form v-on:submit.prevent="updateBrand()" class="content-form col-sm-6">
            <div class="form-group row">
                <label for="inputName" class="col-sm-4 col-form-label content-form__label">Наименование</label>
                <input type="text" class="form-control col-sm-6" id="inputName" v-bind:disabled="!is_active"
                       v-model="brand.name">
                <a href="#" @click.prevent="editBrand" class="content-form__edit"><i class="fa fa-pencil"></i></a>
            </div>

            <template v-if="is_active">
                <div class="form-group row">
                    <label for="inputImage" class="col-sm-2 col-form-label content-form__label">Фото</label>
                    <input type="file" id="inputImage" @change="previewImages" name="image"
                           accept="image/*">
                    <div class="form__photo add-photo col-sm-6">
                        <img :src="imagesData" width="100%">
                    </div>
                </div>
                <div class="form-group content-form__button">
                    <button type="submit" class="content-form__button-save">Сохранить</button>
                    <button @click="update()" class="content-form__button-cancel">Отменить</button>
                </div>
            </template>
        </form>
        <div class="form-group">
            <h2>Модели</h2>
            <div class="form-group">
                <button v-if="!create" @click="create=true" class="btn btn-success">Добавить</button>

                <div v-if="create" class="form-group col-sm-6">
                    <input type="text" class="form-control" v-model="model.name">
                    <div class="d-flex">
                        <button @click="addModel()" type="submit" class="content-form__button-save">Сохранить</button>
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
                <tr v-for="item, index in brand.modelcar">
                    <td>
                        <span v-if="edit !== item.id">
                            {{item.name}}
                        </span>
                        <div v-if="edit === item.id" class="table__row-edit">
                            <input type="text" class="form-control col-sm-4" v-model="item.name">
                            <a href="#" @click.prevent="saveModel(item)">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a @click.prevent="editModel(item.id)" href="#" class="fa fa-pencil"></a>
                            <button class="delete fa fa-remove" @click="deleteModel(item.id, index)"></button>
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
                brand: {},
                model: {},
                is_active: false,
                edit: '',
                create: false,
                imagesData: '',
                pictures: '',
            }
        },
        name: "edit",
        mounted() {
            console.log('edit Component mounted.');
            this.update();
        },
        methods: {
            update() {
                axios.get(`/api/brand/${this.$route.params.id}/edit/`)
                    .then((response) => {
                        this.is_active = false;
                        this.create = false;
                        this.model = {};
                        if (response.data.icon) {
                            this.is_topBrand = true;
                            this.imagesData = '/upload/brand/' + response.data.icon;
                        }
                        this.brand = response.data;
                    })
                    .catch((response) => {
                        alert("Ошибка");
                    });
            },
            updateBrand() {
                let data = new FormData();
                data.append('icon', this.pictures);
                data.append('name', this.brand.name);
                data.append('_method', 'PUT');
                axios.post(`/api/brand/${this.$route.params.id}`, data)
                    .then((response) => {
                        this.is_active = false;
                        this.pictures = '';
                    })
                    .catch((response) => {
                        alert("Ошибка Изменения");
                    });
            },
            editBrand() {
                this.is_active = true;
            },

            previewImages: function (event) {
                this.pictures = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.imagesData = e.target.result;
                };
                reader.readAsDataURL(this.pictures);
            },
            addModel() {
                this.model.brand_id = this.brand.id;
                axios.post('/api/model', this.model)
                    .then((response) => {
                        this.create = false;
                        this.update();
                    })
                    .catch((response) => {
                        console.log(response);
                        alert("Не удалось соxранить");
                    });
            },
            editModel(id) {
                this.edit = id;
            },
            saveModel(item) {
                axios.patch(`/api/model/${item.id}`, item)
                    .then((response) => {
                        this.edit = false;
                    })
                    .catch((response) => {
                        alert("Ошибка Изменения");
                    });
            },
            deleteModel(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/model/' + id)
                        .then((response) => {
                            this.brand.modelcar.splice(index, 1);
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