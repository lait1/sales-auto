<template>
    <main class="container content">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="content-header">
            <h2>Изменить статью</h2>
        </div>
        <form v-on:submit.prevent="updatePost()" class="content-form">
            <div class="form-group row">
                <label for="inputPost" class="col-sm-2 col-form-label content-form__label">Заголовок</label>
                <input id="inputPost" type="text" class="form-control col-sm-4" v-model="post.title">
            </div>
            <div class="form-group row ">
                <label for="inputDesc" class="col-sm-2 col-form-label content-form__label">Содержание</label>
                <!--<textarea rows="6" class="form-control col-sm-5" id="inputDesc"-->
                <!--v-model="post.content"> lorem100</textarea>-->

                <ckeditor class="form-control col-sm-5" :editor="editor" v-model="post.content"
                          :config="editorConfig"></ckeditor>

            </div>
            <div class="form-group">
                <label for="inputImage" class="col-sm-2 col-form-label content-form__label">Фото</label>
                <input type="file" id="inputImage" @change="previewImages" name="image"
                       accept="image/*">
                <div class="form__photo add-photo col-sm-6">

                    <img :src="imagesData" width="100%">

                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="inputBlock" class="col-sm-2 col-form-label content-form__label">Черновик</label>
                <input id="inputBlock" type="checkbox" class="content-form__checkbox" v-model="post.draft">
            </div>
            <div class="form-group col-sm-6 content-form__button">
                <button type="submit" class="content-form__button-save">Сохранить</button>
                <button @click="$router.go(-1)" type="button" class="content-form__button-cancel">Отменить</button>
            </div>

        </form>
    </main>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import '@ckeditor/ckeditor5-build-classic/build/translations/ru';

    export default {
        name: "edit",
        data() {
            return {
                post: {
                    draft: true
                },
                editor: ClassicEditor,
                editorConfig: {
                    language: 'ru'
                },
                imagesData: '',
                pictures:'',

            }
        },
        mounted() {
            console.log('edit Component mounted.');
            this.update();
        },
        methods: {
            previewImages: function (event) {
                this.pictures = event.target.files[0];
                // for (var i = 0; i < pictures.length; i++) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.imagesData = e.target.result;
                    };
                    reader.readAsDataURL(this.pictures);
                // }
            },
            update(){
                axios.get(`/api/post/${this.$route.params.id}/edit/`)
                    .then((response) => {
                        this.post = response.data;
                        if (response.data.image) {
                            this.imagesData = '/upload/post/' + response.data.image;
                        }

                    })
            },
            updatePost() {
                let data = new FormData();
                data.append('image', this.pictures);
                data.append('content', this.post.content);
                data.append('title', this.post.title);
                data.append('draft', this.post.draft);
                data.append('_method', 'PUT');
                axios.post(`/api/post/${this.$route.params.id}`, data)
                    .then((response) => {
                        this.$router.push({path: '/post'});
                    })
                    .catch((response) => {
                        alert("Ошибка");
                    });
            },
        }
    }
</script>

<style scoped>

</style>