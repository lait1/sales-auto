<template>
    <main class="container content">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="content-header">
            <h2>Добавить Пользователя</h2>
        </div>
        <form v-on:submit.prevent="updateUser()" class="content-form">
            <div class="form-group row">
                <label for="inputFio" class="col-sm-2 col-form-label content-form__label">ФИО</label>
                <input id="inputFio" type="text" class="form-control col-sm-4" v-model="user.name">
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label content-form__label">Логин</label>
                <input id="inputName" type="text" class="form-control col-sm-4" v-model="user.login">
            </div>

            <div class="form-group row">
                <label for="inputRole" class="col-sm-2 col-form-label content-form__label">Роль</label>
                <select id="inputRole" class="form-control col-sm-4" v-model="user.role_id" >
                    <template v-for="item in roles">
                        <option v-bind:value="item.id">{{item.name}}</option>
                    </template>
                </select>
            </div>
            <div class="form-group row align-items-center">
                <label for="inputBlock" class="col-sm-2 col-form-label content-form__label">Заблокирован</label>
                <input id="inputBlock" type="checkbox" class="content-form__checkbox" v-model="user.blocked">
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
        name: "create",
        data() {
            return {
                user: {},
                roles: {},
            }
        },
        mounted() {
            console.log('edit Component mounted.');
            this.getRole();
            this.update();
        },
        methods: {
            update() {
                axios.get(`/api/user/${this.$route.params.id}/edit/`).then((response) => {
                    this.user = response.data;
                });
            },
            updateUser(){
                axios.patch(`/api/user/${this.$route.params.id}`, this.user)
                    .then((response) => {
                        this.$router.push({path: '/user'});
                    })
                    .catch((response) => {
                        alert("Ошибка");
                    });
            },
            getRole() {
                axios.get(`/api/role/`)
                    .then((response) => {
                        this.roles = response.data;
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