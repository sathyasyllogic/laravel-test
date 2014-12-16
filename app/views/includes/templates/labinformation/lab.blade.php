
<div class="col-lg-8 col-lg-offset-2">
  <form id="defaultForm" method="post" class="form-horizontal">
    <div class="form-group">
      <label class="col-lg-3 control-label">
        Name
	  </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_name" 
		value="{{ (count($lab_information)>0)? $lab_information[0]->lab_name:''}}" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
        Lab web address
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_web_address" 
		value="{{ (count($lab_information)>0)?$lab_information[0]->lab_web_address:'' }}" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Confidence level %
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_confidence" 
		value="{{ (count($lab_information)>0)?$lab_information[0]->lab_confidence:''}}" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
        Laboratory accredited ?
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_accredited" 
		value="{{ (count($lab_information)>0)?$lab_information[0]->lab_accredited:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
        Accreditation body  title
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_acc_body_title" 
        value="{{ (count($lab_information)>0)?$lab_information[0]->lab_acc_body_title:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Accreditation body abbreviation
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_acc_body_abbr" 
		value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_acc_body_abbr:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Accreditation body web address
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_acc_body_web" 
		value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_acc_body_web:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Accreditation standard, e.g ISO 17025
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_acc_standard"
		value ="{{(count($lab_information)>0)?$lab_information[0]->lab_acc_standard:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Lab's accreditation reference number
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_acc_ref_number" 
	    value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_acc_ref_number:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Accreditation body logo
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_acc_body_logo"
		 value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_acc_body_logo:''}}" />
      </div>
   </div>
   
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Tax number
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_tax_number"
		 value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_tax_number:'' }}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
      Phone number
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_phone_number"
		value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_phone_number:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
       Fax number
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_fax_number"
		value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_fax_number:''}}" />
      </div>
   </div>
    <div class="form-group">
      <label class="col-lg-3 control-label">
      Email address
      </label>
      <div class="col-lg-5">
        <input type="text" class="form-control" name="lab_email_address"
		value ="{{ (count($lab_information)>0)?$lab_information[0]->lab_email_address:''}}" />
        <input type="hidden" name="actionfrom" value="1" />
        @if ( LabInformation::all()->count()!=0 )
			<input type="hidden" name ="updatefrom" value="lab" />
			<input type="hidden" name ="lab_id" value="{{LabInformation::bika_getrow_columnbysingle_condition('lab_id')}}" />
		@else
		    <input type="hidden" name ="createfrom" value="lab" />	
        @endif
       </div>
   </div>
   
    <div class="form-group">
      <div class="col-lg-9 col-lg-offset-3">
        <button type="submit" class="btn btn-primary">
          Save Lab Details
        </button>
      </div>
    </div>
  </form>
</div>

