export const routes = [
    {path: '/setting', component: require('./components/directory.vue').default},

    {path: '/category',component: require('./components/category/index.vue').default},
    {path: '/category/:id/edit', component: require('./components/category/edit.vue').default},

    {path: '/brand',component: require('./components/brand/index.vue').default},
    {path: '/brand/:id/edit', component: require('./components/brand/edit.vue').default},

    {path: '/client',component: require('./components/client/index.vue').default},
    {path: '/client/:id/edit', component: require('./components/client/edit.vue').default},

    {path: '/status',component: require('./components/status/index.vue').default},
    {path: '/city',component: require('./components/city/index.vue').default},

    {path: '/user',component: require('./components/user/index.vue').default},
    {path: '/user/create',component: require('./components/user/create.vue').default},
    {path: '/user/:id/edit', component: require('./components/user/edit.vue').default},


];