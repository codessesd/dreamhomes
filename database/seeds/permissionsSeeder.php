<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class permissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('permissions')->truncate();
      $tables = ['areas','beneficiaries','documents','home_addresses','members','miscs','next_of_kin','post_addresses','subscriptions'];
      $ignoreColumns = ['id','member_id','created_at','updated_at','user_id','application_type'];
      foreach($tables as $table){
        $tableName = $table;
        $colNames = Schema::getColumnListing($tableName);
        foreach($colNames as $column){
          if (!(in_array($column, $ignoreColumns)))
          DB::table('permissions')->insert([
            ['type'=>'write','entity'=>$tableName,'attribute'=>$column],
            ['type'=>'read','entity'=>$tableName,'attribute'=>$column],
          ]);
        }
      }

    }
}
