<?php

return[
	"live" => env('IPAY_LIVE_SETTINGS',0),
	"securityKey" => env('IPAY_KEY_SETTINGS','demoCHANGED'),
	"vendorID" => env('IPAY_VID_SETTINGS','demo'),
	"cbk" => env('IPAY_CBK_SETTINGS','https://example.com/'),
	"cst" => env('IPAY_CST_SETTINGS',1),
	"crl" => env('IPAY_CRL_SETTINGS',2),	
];