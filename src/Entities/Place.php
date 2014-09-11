<?php
/**
 * @author: James Murray <jaimz@vertigolabs.org>
 * @copyright:
 * @date: 9/11/2014
 * @time: 12:16 PM
 */

namespace VertigoLabs\Zippopotamus\Entities;

/**
 * Class Place
 * @package VertigoLabs\Zippopotamus\Entities
 */
class Place
{
	/**
	 * The name of the place
	 * @var string
	 */
	private $name;
	/**
	 * The name of the state
	 * @var string
	 */
	private $state;
	/**
	 * The abbreviation of the state
	 * @var string
	 */
	private $stateAbbreviation;
	/**
	 * The postal code of the place
	 * @var string
	 */
	private $postalCode;
	/**
	 * The longitude of the place
	 * @var float
	 */
	private $longitude;
	/**
	 * The latitude of the place
	 * @var float
	 */
	private $latitude;

	public function __construct(array $data = [])
	{
		if (array_key_exists('place name',$data)) {
			$this->name = $data['place name'];
		}
		if (array_key_exists('post code',$data)) {
			$this->postalCode = $data['post code'];
		}
		if (array_key_exists('state',$data)) {
			$this->state = $data['state'];
		}
		if (array_key_exists('state abbreviation',$data)) {
			$this->stateAbbreviation = $data['state abbreviation'];
		}
		if (array_key_exists('longitude',$data)) {
			$this->longitude = (float)$data['longitude'];
		}
		if (array_key_exists('latitude',$data)) {
			$this->latitude = (float)$data['latitude'];
		}
	}

	/**
	 * @return float
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * @return float
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getPostalCode()
	{
		return $this->postalCode;
	}

	/**
	 * @return string
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * @return string
	 */
	public function getStateAbbreviation()
	{
		return $this->stateAbbreviation;
	}
}