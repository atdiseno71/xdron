<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Municipality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipalities')->delete();

        $route = database_path('/seeders/json/cities_config.json');
        $json = file_get_contents($route);
        $data = json_decode($json);

        foreach ($data as $obj) {
            $department = DB::table('departments')->where('name', $obj->department)->get()->first();

            foreach($obj->cities as $city) {
                Municipality::create(array(
                    'name' => $city,
                    'department_id' => $department->id
                ));
            }
        }
    }
}
