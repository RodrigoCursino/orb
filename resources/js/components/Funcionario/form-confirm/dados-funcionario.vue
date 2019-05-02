<template>
    <div>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Nome: ${funcionario.nome}`}}</h5>
            </v-flex>

            <v-flex
                    xs12
                    md6
                    lg6
            >
                <h5 class="font-weight-bold">{{`Estado Cívil : ${funcionario.estado_civil} /\ Sexo : ${funcionario.sexo} /\ Apelido : ${funcionario.apelido}`}}</h5>
            </v-flex>

        </v-layout>
        <v-layout>
            <v-flex
                    xs12
                    md6
                    lg6
            >
                <p class="font-weight-light">{{"Unidade  :  " + funcionario.unidade.nome +" -- Departamento  : " + funcionario.departamento.nome}}</p>
                <p class="font-weight-light">{{"Cargo :   " + funcionario.cargo.nome +"    /\  Salário:  R$ " + funcionario.salario}}</p>
            </v-flex>
            <v-flex
                    xs12
                    md4
                    lg4
            >
                <h5 class="font-weight-light">{{`RG : ${funcionario.rg} --- CPF : ${funcionario.cpf}`}}</h5>
            </v-flex>
        </v-layout>
        <v-divider inset></v-divider>
        <v-layout style="margin-top: 15px">
            <v-flex
                    xs12
                    md12
                    lg12
            >
                <v-textarea
                        box
                        disabled
                        label="Observação"
                        :value="funcionario.observacao"
                ></v-textarea>
            </v-flex>
        </v-layout>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "dados-funcionario",
        computed: {
            ...mapState('Funcionario',{
                funcionario: state => {
                    return state.funcionario;
                }
            })
        },
    }
</script>

<style scoped>

</style>