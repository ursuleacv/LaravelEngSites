<?php
/**
 * Learning English websites  - a collection of online resources for learning English
 * Copyright (C) 2012 Valentin Ursuleac <ursuleacv@gmail.com>
 */

/**
 * @package LEW
 * @subpackage controllers
 *
 * @author Valentin Ursuleac <ursuleacv@gmail.com>
 * @version 1.0
 * @license http://www.gnu.org/licenses/gpl.html GPL License
 * @copyright Valentin Ursuleac, 2012
 */

/**
 * Class Sites_Controller
 *
 * A restful controller allows us to prepend get_ or post_ to a function / url names
 * in order to logically separate the two types of request. Particularly useful
 * for CRUD systems.
 *
 * @package LEW
 * @subpackage controllers
 *
 * @version 1.0
 */
class Sites_Controller extends Base_Controller {
	
	public $restful = true;

	/**
     * This method loads the sites from DB, paginates and displays
     * @param  no params
     * @return view sites/index
     */
	public function get_index()	{
		//get from db order and paginate
		$sites = DB::table('sites')->order_by('id','desc')->paginate(5);
		$total_sites = DB::table('sites')->get(); //get all sites
		$total_sites = count ($total_sites); //count 
		
		return View::make('sites.index')//make view
		->with('title', 'Learning English websites') // title
		->with('total_sites', $total_sites) 
		->with('sites', $sites); //send sites array to the view
		
	}
	
	/**
     * This method loads one site by id
     * @param  id type integer
     * @return view sites/view
     */
	public function get_view($id)	{
		return View::make('sites.view')
		->with('title','Site view')
		->with('site', Site::find($id));//get the specific site
	}
	
	/**
     * This method displays the form for adding a new site
     * @param  no params
     * @return view sites/view
     */
	public function get_new()	{
		return View::make('sites.new')
		->with('title','Create new site');
	}

	/**
     * Send all fields from the form,  validate and save in DB
     * @param  no params
     * @return redirect
     */
	public function post_create()	{
		$input = Input::all();
        // if( isset($input['description']) ) {
        //     $input['description'] = filter_var($input['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        // }
        $rules = array(
			'site_url' => 'required|min:5|url',		
			'site_review' => 'required|min:10',
		);
        $validation = Validator::make($input, $rules);
        
        if( $validation->fails() ) { 

			return Redirect::to_route('new_site') //redirect to the same route
			->with_errors($validation) // send errors
			->with_input(); //repopulate the form

		} else {
				site::create(array( //get fields from  the FORM and insert it in DB
					'site_url'=>Input::get('site_url'),
					'site_review'=>Input::get('site_review'),
				));
			return Redirect::to_route('sites') //redirect to home page with message
			->with('message','The site has been created successfully!');
		}
	}

	/*  Display the form for editing
     * @param  id type integer
     * @return redirect
     */
	public function get_edit($id){ // render view for editing
		return View::make('sites.edit')
		->with('title','Update info') // make the view for updating info
		->with('site', Site::find($id));
	}
 	
 	/* Updating a site
     * @param  no params
     * @return redirect
     */
	public function put_update(){ // put updates
		$id = Input::get('id');
		$input = Input::all();
		 $rules = array(
			'site_url' => 'required|min:5|url',
			'site_review' => 'required|min:10',
		);
        $validation = Validator::make($input, $rules);
        
        if( $validation->fails() ) { 

			return Redirect::to_route('edit_site', $id) //redirect to the same route
			->with_errors($validation) // send errors
			->with_input(); //repopulate the form

		} else {
				site::update($id, array( //get fields from  the FORM and insert it in DB
					'site_url'=>Input::get('site_url'),
					'site_review'=>Input::get('site_review'),
				));
			return Redirect::to_route('sites') //redirect to home page with message
			->with('message','The site has been updated successfully!');
		}
	}

	/* Deleting a site from db
     * @param  no params
     * @return redirect
     */
	public function get_destroy($id){ // delete a site
		Site::find($id)->delete();

		return Redirect::to_route('sites') //redirect to home page with message
			->with('message','The site has been deleted successfully!');

	}	
}