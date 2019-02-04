<?php

namespace App\Contracts;

/**
 * 
 */
interface Alertable
{
	/**
	 * [getContent description]
	 * @return Array
	 */
	public function getContent();

	/**
	 * [getTitle description]
	 * @return String
	 */
	public function getTitle();
}