<template>
    <main class="container box">
        <div class="box-header">
            <h2>Справочник</h2>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>Название</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td @click="openRow('category')">Категории объявлений</td>
                    </tr>
                    <tr>
                        <td @click="openRow('brand')">Бренды</td>
                    </tr>
                    <tr>
                        <td @click="openRow('status')">Статусы объявлений</td>
                    </tr>
                    <tr>
                        <td @click="openRow('city')">Города</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        name: "directory",
        methods: {
            openRow(link){
                this.$router.push({path: '/'+link});
            }
        }

    }
</script>

<style scoped>

</style>