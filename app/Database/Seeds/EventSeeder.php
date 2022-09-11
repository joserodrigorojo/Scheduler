<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\EventModel;

class EventSeeder extends Seeder
{
    public function run(){
        $json = file_get_contents(APPPATH . 'Database/Seeds/json/data.json');
        $events = json_decode($json);

        foreach ($events as $value => $event) {
            $eventObj = new EventModel();
            $eventObj->insert($event);
        } 
    }
}
