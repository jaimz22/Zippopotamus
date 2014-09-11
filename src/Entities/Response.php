<?php
/**
 * @author: James Murray <jaimz@vertigolabs.org>
 * @copyright:
 * @date: 9/11/2014
 * @time: 12:09 PM
 */

namespace VertigoLabs\Zippopotamus\Entities;


class Response
{
	/**
	 * The name of the country
	 * @var string
	 */
	private $country;
	/**
	 * The abbreviation of the country
	 * @var string
	 */
	private $countryAbbreviation;
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
	 * The postal code
	 * @var string
	 */
	private $postalCode;
	/**
	 * An array of places in the response
	 * @var array
	 */
	private $places = [];

	public function __construct(array $data = [])
	{
		if (array_key_exists('country',$data)){
			$this->country = $data['country'];
		}
		if (array_key_exists('country abbreviation',$data)){
			$this->countryAbbreviation = $data['country abbreviation'];
		}
		if (array_key_exists('state',$data)){
			$this->state = $data['state'];
		}
		if (array_key_exists('state abbreviation',$data)){
			$this->stateAbbreviation = $data['state abbreviation'];
		}
		if (array_key_exists('post code',$data)){
			$this->postalCode = $data['post code'];
		}
		if (array_key_exists('places',$data) && is_array($data['places'])){
			foreach($data['places'] as $place){
				$this->places[] = new Place($place);
			}
		}
	}

	/**
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @return string
	 */
	public function getCountryAbbreviation()
	{
		return $this->countryAbbreviation;
	}

	/**
	 * @return array
	 */
	public function getPlaces()
	{
		return $this->places;
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