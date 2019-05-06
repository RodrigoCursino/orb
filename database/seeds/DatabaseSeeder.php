<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersTableSeeder::class);
      $this->call(NCMsTableSeeder::class);
      $this->call(UnidadesMedidaTableSeeder::class);
      $this->call(UnidadesCaixaTableSeeder::class);
      $this->call(RetencoesTableSeeder::class);
      $this->call(CargosTableSeeder::class);
      $this->call(CategoriasTableSeeder::class);
      $this->call(ContaContabeisTableSeeder::class);
      $this->call(ColecoesTableSeeder::class);
      $this->call(LinhasTableSeeder::class);
      $this->call(BancosTableSeeder::class);
      $this->call(DadosBancariosTableSeeder::class);
      $this->call(CentrosCustoTableSeeder::class);
      $this->call(EnderecosTableSeeder::class);
      $this->call(ContatosTableSeeder::class);
      $this->call(FornecedoresTableSeeder::class);
      $this->call(FabricantesTableSeeder::class);
      $this->call(MarcasTableSeeder::class);
      $this->call(GruposTableSeeder::class);
      $this->call(SubGruposTableSeeder::class);
      $this->call(MercadoriasTableSeeder::class);
      $this->call(TabelaPrecosTableSeeder::class);
      $this->call(PrecoVendaTableSeeder::class);
      $this->call(PrecoCustoTableSeeder::class);
      $this->call(UnidadesTableSeeder::class);
      $this->call(DepartamentosTableSeeder::class);
      $this->call(FuncionariosTableSeeder::class);
    }
}
