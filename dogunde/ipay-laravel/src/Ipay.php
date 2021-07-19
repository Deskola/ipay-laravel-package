<?php

namespace Dogunde\Ipay;

/**
 * 
 */
class Ipay 
{
	
	public static function payment(string $oid,string $inv,string $ttl,string $tel,string $eml,string $curr,
		?string $p1 = null,?string $p2 = null,?string $p3 = null,?string $p4 = null		
	)
	{
		
		$base_uri = 'https://payments.ipayafrica.com/v3/ke';
		$data = array(
			'live' => config('ipay.live'),
			'oid' => $oid,
			'inv' => $inv,
			'ttl' => $ttl,
			'tel' => $tel,
			'eml' => $eml,
			'vid' => config('ipay.vendorID'),
			'curr' => $curr,			
			'p1' => $p1,
			'p2' => $p2,
			'p3' => $p3,
			'p4' => $p4,
			'cbk' => config('ipay.cbk'),
			'cst' => config('ipay.cst'),
			'crl' => config('ipay.crl'),
		);

		$dataString = $data['live'].$data['oid'].$data['inv'].$data['ttl'].$data['tel'].$data['eml'].$data['vid'].$data['curr'].$data['cbk'].$data['p1'].$data['p2'].$data['p3'].$data['p4'].$data['cst'].$data['crl'];

		$secretKey = config('ipay.securityKey');
		$generatedHash = hash_hmac('sha1', $dataString, $secretKey);

		
		try {
			$res = $base_uri.'?live='.$data['live'].'&oid='.$data['oid'].'&inv='.$data['inv'].'&ttl='.$data['ttl'].'&tel='.$data['tel'].'&eml='.$data['eml'].'&vid='.$data['vid'].'&curr='.$data['curr'].'&p1='.$data['p1'].'&p2='.$data['p2'].'&p3='.$data['p3'].'&p4='.$data['p4'].'&cbk='.$data['cbk'].'&cst='.$data['cst'].'&crl='.$data['crl'].'&hsh='.$generatedHash.'&autopay=0';			
			
			return $res;				
		} catch (\Exception $e) {
			return false;
		}	
			
		
		
	}
}

