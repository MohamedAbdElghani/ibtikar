<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Squad;

class SquadController extends Controller
{

	// authorize controller
	// public function __construct(){
	// 	$this->middleware('auth');
	// }


  // create function
  public function create(){
    // $this->authorize('create', Squad::class);

    // $old_squad = auth()->user()->squads()->first();
    // if ($old_squad && $old_squad->calendly && auth()->user()->id != 3) {
    //   return redirect('/');
    // }
		return view('squad.create');
	}



  // thankyou function
  public function thankyou(){
    // $this->authorize('create', Squad::class);

    // $old_squad = auth()->user()->squads()->first();
    // if ($old_squad && $old_squad->calendly && auth()->user()->id != 3) {
    //   return redirect('/');
    // }
		return view('squad.thankyou');
	}


	// store function
	public function store(Squad $squad){
    // $this->authorize('create', Squad::class);

		// $user = auth()->user();

		$data = request()->validate([
			'project_service' 	    => 'string|required',
			'project_service_desc'  => 'string|nullable',
			'app_liked'  			      => 'string|nullable',
			'project_technology'    => 'string|nullable',
			'squad_size' 	    	    => 'string|required',
			'project_status'   		  => 'string|required',
			'project_status_desc'   => 'string|nullable',
		]);
    
		

		$project_service_description = trim(preg_replace('/\s\s+/', '\n', $data['project_service_desc'])) ?? 'empty';
		$app_liked					 = trim(preg_replace('/\s\s+/', '\n', $data['app_liked'])) ?? 'empty';
		$project_status_description  = trim(preg_replace('/\s\s+/', '\n', $data['project_status_desc'])) ?? 'empty';
		$project_technology  		 = $data['project_technology'] ?? 'empty';


    setcookie("project_service",$data['project_service']);
    setcookie("project_service_desc",$project_service_description);
    setcookie("app_liked",$data['app_liked']);
    setcookie("project_technology",$project_technology);
    setcookie("squad_size",$data['squad_size']);
    setcookie("project_status",$data['project_status']);
    setcookie("project_status_desc",$project_status_description);
    
		// pipefy
		// $ch = curl_init();

		// curl_setopt($ch, CURLOPT_URL, "https://app.pipefy.com/queries");
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// curl_setopt($ch, CURLOPT_HEADER, FALSE);
		// curl_setopt($ch, CURLOPT_POST, TRUE);

		// curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
		//     "query": "mutation{ createCard(input: {pipe_id: 301298543 fields_attributes: [{field_id: \"squad_name\", field_value: \"'.$user->name.'\"} {field_id: \"contact_name\", field_value: \"'.$user->name.'\"} {field_id: \"contact_e_mail\", field_value: \"'.$user->email.'\"} {field_id: \"company_name\", field_value: \"'.$user->phone.'\"} {field_id: \"project_service\", field_value: \"'.$data['project_service'].'\"} {field_id: \"app_liked\", field_value: \"'.$app_liked.'\"} {field_id: \"project_brief\", field_value: \"'.$project_service_description.'\"} {field_id: \"project_technologies\", field_value: \"'.$data['project_technology'].'\"} {field_id: \"squad_size\", field_value: \"'.$data['squad_size'].'\"} {field_id: \"project_status_1\", field_value: \"'.$data['project_status'].'\"} {field_id: \"project_status_description\", field_value: \"'.$project_status_description.'\"} ] parent_ids: [\"2735966\"] }) { card {id title }}}"
		// }');

		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		//   "Content-Type: application/json",
		//   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjozMDEwNDIwOTAsImVtYWlsIjoicmFteUBhbGV4d2ViZGVzaWduLmNvbSIsImFwcGxpY2F0aW9uIjozMDAwNjg2ODB9fQ.pyUTp5iojIC7cL2lLrHbrj_iDx3XQ4pq0Nxzmw3Q1KYVNdvaW5t3olbsh3TbhnzkBTEDq_x0oawMTlSyDohGhg"
		// ));

		// $response = curl_exec($ch);
		// curl_close($ch);
    // $pipefy_card = json_decode($response)->data->createCard->card->id;
		// $data['pipefy_id'] = $pipefy_card;
    // // end pipefy


    

    // // hubspot
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
    // // end hubspot		

		// $squad = auth()->user()->squads()->create($data);

		return $squad->id;
	}


	// edit function
  public function edit(){
    // $this->authorize('create', Squad::class);

		$old_squad = auth()->user()->squads()->first();
    	if (!$old_squad) {
    		return redirect(route('squad.create'));
    	}

		return view('squad.edit', compact('old_squad'));
	}


	// update function
	public function update(Squad $squad){
    // $this->authorize('create', Squad::class);

		$user = auth()->user();
		$old_squad = auth()->user()->squads()->first();

		$data = request()->validate([
			'project_service' 	    => 'string|required',
			'project_service_desc'  => 'string|nullable',
			'app_liked'  			=> 'string|nullable',
			'project_technology'    => 'string|nullable',
			'squad_size' 	    	=> 'string|required',
			'project_status'   		=> 'string|required',
			'project_status_desc'   => 'string|nullable',
		]);

		$data['project_service_desc'] = trim(preg_replace('/\s\s+/', '\n', $data['project_service_desc'])) ?? 'empty';
		$data['app_liked']			  = trim(preg_replace('/\s\s+/', '\n', $data['app_liked'])) ?? 'empty';
		$data['project_status_desc']  = trim(preg_replace('/\s\s+/', '\n', $data['project_status_desc'])) ?? 'empty';
		$data['project_technology']   = $data['project_technology'] ?? 'empty';

		$pipefy_fields_ids = [
			'project_service' 		=> 'project_service',
			'project_service_desc' 	=> 'project_brief',
			'app_liked' 			=> 'app_liked',
			'project_technology' 	=> 'project_technologies',
			'squad_size' 			=> 'squad_size',
			'project_status' 		=> 'project_status_1',
			'project_status_desc' 	=> 'project_status_description',
		];

		// pipefy
		foreach ($data as $key => $field) {
			if ($field != $old_squad[$key]) {
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, "https://app.pipefy.com/queries");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_POST, TRUE);

				curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
					"query": "mutation{ updateCardField(input: {card_id: '.$old_squad->pipefy_id.' field_id: \"'.$pipefy_fields_ids[$key].'\" new_value: \"'.$field.'\" }){ card{ id } } }"
				}');

				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				  "Content-Type: application/json",
				  "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjozMDEwNDIwOTAsImVtYWlsIjoicmFteUBhbGV4d2ViZGVzaWduLmNvbSIsImFwcGxpY2F0aW9uIjozMDAwNjg2ODB9fQ.pyUTp5iojIC7cL2lLrHbrj_iDx3XQ4pq0Nxzmw3Q1KYVNdvaW5t3olbsh3TbhnzkBTEDq_x0oawMTlSyDohGhg"
				));

				$response = curl_exec($ch);
				curl_close($ch);
			}
		}


    // hubspot
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.hubapi.com/deals/v1/deal/".$old_squad->hubspot_id."?hapikey=f7b75015-8bff-4ed8-bbaf-dab80e1c3823");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"properties": [{"value": "'.$data['project_service'].'","name": "project_service"},{"value": "'.$data['project_technology'].'","name": "project_technology"},{"value": "'.$data['project_service_desc'].'","name": "description"},{"value": "'.$data['squad_size'].'","name": "squad_size"},{"value": "'.$data['project_status_desc'].'","name": "project_status_description"},{"value": "'.$data['project_status'].'","name": "project_status"},{"value": "'.$data['app_liked'].'","name": "app_liked"}] }');

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "Authorization: Bearer f7b75015-8bff-4ed8-bbaf-dab80e1c3823"
    ));

    $hubspot_response = curl_exec($ch);
    curl_close($ch);
    $hubspot_card = json_decode($hubspot_response)->dealId;
		$data['hubspot_id'] = $hubspot_card;
    // end hubspot
		
		Squad::find($old_squad->id)->update($data);

		return ['response' => 'succuss'];
	}

}
