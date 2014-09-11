<?php
/**
 * @author: James Murray <jaimz@vertigolabs.org>
 * @copyright:
 * @date: 9/11/2014
 * @time: 11:30 AM
 */

namespace VertigoLabs\Zippopotamus\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use VertigoLabs\Zippopotamus\Entities\Response;

class ZippopotamusClient
{
	const ApiUrl = 'http://api.zippopotam.us';

	/**
	 * @var ClientInterface
	 */
	private $client;

	/**
	 * @var string
	 */
	private $request;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function postalCodeToCity($postalCode, $countryCode = 'US')
	{
		$this->request = $countryCode.'/'.$postalCode;
		return $this->sendRequest();
	}

	public function cityToPostalCode($stateAbbreviation, $city, $countryCode = 'US')
	{
		$this->request = $countryCode.'/'.$stateAbbreviation.'/'.$city;
		return $this->sendRequest();
	}

	private function sendRequest()
	{
		$url = self::ApiUrl.'/'.$this->request;
		$request = $this->client->createRequest('GET', $url);
		$request->addHeader('Content-Type', 'application/json');
		$response = $this->client->send($request);
		$data = $response->json();
		return new Response($data);
	}
}