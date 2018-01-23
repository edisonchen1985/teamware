<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       echo 'Api';
    }
    public function tm_post(){
    	header("Access-Control-Allow-Origin: *");
    	$data = file_get_contents("php://input");
    	$data_array = json_decode($data,true);
    	$url = $data_array['apiUrl'];
    	// $url = 'http://192.168.6.214:8080/CCP/rest/api/v1/formpost';
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
	        	'Content-Length:' . strlen($data)
	        )
		);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        $result = json_decode(curl_exec($curl),true);
        curl_close($curl);
        echo json_encode($result);

    }
    public function file_tree(){
        header("Access-Control-Allow-Origin: *");
        $data = file_get_contents("php://input");
        $data_array = json_decode($data,true);
        $url = $data_array['apiUrl'];
        // $url = 'http://192.168.6.214:8080/CCP/rest/api/v1/formpost';
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
                'Content-Length:' . strlen($data)
            )
        );
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        $result = json_decode(curl_exec($curl),true);
        curl_close($curl);
        echo json_encode($result);

    }
    public function tm_get(){
    	$url = 'http://192.168.6.214:8080/CCP/rest/api/v1/formget';
    }
}