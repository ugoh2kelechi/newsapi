<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model {

	protected $table = 'makers';

	protected $fillable = ['name','phone'];

	protected $hidden = ['id','created_at','updated_at'];


	public function vehicles(){
		return $this->hasMany('App\Model\Vehicle');
	}

}
