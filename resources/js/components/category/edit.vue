<template>
    <main class="container content">
        <div class="content-header">
            <h2>Категории</h2>
        </div>
        <form v-on:submit="update()" class="content-form">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label content-form__label">Наименование</label>
                <input type="text" class="form-control col-sm-4" id="inputName" placeholder="" v-model="category.name">
            </div>

            <div class="form-group col-sm-6 content-form__button">
                <button type="submit" class="content-form__button-save">Сохранить</button>
                <router-link to="/category" class="content-form__button-cancel">Отменить</router-link>
            </div>
        </form>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                category:{}
            }
        },
        name: "edit",
        mounted() {
            console.log('edit Component mounted.');
            axios.get(`/api/category/${this.$route.params.id}/edit/`)
                .then((response) => {
                    this.category = response.data;
                })
                .catch((response) => {
                    alert("Ошибка");
                });
        },
        methods: {
            update() {
                event.preventDefault();
                axios.patch(`/api/category/${this.$route.params.id}`, this.category)
                    .then((response) => {
                        this.$router.push({path: '/category'});
                    });
            }
        }
    }
</script>

<style scoped>

</style>