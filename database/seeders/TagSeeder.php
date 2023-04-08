<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            "name" => "HTML",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "PHP",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "CSS",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "JavaScript",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "Laravel",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "MySQL",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "Git",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "AWS",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
        DB::table("tags")->insert([
            "name" => "Other",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime(),
        ]);
    }
}
