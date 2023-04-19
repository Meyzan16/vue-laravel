import {createRouter, createWebHistory } from "vue-router";

import Home from './components/ExampleComponent.vue';


const routes = [
    {
        path:'/',
        name:'Employee',
        component: Home
    },

    
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;