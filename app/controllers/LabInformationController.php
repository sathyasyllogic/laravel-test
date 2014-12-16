<?php
class LabInformationController extends BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
   
  public function get_index()
  {
	$lab_information = array();
	$lab_information = LabInformation::all();
	
    if( Input::has('actionfrom') ){
		/* Checks submit button pressed or not */
		if( Input::has('updatefrom') ){
		 /* Checks For Update the Lab information */
			$this->update(Input::get('lab_id'),Input::get('updatefrom'));
	    }else{
			/* Create Lab information */
			$this->create(Input::get('createfrom'));
		}
		
	}
		 return View::make('pages.labinformation.index')
		           ->with('page_title','Laboratory and Accreditation Information')
		           ->with('lab_information',$lab_information);
 }

   /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function create($actionfrom)
  {
		$lab_information = new LabInformation;
		switch($actionfrom){
			
			case 'lab':
				
				$lab_information->lab_name=Input::get('lab_name');
				$lab_information->lab_web_address=Input::get('lab_web_address');
				$lab_information->lab_confidence=Input::get('lab_confidence');
				$lab_information->lab_accredited=Input::get('lab_accredited');
				$lab_information->lab_acc_body_title=Input::get('lab_acc_body_title');
				$lab_information->lab_acc_body_abbr=Input::get('lab_acc_body_abbr');
				$lab_information->lab_acc_standard=Input::get('lab_acc_standard');
				$lab_information->lab_acc_ref_number=Input::get('lab_acc_ref_number');
				$lab_information->lab_acc_body_logo=Input::get('lab_acc_body_logo');
				$lab_information->lab_tax_number=Input::get('lab_tax_number');
				$lab_information->lab_phone_number=Input::get('lab_phone_number');
				$lab_information->lab_fax_number=Input::get('lab_fax_number');
				$lab_information->lab_email_address=Input::get('lab_email_address');
				$lab_information->save();
				break;
				
		    case'billing':
		    
		    	$lab_information->lab_billing_address=Input::get('lab_billing_address');
				$lab_information->lab_billing_address_city=Input::get('lab_billing_address_city');
				$lab_information->lab_billing_address_state=Input::get('lab_billing_address_state');
				$lab_information->lab_billing_address_zip=Input::get('lab_billing_address_zip');
				$lab_information->lab_billing_address_country=Input::get('lab_billing_address_country');
				$lab_information->save();
				break;
				
		    case'physical':
		    
				$lab_information->lab_physical_address=Input::get('lab_physical_address');
				$lab_information->lab_physical_address_city=Input::get('lab_physical_address_city');
				$lab_information->lab_physical_address_state=Input::get('lab_physical_address_state');
				$lab_information->lab_physical_address_zip=Input::get('lab_physical_address_zip');
				$lab_information->lab_physical_address_country=Input::get('lab_physical_address_country');
				$lab_information->save();
				break;
			
			case'postal';
				$lab_information->lab_postal_address=Input::get('lab_postal_address');
				$lab_information->lab_postal_address_city=Input::get('lab_postal_address_city');
				$lab_information->lab_postal_address_state=Input::get('lab_postal_address_state');
				$lab_information->lab_postal_address_zip=Input::get('lab_postal_address_zip');
				$lab_information->lab_postal_address_country=Input::get('lab_postal_address_country');
				$lab_information->save();
				break;
				
		
		
		}
		
  }
  public function update($lab_id,$updatefrom)
  {
		$lab_information = LabInformation::whereLabId($lab_id);
		$lab_informationUpdate =array();
		//print_r($lab_information); die;
		switch($updatefrom){
			
			case 'lab':
				
				$lab_informationUpdate['lab_name']=Input::get('lab_name');
				$lab_informationUpdate['lab_web_address']=Input::get('lab_web_address');
				$lab_informationUpdate['lab_confidence']=Input::get('lab_confidence');
				$lab_informationUpdate['lab_accredited']=Input::get('lab_accredited');
				$lab_informationUpdate['lab_acc_body_title']=Input::get('lab_acc_body_title');
				$lab_informationUpdate['lab_acc_body_abbr']=Input::get('lab_acc_body_abbr');
				$lab_informationUpdate['lab_acc_standard']=Input::get('lab_acc_standard');
				$lab_informationUpdate['lab_acc_ref_number']=Input::get('lab_acc_ref_number');
				$lab_informationUpdate['lab_acc_body_logo']=Input::get('lab_acc_body_logo');
				$lab_informationUpdate['lab_tax_number']=Input::get('lab_tax_number');
				$lab_informationUpdate['lab_phone_number']=Input::get('lab_phone_number');
				$lab_informationUpdate['lab_fax_number']=Input::get('lab_fax_number');
				$lab_informationUpdate['lab_email_address']=Input::get('lab_email_address');
				
				$lab_information->update($lab_informationUpdate);
				break;
				
		    case'billing':
		    
		    	$lab_informationUpdate['lab_billing_address']=Input::get('lab_billing_address');
				$lab_informationUpdate['lab_billing_address_city']=Input::get('lab_billing_address_city');
				$lab_informationUpdate['lab_billing_address_state']=Input::get('lab_billing_address_state');
				$lab_informationUpdate['lab_billing_address_zip']=Input::get('lab_billing_address_zip');
				$lab_informationUpdate['lab_billing_address_country']=Input::get('lab_billing_address_country');
				$lab_information->update($lab_informationUpdate);
				break;
				
		    case'physical':
		    
				$lab_informationUpdate['lab_physical_address']=Input::get('lab_physical_address');
				$lab_informationUpdate['lab_physical_address_city']=Input::get('lab_physical_address_city');
				$lab_informationUpdate['lab_physical_address_state']=Input::get('lab_physical_address_state');
				$lab_informationUpdate['lab_physical_address_zip']=Input::get('lab_physical_address_zip');
				$lab_informationUpdate['lab_physical_address_country']=Input::get('lab_physical_address_country');
				$lab_information->update($lab_informationUpdate);
				break;
			
			case'postal';
				$lab_informationUpdate['lab_postal_address']=Input::get('lab_postal_address');
				$lab_informationUpdate['lab_postal_address_city']=Input::get('lab_postal_address_city');
				$lab_informationUpdate['lab_postal_address_state']=Input::get('lab_postal_address_state');
				$lab_informationUpdate['lab_postal_address_zip']=Input::get('lab_postal_address_zip');
				$lab_informationUpdate['lab_postal_address_country']=Input::get('lab_postal_address_country');
				$lab_information->update($lab_informationUpdate);
				break;
				
		
		
		}
  }

  
  
}

