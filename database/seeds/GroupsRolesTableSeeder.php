<?php

use Illuminate\Database\Seeder;

class GroupsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jpa_groups_roles')->insert(
            [
                'group_id' => '1',
                'role_id' => '1',
            ]
        );

        DB::table('jpa_groups_roles')->insert(
            [
                'group_id' => '2',
                'role_id' => '3',
            ]
        );

        DB::table('jpa_groups_roles')->insert(
            [
                'group_id' => '2',
                'role_id' => '4',
            ]
        );

        DB::table('jpa_groups_roles')->insert(
            [
                'group_id' => '2',
                'role_id' => '5',
            ]
        );
    }
}
