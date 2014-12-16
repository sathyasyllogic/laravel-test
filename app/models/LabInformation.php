<?php
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Builder;
 
class LabInformation extends Eloquent\Model {

	protected $table = 'lab_information';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	 public static function bika_getrow_columnbysingle_condition($columnName=''){
		 
		 $test= LabInformation::select($columnName)->first();
		 $field= json_decode($test);
		 return $field->$columnName;
		 
	 }
}
