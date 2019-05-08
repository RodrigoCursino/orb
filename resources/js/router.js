import Vue         from 'vue';
import VueRouter   from 'vue-router';
import Fornecedor  from './components/Fornecedor/fornecedor-index';
import Fabricante  from './components/Fabricante/fabricante-index';
import Funcionario from './components/Funcionario/funcionario-index';
import Mercadoria  from './components/Mercadoria/mercadoria-index';
import Unidade     from './components/Unidade/unidade-index';
import Categoria   from './components/Categoria/categoria-index';
import Colecao     from './components/Colecao/colecao-index';
import Linha       from './components/Linha/linha-index';
import Ncm         from './components/NCM/ncm-index';
import Grupo       from './components/Grupo/grupo-index';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: '',
            component: Unidade
        },
        {
            path: '/fornecedores',
            name: 'funcionarios',
            component: Funcionario
        },
        {
            path: '/categorias',
            name: 'categorias',
            component: Categoria
        },
        {
            path: '/colecoes',
            name: 'colecoes',
            component: Colecao
        },
        {
            path: '/fornecedores',
            name: 'fornecedores',
            component: Fornecedor
        },
        {
            path: '/grupos',
            name: 'grupos',
            component: Grupo
        },
        {
            path: '/linhas',
            name: 'linhas',
            component: Linha,
        },
        {
            path: '/mercadorias',
            name: 'mercadorias',
            component: Mercadoria,
        },
        {
            path: '/ncms',
            name: 'ncms',
            component: Ncm,
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