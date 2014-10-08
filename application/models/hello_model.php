<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );
 
require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/Entities/SignedRequest.php' );
 
require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookOtherException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphSessionInfo.php' );
 
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;
 
use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;
 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;

class Hello_model extends CI_Model{
    
    public function getFbSession(){
        //Set facebook session and access token. 
        //IMPORTANT: ALWAYS include session_start() and all 'require_once's, as well the "use" calls
        session_start();
        FacebookSession::setDefaultApplication('829952907056927', '101eb0fb8c1edeaea38fbfb2c174b39e');
        //echo "done!<br>";
        
        //$session = FacebookSession::newAppSession();
        $session = FacebookSession::newAppSession('829952907056927', '101eb0fb8c1edeaea38fbfb2c174b39e');
        //$session = new FacebookSession('829952907056927|7rvB2UYHyLq97Bo2bzUvR3lHGPc');
        
        //echo "i'm here!<br>";
        
        try {  //check if established session and assigned token is valid.
        $session->validate();
      } catch (FacebookRequestException $ex) {
        // Session not valid, Graph API returned an exception with the reason.
        echo $ex->getMessage();
      } catch (\Exception $ex) {
        // Graph API returned info, but it may mismatch the current app or have expired.
        echo $ex->getMessage();
      }
      
      //echo $session->getToken();  //prints out current session token. OK
      //echo "here..<br>";
      //Make request
      try {
        $token = $session->getToken(); //get session's app token to use in request
        //echo $token."<br>";
        //$params = array('access_token'=>$token, 'q'=>'athens', 'type'=>'place');
        $params = array('q'=>'athens', 'type'=>'place', 'longitude' => 23.756772881171, 'latitude' => 37.931111569246);  
        $response = (new FacebookRequest($session, 'GET', '/search', $params))->execute();
        //$object = $response->getGraphObject();
        //$arrayResult = $object->asArray();
        $arrayResult = json_decode($response->getRawResponse(), true);
        echo count($arrayResult['data'])."<br>";
        $count = count($arrayResult['data']);
        for($i=0; $i<$count; $i++){
            print_r($arrayResult['data'][$i]['category_list'][0]['name']);
            echo "<br>";
            print_r($arrayResult['data'][$i]['category']);
            echo "<br>";
            if(array_key_exists('country' , $arrayResult['data'][$i]['location'])){
                print_r($arrayResult['data'][$i]['location']['country']);
                echo "<br>";
            }
            if(array_key_exists('city' , $arrayResult['data'][$i]['location'])){
                print_r($arrayResult['data'][$i]['location']['city']);
                echo "<br>";
            }
            print_r($arrayResult['data'][$i]['location']['latitude']);
            echo "<br>";
            print_r($arrayResult['data'][$i]['location']['longitude']);
            echo "<br>";
            print_r($arrayResult['data'][$i]['name']);
            echo "<br>";echo "<br>";echo "<br>";
        }
        //print_r($arrayResult['data'][100]['category_list'][0]);
      } catch (FacebookRequestException $ex) {
        echo $ex->getMessage();
      } catch (\Exception $ex) {
        echo $ex->getMessage();
      }
      
      
    }
    
}

?>