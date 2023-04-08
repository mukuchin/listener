<?php

namespace Database\Seeders;

use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create following tags
        // HTML, PHP, CSS, JavaScript, Laravel, MySQL, Git, AWS, Other
        DB::table("tags")->insert([
            "name" => "HTML"
        ]);
        DB::table("tags")->insert([
            "name" => "PHP"
        ]);
        DB::table("tags")->insert([
            "name" => "CSS"
        ]);
        DB::table("tags")->insert([
            "name" => "JavaScript"
        ]);
        DB::table("tags")->insert([
            "name" => "Laravel"
        ]);
        DB::table("tags")->insert([
            "name" => "MySQL"
        ]);
        DB::table("tags")->insert([
            "name" => "Git"
        ]);
        DB::table("tags")->insert([
            "name" => "AWS"
        ]);
        DB::table("tags")->insert([
            "name" => "Other"
        ]);
    }
}
