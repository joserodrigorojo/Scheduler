<?php
namespace App\Controllers;

use App\Models\CalendarModel;

class Calendar extends BaseController
{
    public function index(){
    $model = new CalendarModel();
    $calendars = $model->getAllCalendars();
    if (empty($calendars)) {
        return $this->getResponse(['error' => 'Calendars not found'], 404);
    }
    else{
        return $this->getResponse($calendars);
        }
    }

    public function store(){
        $model = new CalendarModel();
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
                    'error' => 'Calendar not created'
                ]
            ];
            return $this->getResponse($response, 400);
        }
    }
    
    public function update($id){
        $model = new CalendarModel();
        $event = $model->getCalendarbyID($id);
        $input = $this->request->getRawInput();
        if (empty($event)) {
            return $this->getResponse(['error' => 'Calendar not found'], 404);
        }
        else{
            $model->update($id, $input);
            return $this->getResponse(['success' => 'Calendar updated'], 200);
        }
    }

    public function delete($id){
        $model = new CalendarModel();
        $calendar = $model->getCalendarbyID($id);
        if (empty($calendar)) {
            return $this->getResponse(['error' => 'Calendar not found'], 404);
        }
        else{
            $model->delete($id);
            return $this->getResponse(['success' => 'Calendar deleted'], 200);
        }
    }
}