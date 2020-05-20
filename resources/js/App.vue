<template>
    <div class="wrapper">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <a href="#"><img src="/img/logo.png" alt=""></a>
            </div>
            <div class="sidebar-user">
                <div class="sidebar-user__name">Еремеев Александр Вадимович</div>
                <a href="#" class="sidebar-user__out"><i class="fa fa-cog"></i>Выйти</a>
            </div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu__item">
                    <router-link to="/auto" class="sidebar-menu__item-link"><i class="fa fa-table"></i> <span>Объявления</span>
                    </router-link>
                    </li>
                <li class="sidebar-menu__item">
                    <router-link to="/setting" class="sidebar-menu__item-link"><i class="fa fa-car"></i> <span>Справочники</span></router-link>
                </li>
                <li class="sidebar-menu__item">
                    <router-link to="/order" class="sidebar-menu__item-link"><i class="fa fa-shopping-cart"></i>
                        <span>Заказы</span></router-link></li>
                <li class="sidebar-menu__item">
                    <router-link to="/client" class="sidebar-menu__item-link"><i class="fa fa-address-card"></i>
                        <span>Клиенты</span></router-link></li>
                <li class="sidebar-menu__item">
                    <router-link to="/user" class="sidebar-menu__item-link"><i class="fa fa-users"></i> <span>Администраторы</span></router-link>
                </li>
                <!--<li class="sidebar-menu__item">-->
                    <!--<router-link to="/setting" class="sidebar-menu__item-link"><i class="fa fa-cog"></i> <span>Настройки</span></router-link>-->
                <!--</li>-->
            </ul>
        </aside>
        <router-view></router-view>
    </div>

</template>

<script>
    export default {
        // name: "App"
    }
</script>

<style scoped>

</style>