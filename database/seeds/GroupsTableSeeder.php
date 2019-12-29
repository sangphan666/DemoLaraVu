<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jpa_groups')->insert(
            [
                'name' => 'Super admin',
                'description' => 'Super admin',
                'is_active' => 1,
            ]
        );

        DB::table('jpa_groups')->insert(
            [
                'name' => 'Phòng kỹ thuật',
                'description' => 'Phòng kỹ thuật',
                'is_active' => 1,
            ]
        );
    }
}
