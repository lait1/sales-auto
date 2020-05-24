<template>
    <main class="container content">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="content-header">
            <h2>Заявка</h2>
        </div>
        <form v-on:submit.prevent="updateOrder()" class="content-form">
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label content-form__label">Автомобиль</label>
                <input disabled type="text" class="form-control col-sm-4" v-model="order.auto">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label content-form__label">Цена</label>
                <input disabled type="text" class="form-control col-sm-4" v-model="order.price">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label content-form__label">Клиент</label>
                <input disabled type="text" class="form-control col-sm-4" v-model="order.client">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label content-form__label">Телефон</label>
                <input disabled type="text" class="form-control col-sm-4" v-model="order.phone">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label content-form__label">Email</label>
                <input disabled type="text" class="form-control col-sm-4" v-model="order.email">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label content-form__label">Комментарий</label>
                <textarea rows="6" type="text" class="form-control col-sm-4" v-model="order.comment"></textarea>
            </div>
            <div class="form-group col-sm-6 content-form__button">
                <button type="submit" class="content-form__button-save">Сохранить</button>
                <button @click="$router.go(-1)" type="button" class="content-form__button-cancel">Отменить</button>
            </div>

        </form>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                order: {},
                // cities: {},
            }
        },
        name: "edit",
        mounted() {
            console.log('edit Component mounted.');
            this.update();
        },
        methods: {
            update() {
                axios.get(`/api/order/${this.$route.params.id}/edit/`).then((response) => {
                    this.order = response.data;
                });
            },
            updateOrder() {
                axios.patch(`/api/order/${this.$route.params.id}`, this.order)
                    .then((response) => {
                        this.$router.push({path: '/order'});
                    })
                    .catch((error) => {
                        console.log(error.response.data);
                        alert("Ошибка Изменения");
                    });
            }

        }
    }
</script>

<style scoped>

</style>