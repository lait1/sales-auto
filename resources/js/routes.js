export const routes = [
    {path: '/setting', component: require('./components/directory.vue').default},

    {path: '/category',component: require('./components/category/index.vue').default},
    // {path: '/category/create',component: require('./components/category/create.vue').default},
    {path: '/category/:id/edit', component: require('./components/category/edit.vue').default},

    {path: '/brand',component: require('./components/brand/index.vue').default},
    // {path: '/brand/create',component: require('./components/brand/create.vue').default},
    {path: '/brand/:id/edit', component: require('./components/brand/edit.vue').default},

    {path: '/status',component: require('./components/status/index.vue').default},
    {path: '/status/create',component: require('./components/status/create.vue').default},
    {path: '/status/:id/edit', component: require('./components/status/edit.vue').default},

    {path: '/city',component: require('./components/city/index.vue').default},
    {path: '/city/create',component: require('./components/city/create.vue').default},
    {path: '/city/:id/edit', component: require('./components/city/edit.vue').default},


];