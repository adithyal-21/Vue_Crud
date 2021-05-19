import register from './components/register.vue';
import Home from './components/Home.vue';
import Login from './components/Login.vue';
import Display from './components/Display.vue';
import Edit from './components/Edit.vue';
import List from './components/List.vue';



export const routes = [
    {
        name: 'add',
        path: '/add',
        component: register
    },
    {
        name: 'home',
        path: '/',
        component:Home
        
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        props:true
    },
    {
        name: 'display',
        path: '/dis',
        component: Display
    },
    {
        name: 'edit',
        path: '/dis/:id',
        component: Edit
    },
    {
        name: 'try',
        path: '/list',
        component: List
    }
   
];