<template>
    <main class="container content">
        <div class="content-header">
            <h2>Категории</h2>
        </div>
        <form v-on:submit="saveForm()" class="content-form">
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
        name: "create",
        data() {
            return {
                category:{}
            }
        },
        mounted() {
            console.log('create Component mounted.');

        },
        methods: {
            saveForm() {
                event.preventDefault();
                axios.post('/api/category', this.category)
                    .then((response) => {
                        console.log(response.data);
                        this.$router.push({path: '/category'});
                    })
                    .catch((response) => {
                        console.log(response);
                        alert("Не удалось созранить категорию");
                    });
            }
        }

    }
</script>

<style scoped>

</style>