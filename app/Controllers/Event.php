<?php
namespace App\Controllers;

use App\Models\EventModel;

class Event extends BaseController
{
    public function index(){
        $model = new EventModel();
        $events = $model->getAllEvents();
        for ($i=0; $i < count($events); $i++) { 
            $events[$i] = array_filter($events[$i]);
        }
        if (empty($events)) {
            return $this->getResponse(['error' => 'Events not found'], 404);
        }
        else{
            return $this->getResponse($events);
        }
    }

    public function show(){
        $model = new EventModel();
        $input = $this->request->getGet();
        if (isset($input['from']) && isset($input['to'])) {
            $from = urldecode($input['from']);
            $to = urldecode($input['to']);
            $events = $model->getEventsDateRange($from, $to);
            switch (true) {
                case isset($events['error']):
                    return $this->getResponse($events, 404);
                    break;
                case empty($events):
                    return $this->getResponse(['error' => 'Invalid date format.'], 400);
                    break;
                default:
                    for ($i=0; $i < count($events); $i++) { 
                        $events[$i] = array_filter($events[$i]);
                    }
                    return $this->getResponse($events);
                    break;
            }
        }
        else{
            return $this->index();
        }
    }

    public function store(){
        $model = new EventModel();
        $data = $this->getRequestInput($this->request);
        if ($model->insert($data)) {
            $fixID = $model->getInsertID();
            $response = [
                'id' => $fixID,
            ];
            return $this->getResponse($response, 201);
        }
        else{
            $response = [
                'status' => 400,
                'error' => null,
                'messages' => [
                    'error' => 'Event not created'
                ]
            ];
            return $this->getResponse($response, 400);
        }
    }
    
    public function update($id){
        $model = new EventModel();
        $event = $model->getEventbyID($id);
        $input = $this->request->getRawInput();
        if (empty($event)) {
            return $this->getResponse(['error' => 'Event not found'], 404);
        }
        else{
            $model->update($id, $input);
            return $this->getResponse(['success' => 'Event updated'], 200);
        }
    }

    public function delete($id){
        $model = new EventModel();
        $event = $model->getEventbyID($id);
        if (empty($event)) {
            return $this->getResponse(['error' => 'Event not found'], 404);
        }
        else{
            $model->delete($id);
            return $this->getResponse(['success' => 'Event deleted'], 200);
        }
    }
}
