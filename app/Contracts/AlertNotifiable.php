<?php

namespace App\Contracts;

/**
 * 
 */
interface AlertNotifiable
{
	/**
	 * [getData description]
	 * @return Array
	 */
	public function getData() : Array;

	/**
	 * [getEventName description]
	 * @return String
	 */
	public function getEventName() : String;
}