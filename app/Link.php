<?php

namespace LinkSpace;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

	protected $table = 'link';
	protected $primaryKey = 'id';

	public function incrementRedirects(){
		$this->redirects++;
		return $this->save();
	}

}
