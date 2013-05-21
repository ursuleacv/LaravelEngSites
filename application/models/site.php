<?php
class Site extends Eloquent{
	public static $table = 'sites';

	public static $rules = array(
		'name' => 'required|min:3|max:20',
		'age' => 'required|integer',
		'adress' => 'required|min:5',
		);

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}
}
?>