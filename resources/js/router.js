import Vue         from 'vue';
import VueRouter   from 'vue-router';
import Fornecedor  from './components/Fornecedor/fornecedor-index';
import Fabricante  from './components/Fabricante/fabricante-index';
import Funcionario from './components/Funcionario/funcionario-index';
import Mercadoria  from './components/Mercadoria/mercadoria-index';
import Unidade     from './components/Unidade/unidade-index';
import Categoria   from './components/Categoria/categoria-index';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/fornecedores',
            name: 'funcionarios',
            component: Funcionario
        },
        {
            path: '/',
            name: 'categorias',
            component: Categoria
        },
        {
            path: '/categorias',
            name: 'categorias',
            component: Categoria
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
        {
            path: '/fabricantes',
            name: 'fabricantes',
            component: Fabricante,
        },
        {
            path: '/funcionarios',
            name: 'funcionarios',
            component: Funcionario,
        },
        {
            path: '/unidades',
            name: 'unidades',
            component: Unidade,
        },
    ],
});

export default router;