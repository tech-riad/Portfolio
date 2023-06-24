<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::updateOrCreate([
            'section_header'      => 'Services',
            'section_message'     => 'Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.',

        ]);
        Section::updateOrCreate([
            'section_header'      => 'Portfolio',
            'section_message'     => 'Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.',

        ]);
        Section::updateOrCreate([
            'section_header'      => 'Contact',
            'section_message'     => 'Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.',

        ]);
    }
}
