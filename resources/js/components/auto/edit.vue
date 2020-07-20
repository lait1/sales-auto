<template>
    <main class="container content">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="content-header">
            <h2>Изменить объявление</h2>
        </div>
        <form v-on:submit.prevent="updateAuto()" class="content-form">
            <div class="form-group row">
                <label for="inputCategory" class="col-sm-2 col-form-label content-form__label">Категория</label>
                <!--<select id="inputCategory" class="form-control col-sm-4" v-model="category">-->
                <!--<option disabled value="">Выберите категорию</option>-->
                <!--<template v-for="item in categories">-->
                <!--<option v-bind:value="item.id">{{item.name}}</option>-->
                <!--</template>-->
                <!--</select>-->
                <Select2 id="inputCategory"
                         class="col-sm-4 p-0"
                         v-model="category"
                         :options="categories"
                         :settings="{theme: 'bootstrap4'}"/>
            </div>
            <template v-if="category !==''">
                <!--Если категория равна 1 (категория легковых автомобилей)-->
                <template v-if="category === 1">
                    <div class="form-group row">
                        <label for="inputMarka" class="col-sm-2 col-form-label content-form__label">Марка</label>
                        <!--<select id="inputMarka" class="form-control col-sm-4" v-model="brand">-->
                        <!--<option disabled value="">Выберите марку</option>-->
                        <!--<template v-for="item in brands">-->
                        <!--<option v-bind:value="item.id">{{item.name}}</option>-->
                        <!--</template>-->
                        <!--</select>-->
                        <Select2 id="inputMarka"
                                 class="col-sm-4 p-0"
                                 v-model="brand"
                                 :options="brands"
                                 :settings="{theme: 'bootstrap4'}"/>
                    </div>
                    <div class="form-group row">
                        <label for="inputModel" class="col-sm-2 col-form-label content-form__label">Модель</label>
                        <!--<select id="inputModel" class="form-control col-sm-4" v-model="auto.modelcar_id">-->
                        <!--<option disabled value="">Выберите модель</option>-->
                        <!--<template v-for="item in model">-->
                        <!--<option v-bind:value="item.id">{{item.name}}</option>-->
                        <!--</template>-->
                        <!--</select>-->
                        <Select2 id="inputModel"
                                 class="col-sm-4 p-0"
                                 v-model="auto.model_car_id"
                                 :options="model"
                                 :settings="{theme: 'bootstrap4'}"/>
                    </div>
                    <div class="form-group row">
                        <label for="inputYear" class="col-sm-2 col-form-label content-form__label">Год</label>
                        <input type="number" class="form-control col-sm-4" id="inputYear" placeholder="Введите год"
                               v-model="auto.year">
                    </div>
                    <div class="form-group row">
                        <label for="inputRun" class="col-sm-2 col-form-label content-form__label">Пробег</label>
                        <input type="number" class="form-control col-sm-4" id="inputRun" placeholder="Введите пробег"
                               v-model="auto.mileage">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label content-form__label">Коробка передач</div>
                        <div class="col-sm-4 content-form__radio">
                            <div class="content-form__radio-btn">
                                <input type="radio" id="inputTransmission-1" value="Механическая"
                                       v-model="auto.transmission">
                                <label for="inputTransmission-1">Механическая</label>
                            </div>
                            <div class="content-form__radio-btn">
                                <input type="radio" id="inputTransmission-2" value="Автомат"
                                       v-model="auto.transmission">
                                <label for="inputTransmission-2">Автомат</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label content-form__label">Топливо</div>
                        <div class="col-sm-4 content-form__radio">
                            <div class="content-form__radio-btn">
                                <input type="radio" id="inputFuel-1" value="Бензин" v-model="auto.fuel">
                                <label for="inputFuel-1">Бензин</label>
                            </div>
                            <div class="content-form__radio-btn">
                                <input type="radio" id="inputFuel-2" value="Дизель" v-model="auto.fuel">
                                <label for="inputFuel-2">Дизель</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label content-form__label">Привод</div>
                        <div class="col-sm-6 content-form__radio">
                            <div class="content-form__radio-btn">
                                <input type="radio" id="inputDrive-1" value="Передний" v-model="auto.drive">
                                <label for="inputDrive-1">Передний</label>
                            </div>
                            <div class="content-form__radio-btn">
                                <input type="radio" id="inputDrive-2" value="Задний" v-model="auto.drive">
                                <label for="inputDrive-2">Задний</label>
                            </div>
                            <div class="content-form__radio-btn">
                                <input type="radio" id="inputDrive-3" value="Полный" v-model="auto.drive">
                                <label for="inputDrive-3">Полный</label>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-if="category !== 1">
                    <div class="form-group row">
                        <label for="inputType" class="col-sm-2 col-form-label content-form__label">Подкатегория</label>
                        <!--<select id="inputType" class="form-control col-sm-4"-->
                        <!--v-model="auto.type_id">-->
                        <!--<option disabled value="">Выберите тип</option>-->
                        <!--<template v-for="item in type">-->
                        <!--<option v-bind:value="item.id">{{item.name}}</option>-->
                        <!--</template>-->
                        <!--</select>-->
                        <Select2 id="inputType"
                                 class="col-sm-4 p-0"
                                 v-model="auto.type_id"
                                 :options="type"
                                 :settings="{theme: 'bootstrap4'}"/>
                    </div>
                </template>
                <template v-show="auto.type_id > 0">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label content-form__label">Наименование</label>
                        <input type="text" class="form-control col-sm-4" id="inputName" placeholder="Введите название"
                               v-model="auto.name">
                    </div>
                    <div class="form-group row">
                        <label for="inputStatus" class="col-sm-2 col-form-label content-form__label">Статус</label>
                        <!--<select id="inputStatus" class="form-control col-sm-4" v-model="auto.status_id">-->
                        <!--<option disabled value="">Выберите статус</option>-->
                        <!--<template v-for="item in status">-->
                        <!--<option v-bind:value="item.id">{{item.name}}</option>-->
                        <!--</template>-->
                        <!--</select>-->
                        <Select2 id="inputStatus"
                                 class="col-sm-4 p-0"
                                 v-model="auto.status_id"
                                 :options="status"
                                 :settings="{theme: 'bootstrap4'}"/>
                    </div>
                    <div class="form-group row">
                        <label for="inputCity" class="col-sm-2 col-form-label content-form__label">Город</label>
                        <!--<select id="inputCity" class="form-control col-sm-4" v-model="auto.city_id">-->
                        <!--<option disabled value="">Выберите Город</option>-->
                        <!--<template v-for="item in cities">-->
                        <!--<option v-bind:value="item.id">{{item.name}}</option>-->
                        <!--</template>-->
                        <!--</select>-->

                        <Select2 id="inputCity"
                                 class="col-sm-4 p-0"
                                 v-model="auto.city_id"
                                 :options="cities"
                                 :settings="{theme: 'bootstrap4'}"/>

                    </div>
                    <div class="form-group row">
                        <label for="inputPrice" class="col-sm-2 col-form-label content-form__label">Цена</label>
                        <input type="number" class="form-control col-sm-4" id="inputPrice" placeholder="Введите цену"
                               v-model="auto.price">
                    </div>
                    <div class="form-group row ">
                        <label for="inputDesc" class="col-sm-2 col-form-label content-form__label">Описание</label>
                        <textarea rows="6" class="form-control col-sm-5" id="inputDesc"
                                  v-model="auto.description"> lorem100</textarea>
                    </div>


                    <!--<div class="form-group row">-->
                    <!--<label for="inputImage" class="col-sm-2 col-form-label content-form__label">Фото</label>-->
                    <!--<input type="file" id="inputImage" multiple @change="previewImages" name="newfiles[]" accept="image/*">-->
                    <!--</div>-->

                    <div class="form-group">
                        <label for="inputImage" class="col-sm-2 col-form-label content-form__label">Фото</label>
                        <input type="file" id="inputImage" multiple @change="previewImages" name="newfiles[]"
                               accept="image/*">
                        <draggable
                                :list="imagesData"
                                class="form__photo add-photo test"
                        >
                            <!--<div class="form__photo add-photo">-->
                            <div class="form__photo-thumbnail" v-for="(image, index) in imagesData">
                                <img :src="/upload/ + image.name">
                                <button @click.prevent="removePhoto(image.id, index)" type="button"
                                        v-bind:data-id="image.id"
                                        class="delete fa fa-remove"></button>
                            </div>
                            <!--<div class="form__photo-thumbnail">-->
                            <!--<img src="/upload/thumbnail/car-example.jpg">-->
                            <!--<button type="button" data-photo="photo-id"-->
                            <!--class="delete fa fa-remove"></button>-->
                            <!--</div>-->
                        </draggable>

                        <!--</div>-->
                    </div>


                    <div class="form-group row align-items-center">
                        <label for="inputDraft" class="col-sm-2 col-form-label content-form__label">Черновик</label>
                        <input id="inputDraft" type="checkbox" class="content-form__checkbox" v-model="auto.draft">
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="inputSEO" class="col-sm-2 col-form-label content-form__label">SEO</label>
                        <input id="inputSEO" type="checkbox" class="content-form__checkbox" v-model="is_Seo">
                    </div>
                    <!--SEO BLOCK-->
                    <template v-if="is_Seo">
                        <div class="form-group row">
                            <label for="inputKeyword" class="col-sm-2 col-form-label content-form__label">Ключевые
                                слова</label>
                            <input type="text" class="form-control col-sm-4" id="inputKeyword"
                                   placeholder="Введите ключевые слова"
                                   v-model="auto.keywords">
                        </div>
                        <div class="form-group row">
                            <label for="inputDescSeo" class="col-sm-2 col-form-label content-form__label">Описание
                                Description</label>
                            <input type="text" class="form-control col-sm-4" id="inputDescSeo"
                                   placeholder="Введите description"
                                   v-model="auto.seo_desc">
                        </div>
                        <div class="form-group row">
                            <label for="inputDescSeo" class="col-sm-2 col-form-label content-form__label">Описание
                                Title</label>
                            <input type="text" class="form-control col-sm-4" id="inputTitle" placeholder="Введите title"
                                   v-model="auto.title">
                        </div>
                    </template>
                    <!--END SEO BLOCK-->
                    <div class="form-group col-sm-6 content-form__button">
                        <button type="submit" class="content-form__button-save">Сохранить</button>
                        <button @click="$router.go(-1)" type="button" class="content-form__button-cancel">Отменить
                        </button>
                    </div>
                </template>
            </template>
        </form>
    </main>
</template>
`
<script> import draggable from 'vuedraggable';

export default {
    name: "edit",
    components: {
        draggable,
    },
    data() {
        return {
            auto: {
                draft: 1
            },

            categories: {},
            category: '',
            type: {},

            model: {},
            brands: {},
            brand: '',

            cities: {},
            status: {},
            is_Seo: false,
            is_created: false,
            imagesData: []
        }
    },
    mounted() {
        console.log('create Component mounted.');
        this.getFirstData();
    },
    watch: {
        category(val) {
            if (val === 1) {
                this.auto.type_id = 1;
            } else {
                this.getType(val);
            }
        },
        brand(val) {
            this.getModel(val)
        },
    },
    methods: {
        previewImages(event) {
            // this.imagesData = [];

            let data = new FormData();
            let pictures = event.target.files;
            $.each(pictures, function (key, value) {
                data.append(key, value);
            });
            this.createPhoto(data);
            // pictures.forEach(function (key, value) {
            //     data.append(key, value);
            // });
            // for (let i = 0; i < pictures.length; i++) {
            //     data.append(i, pictures[i]);

            // let reader = new FileReader();
            // reader.onload = (e) => {
            //     this.imagesData.push(e.target.result);
            // };
            // reader.readAsDataURL(pictures[i]);
            // frontImage.empty();
            // if (!checkType(files[i])) {
            //     this.value = '';
            //     continue;
            // }
            // preview(files[i])
            // }

        },
        createPhoto(file) {
            axios.post(`/api/auto/photo/${this.auto.id}/create`, file)
                .then((response) => {
                    response.data.forEach(item => {
                        this.imagesData.push(item);
                    });
                })
                .catch((response) => {
                    alert("Ошибка");
                });
        },
        removePhoto(id, index) {
            axios.delete(`/api/auto/photo/${id}`)
                .then((response) => {
                    console.log('delete photo');
                    this.imagesData.splice(index, 1);
                })
                .catch((response) => {
                    alert("Ошибка");
                });
        },
        updateAuto() {
            axios.patch(`/api/auto/${this.auto.id}`, this.auto)
                .then((response) => {
                    this.$router.push({path: '/auto'});
                })
                .catch((response) => {
                    alert("Ошибка");
                });

        },
        getFirstData() {
            this.getCategory();
            this.getCity();
            this.getStatus();
            this.getBrand();
            this.getAuto();
        },
        getAuto() {
            axios.get(`/api/auto/${this.$route.params.id}/edit/`)
                .then((response) => {
                    this.auto = response.data;
                    this.category = response.data.category_id;
                    this.imagesData = response.data.image;
                    if (!!response.data.brand_id) {
                        this.brand = response.data.brand_id;
                    }
                })
        },
        getCity() {
            axios.get(`/api/city/`)
                .then((response) => {
                    response.data.map(function (obj) {
                        obj.text = obj.text || obj.name;
                    });
                    this.cities = response.data;
                })
        },
        getStatus() {
            axios.get(`/api/status/`)
                .then((response) => {
                    response.data.map(function (obj) {
                        obj.text = obj.text || obj.name;
                    });
                    this.status = response.data;
                })
        },
        getCategory() {
            axios.get(`/api/category/`)
                .then((response) => {
                    response.data.map(function (obj) {
                        obj.text = obj.text || obj.name;
                    });
                    this.categories = response.data;
                })
        },
        getType(category) {
            axios.get(`/api/category/${category}`)
                .then((response) => {
                    response.data.map(function (obj) {
                        obj.text = obj.text || obj.name;
                    });
                    this.type = response.data;
                });
        },
        getBrand() {
            axios.get(`/api/brand`)
                .then((response) => {
                    response.data.map(function (obj) {
                        obj.text = obj.text || obj.name;
                    });
                    this.brands = response.data;
                });
        },
        getModel(brand) {
            axios.get(`/api/brand/${brand}`)
                .then((response) => {
                    response.data.map(function (obj) {
                        obj.text = obj.text || obj.name;
                    });
                    this.model = response.data;
                });
        }
    }
}
</script>

<style lang="sass" scoped>
    .form__photo
        display: flex
        flex-direction: row
        flex-wrap: wrap
        &-thumbnail
            margin: 5px
            position: relative
            &:hover img
                filter: brightness(40%)
            &:hover button
                display: block
            img
                max-height: 130px
                max-width: 170px
                width: 100%
                height: 100%
                transition: .3s ease-in-out
            button
                position: absolute
                right: 5px
                top: 5px
                color: #fff
                background: transparent
                border: none
                font-size: 20px
                display: none

        .select2
            width: 100%

</style>