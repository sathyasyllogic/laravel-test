<div class="col-lg-8 col-lg-offset-2">
  <form id="defaultForm" method="post" class="form-horizontal">
    <div class="form-group">
      <label class="col-lg-3 control-label">
        Postal address
	  </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_postal_address" 
          value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_postal_address:''}}" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Postal address city
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_postal_address_city"
          value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_postal_address_city:''}}" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
      Postal address state
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_postal_address_state" 
          value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_postal_address_state:''}}" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
        Postal address zip
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_postal_address_zip" 
          value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_postal_address_zip:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
        Postal address country
      
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_postal_address_country" 
          value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_postal_address_country:''}}" />
         <input type="hidden" name="actionfrom" value="1" />
          @if ( LabInformation::all()->count()!=0 )
			<input type="hidden" name ="updatefrom" value="postal" />
			 
	       	<input type="hidden" name ="lab_id" value="{{LabInformation::bika_getrow_columnbysingle_condition('lab_id')}}" />
		 @else
		    <input type="hidden" name ="createfrom" value="postal" />	
         @endif
         
      </div>
   </div>
   
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
        <button type="submit" class="btn btn-primary">
          Save Postal Details
        </button>
      </div>
    </div>
  </form>
</div>
