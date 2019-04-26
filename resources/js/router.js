import Vue        from 'vue';
import VueRouter  from 'vue-router';
import Fornecedor from './components/Fornecedor/fornecedor-index';
import Mercadoria from './components/Mercadoria/mercadoria-index';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'fornecedores',
            component: Fornecedor
        },
        {
            path: '/fornecedores',
            name: 'fornecedores',
            component: Fornecedor
        },
        {
            path: '/mercadorias',
            name: 'mercadorias',
            component: Mercadoria,
        },
    ],
});

export default router;