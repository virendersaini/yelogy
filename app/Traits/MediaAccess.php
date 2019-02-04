<?php 

namespace App\Traits;

trait MediaAccess {

	public function fetchFirstMedia($collection = "default")
	{
		return $this->getFirstMedia($collection);
	}
	public function fetchFirstMediaUrl($collection = "default")
	{
		return optional($this->fetchFirstMedia($collection))->getFullUrl();
	}
	public function fetchThumbMediaUrl($collection = "default")
	{
		return optional($this->getUrl('thumb'));
	}

}