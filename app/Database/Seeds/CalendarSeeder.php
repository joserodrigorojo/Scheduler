<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CalendarModel;

class CalendarSeeder extends Seeder
{
    public function run(){
        $json = file_get_contents(APPPATH . 'Database/Seeds/json/calendars.json');
        $calendars = json_decode($json);

        foreach ($calendars as $calendar) {
            $calendarObj = new CalendarModel();
            $calendarObj->insert([
                'id' => $calendar->id,
                'text' => $calendar->text,
                'color' => $calendar->color,
                'active' => $calendar->active,
            ]);
        }
    }
}
