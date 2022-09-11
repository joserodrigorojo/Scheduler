<?php
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    // Setup DB table
    protected $table = 'events';
    protected $allowedFields = ['start_date', 'end_date', 'text', 'description', 'color', 'calendar', 'all_day', 'recurring'];

    // Get all events
    public function getAllEvents(){
        $events = $this->findAll();
        if (empty($events)) {
            return NULL;
        }
        else{
            return $events;
        }
    }

    // Get events by date range
    public function getEventsDateRange($start, $end){
        if (strtotime($start) && strtotime($end)) {
            $events = $this->where('start_date >=', $start)->where('end_date <=', $end)->findAll();
            if (empty($events)) {
                return ["error" => "Event not found."];
            }
            else{
                return $events;
            }
        }
        else{
            return NULL;
        }
    }

    // Get event by ID
    public function getEventbyID($id){
        $event = $this->find($id);
        if (empty($event)) {
            return NULL;
        }
        else{
            return $event;
        }
    }
}
