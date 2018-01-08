<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       echo 'Api';
    }
    public function post(){
    	header("Access-Control-Allow-Origin: *");
    	$data = file_get_contents("php://input");
    	$url = 'http://192.168.6.214:8080/CCP/rest/api/v1/formpost';
    	// $data = array();
    	// $data['name'] = 'Tom';
    	// $data['age'] = '12';
    	// $json_data = json_encode($data);
    	$curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
        	array(
	        	'Content-Type: application/json; charset=utf-8',
	        	'Content-Length:' . strlen($json_data)
	        )
		);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$json_data);
        $result = json_decode(curl_exec($curl),true);
        curl_close($curl);
        return($result);

    }
    public function get(){
    	$url = 'http://192.168.6.214:8080/CCP/rest/api/v1/formget';
    }
}