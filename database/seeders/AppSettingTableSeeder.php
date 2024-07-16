<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("app_setting")->insert([
            'value' => '{
                "saveLocal": "",
                "storeKey": "huisetting",
                "setting": {
                    "app_name": { "value" : "COCOO"},
                    "theme_font_size": {"value": "theme-fs-sm"},
                    "theme_scheme_direction": { "value": "ltr" },
                    "theme_scheme": { "value": "dark" },
                    "body_font_family": {"value" : null},
                    "heading_font_family": {"value" : null},
                    "page_layout": {"value" : "container-fluid"},
	                "theme_style_appearance": {"value": ["theme-sharp"]}
                }
            }'
        ]);
    }
}
