<template>
    <main class="container box">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="box-header">
            <h2>Бренды</h2>
        </div>
        <div class="box-body">
            <div class="form-group">
                <button v-if="!create" @click="create=true" class="btn btn-success">Добавить</button>
                <div v-if="create" class="form-group col-sm-6">
                    <input type="text" class="form-control" v-model="brand.name">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 col-form-label content-form__label">Популярный</label>
                        <input type="checkbox" class="content-form__checkbox" v-model="is_topBrand">
                    </div>
                    <template v-if="is_topBrand">
                        <div class="form-group row">
                            <label for="inputImage" class="col-sm-2 col-form-label content-form__label">Фото</label>
                            <input type="file" id="inputImage" @change="previewImages" name="image"
                                   accept="image/*">
                            <div class="form__photo add-photo col-sm-6">
                                <img :src="imagesData" width="100%">
                            </div>
                        </div>
                    </template>
                    <div class="d-flex">
                        <button @click="addBrand()" type="submit" class="content-form__button-save">Сохранить
                        </button>
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
                    <tr v-for="item, index in brands">
                        <td @click="testClick(item.id)">{{item.name}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="'/brand/' +item.id+ '/edit'" class="fa fa-pencil">
                                </router-link>
                                <button class="delete fa fa-remove" @click="deleteBrand(item.id, index)"></button>
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
                brands: [],
                brand: {},
                create: false,
                imagesData: '',
                pictures: '',
                is_topBrand: false,
            }
        },
        mounted() {
            console.log('Index Component mounted.');
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/api/brand').then((response) => {
                    this.create = false;
                    this.brand = {};
                    this.brands = response.data;
                })
            },
            addBrand() {
                let data = new FormData();
                data.append('icon', this.pictures);
                data.append('name', this.brand.name);
                axios.post('/api/brand', data)
                    .then((response) => {
                        this.create = false;
                        this.update();
                        this.imagesData = '';
                        this.pictures = '';
                        this.is_topBrand = false;
                    })
                    .catch((response) => {
                        console.log(response);
                        alert("Не удалось соxранить");
                    });
            },
            deleteBrand(id, index) {
                if (confirm("Вы уверены?")) {
                    axios.delete('/api/brand/' + id)
                        .then((response) => {
                            this.brands.splice(index, 1);
                        })
                        .catch((response) => {
                            alert("Ошибка удаления");
                        });
                }
            },
            previewImages: function (event) {
                this.pictures = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.imagesData = e.target.result;
                };
                reader.readAsDataURL(this.pictures);
                // }
            },
            testClick(id) {
                this.$router.push({path: '/brand/' + id + '/edit'});
            }
        }
    }
</script>

<style scoped>

</style>