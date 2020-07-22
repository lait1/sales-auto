<template>
    <main class="container content">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="content-header">
            <h2>Клиент</h2>
        </div>
        <form v-on:submit.prevent="updateClient()" class="content-form">
            <div class="form-group row">
                <label for="inputFio" class="col-sm-2 col-form-label content-form__label">ФИО</label>
                <input id="inputFio" type="text" class="form-control col-sm-4" v-model="client.fio">
            </div>
            <div class="form-group row">
                <label for="inputPhone" class="col-sm-2 col-form-label content-form__label">Телефон</label>
                <input id="inputPhone" type="text" class="form-control col-sm-4" v-model="client.phone">
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label content-form__label">Email</label>
                <input id="inputEmail" type="text" class="form-control col-sm-4" v-model="client.email">
            </div>
            <div class="form-group row">
                <label for="inputCity" class="col-sm-2 col-form-label content-form__label">Город</label>
                <select id="inputCity" class="form-control col-sm-4" v-model="client.city_id" >
                    <template v-for="item in cities">
                        <option v-bind:value="item.id">{{item.name}}</option>
                    </template>
                </select>
            </div>
            <div class="form-group row align-items-center">
                <label for="inputBlock" class="col-sm-2 col-form-label content-form__label">Заблокирован</label>
                <input id="inputBlock" type="checkbox" class="content-form__checkbox" v-model="client.blocked">
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
                client: {},
                cities: {},
            }
        },
        name: "edit",
        mounted() {
            console.log('edit Component mounted.');
            this.update();
            this.getCity();
        },
        methods: {
            update() {
                axios.get(`/api/client/${this.$route.params.id}/edit/`).then((response) => {
                    this.client = response.data;
                });
            },
            getCity() {
                axios.get(`/api/city/`)
                    .then((response) => {
                        this.cities = response.data;
                    })
                    .catch((response) => {
                        alert("Ошибка");
                    });
            },
            updateClient() {
                axios.patch(`/api/client/${this.$route.params.id}`, this.client)
                    .then((response) => {
                        this.$router.push({path: '/client'});
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