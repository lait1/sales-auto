export const routes = [
    {path: '/category',component: require('./components/category/index.vue').default},
    {path: '/category/create',component: require('./components/category/create.vue').default},
    {path: '/category/:id/edit', component: require('./components/category/edit.vue').default},


];