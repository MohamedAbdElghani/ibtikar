<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    // dashboard function
    public function index() {
    	$user = auth()->user();
     	return view('welcome');
    }


    public function employerIndex(){
      if(auth()->user() && auth()->user()->role != 'client'){
        return redirect(route('employee.dashboard'));
      }

        // $old_squad = auth()->user()->squads()->first();
        $event_start_time = request()->event_start_time;
        

        // if (!empty($event_start_time) && !empty($old_squad)) {
        if (request()->filled('cly') && request()->cly == 'fnh') {
            $event_date_time =  date('d M Y - H:i', strtotime($event_start_time. '+2 hours'));

            $project_service = isset($_COOKIE["project_service"]) ? $_COOKIE["project_service"] : '';
            $project_service_desc = isset($_COOKIE["project_service_desc"]) ? $_COOKIE["project_service_desc"] : '';
            $app_liked = isset($_COOKIE["app_liked"]) ? $_COOKIE["app_liked"] : '';
            $project_technology = isset($_COOKIE["project_technology"]) ? $_COOKIE["project_technology"] : '';
            $squad_size = isset($_COOKIE["squad_size"]) ? $_COOKIE["squad_size"] : '';
            $project_status = isset($_COOKIE["project_status"]) ? $_COOKIE["project_status"] : '';
            $project_status_desc = isset($_COOKIE["project_status_desc"]) ? $_COOKIE["project_status_desc"] : '';
            $name = request()->filled('invitee_full_name') ? request()->invitee_full_name : '';
            $email = request()->filled('invitee_email') ? request()->invitee_email : '';

            // pipefy
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://app.pipefy.com/queries");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);

            curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
                "query": "mutation{ createCard(input: {pipe_id: 301298543 fields_attributes: [{field_id: \"squad_name\", field_value: \"'.$name.'\"} {field_id: \"contact_name\", field_value: \"'.$name.'\"} {field_id: \"contact_e_mail\", field_value: \"'.$email.'\"} {field_id: \"project_service\", field_value: \"'.$project_service.'\"} {field_id: \"app_liked\", field_value: \"'.$app_liked.'\"} {field_id: \"project_brief\", field_value: \"'.$project_service_desc.'\"} {field_id: \"project_technologies\", field_value: \"'.$project_technology.'\"} {field_id: \"squad_size\", field_value: \"'.$squad_size.'\"} {field_id: \"project_status_1\", field_value: \"'.$project_status.'\"} {field_id: \"project_status_description\", field_value: \"'.$project_status_desc.'\"} {field_id: \"meeting_date\", field_value: \"'.$event_start_time.'\"} ] parent_ids: [\"2735966\"] }) { card {id title }}}"
            }');

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Content-Type: application/json",
              "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjozMDEwNDIwOTAsImVtYWlsIjoicmFteUBhbGV4d2ViZGVzaWduLmNvbSIsImFwcGxpY2F0aW9uIjozMDAwNjg2ODB9fQ.pyUTp5iojIC7cL2lLrHbrj_iDx3XQ4pq0Nxzmw3Q1KYVNdvaW5t3olbsh3TbhnzkBTEDq_x0oawMTlSyDohGhg"
            ));

            $response = curl_exec($ch);
            curl_close($ch);
            // dd($response);
            $pipefy_card = json_decode($response)->data->createCard->card->id;
            // $data['pipefy_id'] = $pipefy_card;
            // end pipefy


            // // pipefy move card to next phase
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://app.pipefy.com/queries");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);

            curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
                "query": "mutation{ moveCardToPhase(input: {card_id: '.$pipefy_card.' destination_phase_id: 308667022 }){ card{ id current_phase { name } } } }"
            }');

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Content-Type: application/json",
              "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjozMDEwNDIwOTAsImVtYWlsIjoicmFteUBhbGV4d2ViZGVzaWduLmNvbSIsImFwcGxpY2F0aW9uIjozMDAwNjg2ODB9fQ.pyUTp5iojIC7cL2lLrHbrj_iDx3XQ4pq0Nxzmw3Q1KYVNdvaW5t3olbsh3TbhnzkBTEDq_x0oawMTlSyDohGhg"
            ));

            $response = curl_exec($ch);
            curl_close($ch);
            // end pipefy functions


            

            // hubspot
            // $ch = curl_init();

            // curl_setopt($ch, CURLOPT_URL, "https://api.hubapi.com/deals/v1/deal?hapikey=f7b75015-8bff-4ed8-bbaf-dab80e1c3823");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // curl_setopt($ch, CURLOPT_HEADER, FALSE);
            // curl_setopt($ch, CURLOPT_POST, TRUE);

            // curl_setopt($ch, CURLOPT_POSTFIELDS, '{"properties": [{"value": "'.$user->name.'","name": "dealname"},{"value": "6094262","name": "dealstage"},{"value": "6094261","name": "pipeline"},{"value": "'.$user->name.'","name": "deal_client"},{"value": "'.$data['project_service'].'","name": "project_service"},{"value": "'.$data['project_technology'].'","name": "project_technology"},{"value": "'.$data['project_service_desc'].'","name": "description"},{"value": "'.$user->email.'","name": "clientemail"},{"value": "'.$user->phone.'","name": "mobile_number"},{"value": "'.$data['squad_size'].'","name": "squad_size"},{"value": "'.$data['project_status_desc'].'","name": "project_status_description"},{"value": "'.$data['project_status'].'","name": "project_status"},{"value": "","name": "meeting_date"},{"value": "'.$data['app_liked'].'","name": "app_liked"} ] }');

            // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            //   "Content-Type: application/json",
            //   "Authorization: Bearer f7b75015-8bff-4ed8-bbaf-dab80e1c3823"
            // ));

            // $hubspot_response = curl_exec($ch);
            // curl_close($ch);
            // $hubspot_card = json_decode($hubspot_response)->dealId;
            // $data['hubspot_id'] = $hubspot_card;
            // end hubspot		




















            // pipefy update meeting date and time
            // $ch = curl_init();

            // curl_setopt($ch, CURLOPT_URL, "https://app.pipefy.com/queries");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // curl_setopt($ch, CURLOPT_HEADER, FALSE);
            // curl_setopt($ch, CURLOPT_POST, TRUE);

            // curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
            //     "query": "mutation{ updateCardField(input: {card_id: '.$old_squad->pipefy_id.' field_id: \"meeting_date\" new_value: \"'.$event_start_time.'\" }){ card{ id } } }"
            // }');

            // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            //   "Content-Type: application/json",
            //   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjozMDEwNDIwOTAsImVtYWlsIjoicmFteUBhbGV4d2ViZGVzaWduLmNvbSIsImFwcGxpY2F0aW9uIjozMDAwNjg2ODB9fQ.pyUTp5iojIC7cL2lLrHbrj_iDx3XQ4pq0Nxzmw3Q1KYVNdvaW5t3olbsh3TbhnzkBTEDq_x0oawMTlSyDohGhg"
            // ));

            // $response = curl_exec($ch);
            // curl_close($ch);

            // // pipefy move card to next phase
            // $ch = curl_init();

            // curl_setopt($ch, CURLOPT_URL, "https://app.pipefy.com/queries");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // curl_setopt($ch, CURLOPT_HEADER, FALSE);
            // curl_setopt($ch, CURLOPT_POST, TRUE);

            // curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
            //     "query": "mutation{ moveCardToPhase(input: {card_id: '.$old_squad->pipefy_id.' destination_phase_id: 308667022 }){ card{ id current_phase { name } } } }"
            // }');

            // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            //   "Content-Type: application/json",
            //   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjozMDEwNDIwOTAsImVtYWlsIjoicmFteUBhbGV4d2ViZGVzaWduLmNvbSIsImFwcGxpY2F0aW9uIjozMDAwNjg2ODB9fQ.pyUTp5iojIC7cL2lLrHbrj_iDx3XQ4pq0Nxzmw3Q1KYVNdvaW5t3olbsh3TbhnzkBTEDq_x0oawMTlSyDohGhg"
            // ));

            // $response = curl_exec($ch);
            // curl_close($ch);
            // end pipefy functions


            // hubspot update meeting date and time
            // $ch = curl_init();

            // curl_setopt($ch, CURLOPT_URL, "https://api.hubapi.com/deals/v1/deal/".$old_squad->hubspot_id."?hapikey=f7b75015-8bff-4ed8-bbaf-dab80e1c3823");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // curl_setopt($ch, CURLOPT_HEADER, FALSE);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

            // curl_setopt($ch, CURLOPT_POSTFIELDS, '{"properties": [{"value": "6094263","name": "dealstage"},{"value": "6094261","name": "pipeline"},{"value": "'.$event_start_time.'","name": "meeting_date"}] }');

            // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            //   "Content-Type: application/json",
            //   "Authorization: Bearer f7b75015-8bff-4ed8-bbaf-dab80e1c3823"
            // ));

            // $response = curl_exec($ch);
            // curl_close($ch);
            return redirect(route('squad.thankyou'));
        }

        // dd(request());

        // return redirect(route('squad.create'));

        // if (empty($old_squad)) {
            
        // }elseif ($old_squad && request()->filled('cly') && request()->cly == 'fnh') {
        //     auth()->user()->squads()->first()->update(['calendly' => 1]);
        //     return redirect('/');
        // }
        
        return view('home.dashboard');
    }

}


