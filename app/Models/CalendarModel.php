<?php

namespace App\Models;

use CodeIgniter\Model;

class CalendarModel extends Model
{
    // Setup DB table
    protected $table = 'calendars';
    protected $allowedFields = ['text', 'color', 'active'];

    // Get all calendars
    public function getAllCalendars(){
        $calendars = $this->findAll();
        if (empty($calendars)) {
            return NULL;
        }
        else{
            return $calendars;
        }
    }

    // Get calendar by ID
    public function getCalendarbyID($id){
        $event = $this->where('id', $id)->first();
        if (empty($event)) {
            return NULL;
        }
        else{
            return $event;
        }
    }
}

