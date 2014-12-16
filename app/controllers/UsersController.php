<?php
class UsersController extends BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
   
  public function get_index()
  {
	
    return View::make('pages.users.index')->with('page_title','List of BIKA Health Users');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
		$firstname = htmlspecialchars($_REQUEST['first_name']);
		$lastname = htmlspecialchars($_REQUEST['last_name']);
		$username = htmlspecialchars($_REQUEST['username']);
		$email = htmlspecialchars($_REQUEST['email']);
		$Department = htmlspecialchars($_REQUEST['Department']);
		$Groups = htmlspecialchars($_REQUEST['Groups']);
		$newId  = DB::insert('insert into users(first_name,last_name,username,email,Department,Groups) 
							values(?,?,?,?,?,?)',array($firstname,$lastname,$username,$email,$Department,
																$Groups));
		if ($newId){
			echo json_encode(array(
				'id' => $newId,
				'first_name' => $firstname,
				'last_name' => $lastname,
				'username' => $username,
				'Department' => $Department, 
				'email' => $email,
				'Groups' => $Groups
			));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show()
  {
	 
    $cntusers = DB::table('users')->count();
    $result["total"] = $cntusers;
    //$result["total"] = 8;
    $users_list = DB::select(DB::raw('select * from users'));
    $items = array();
	foreach($users_list as $row){
		array_push($items, $row);
		//echo $row->email."<br>";
	}
	$result["rows"] = $items;

	echo json_encode($result);
   
  }

   /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
		//$id = intval($_REQUEST['id']);
	    $firstname = htmlspecialchars($_REQUEST['first_name']);
	    $lastname = htmlspecialchars($_REQUEST['last_name']);
		$username = htmlspecialchars($_REQUEST['username']);
		$email = htmlspecialchars($_REQUEST['email']);
		$Department = htmlspecialchars($_REQUEST['Department']);
		$Groups = htmlspecialchars($_REQUEST['Groups']);
		$result = DB::update('UPDATE users SET first_name=?,last_name=?,username=?,email=?,
							Department=?,Groups=? WHERE id=?',array($firstname,$lastname,$username,$email,$Department,
																$Groups,$id));
		if ($result){
			echo json_encode(array(
				'id' => $id,
				'first_name' => $firstname,
				'last_name' => $lastname,
				'username' => $username,
				'Department' => $Department, 
				'email' => $email,
				'Groups' => $Groups
			));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}
		
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy()
  {
		$id = intval($_REQUEST['id']);
		$sql = "delete from users where id=$id";
		$result = DB::delete('delete from users where id=?',array($id));
		if ($result){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}
  }
  public function showLogin()
	{
		// show the form
		return View::make('pages.users.login')->with('page_title','Authentication Page');
	}

	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('users/login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);
           // echo "<pre>",print_r($userdata),"</pre>";
           //die;
			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				if ( Session::has('pre_login_url') )
				{
					$url = Session::get('pre_login_url');
					Session::forget('pre_login_url');
					return Redirect::to($url);
				}
				else
					return Redirect::to('/');

			} else {

				// validation not successful, send back to form
				return Redirect::to('users/login');

			}

		}
	}
	public function getSignOut() {

		Auth::logout();
		return Redirect::to('users/login');

	}	
  
}

