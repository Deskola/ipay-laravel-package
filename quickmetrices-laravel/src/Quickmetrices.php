<?php

namespace Dogunde\Quickmetrices;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
/**
 * 
 */
class Quickmetrices
{
	
	public static function event(string $name, float $val, ?string $dimension = null)
	{
		//send the event to Quickmetrices api
		$client = new Client([
			'base_uri' => 'https://qckm.io/',
		]);

		$json = [
			"name" => $name,
  			"value" => $val,
  			
		];

		if(!empty($dimension)){
			$json['dimension'] = $dimension;
		}

		try {
			
			$res = $client->request('POST', '/json', [
				'json' => $json,
				'headers' => [
					'x-qm-key' => config('quickmetrices.key')
				]
			]);

			return response()->json([
				'code' => $res->getStatusCode(),
				'message' => $res->getReasonPhrase(),

			]);
		} catch (GuzzleException $e) {
			//handle excption
			return response()->json([
				'error' => $e->getMessage()
			], status: 500);
		}
	}
}