<template>
    <main class="container box">
        <button @click="$router.go(-1)" class="btn btn-primary btn-sm"><< Назад</button>
        <div class="box-header">
            <h2>Чаты</h2>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>№</th>
                        <th>Авто</th>
                        <th>Клиент</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in rooms" @click="testClick(item.id)">
                        <td>{{item.id}}</td>
                        <td>{{item.auto}}</td>
                        <td>{{item.client}}</td>
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
                rooms: [],
                // category: {},
                // create: false
            }
        },
        mounted() {
            console.log('Index Component mounted.');
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/api/room').then((response) => {
                    this.rooms = response.data;
                })
            },

            testClick(id) {
                this.$router.push({path: '/room/' + id });
            }
        }
    }
</script>

<style scoped>

</style>