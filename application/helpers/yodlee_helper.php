<?php

 function _getErrors($errors){
		$Errors = array();
		foreach ($errors->Error as $key => $value) {
			$Errors []= $value->errorDetail;
		}
		return $Errors; 
	}

	function cobloginss()
	{


$cobrandLogin    =   "sbCobreethima";
$cobrandPassword =   "0da8cee2-778f-4962-8864-0a059bc6b71a";
$response        =   array();

$config = array(			 
	"url_cobrand_login"  => 'https://rest.developer.yodlee.com/services/srest/restserver/v1.0/authenticate/coblogin',
	"cobrand_login"      => array(
		"cobrandLogin"   => $cobrandLogin,
		"cobrandPassword"=> $cobrandPassword
	));

$response_to_request   = Post($config["url_cobrand_login"], $config["cobrand_login"]);

$response = array(
	"isValid"      => true,
	"Body"         => $response_to_request["Body"]
);





return $cobSessionToken=$response['Body']->cobrandConversationCredentials->sessionToken;
}
/***********************CobUser Session Id Ends*****************************/

function getUserToken(){

$cobSessionToken=cobloginss();

/***********************************************************/
## =================== / =======================================
$login           = 'sbMemreethima1';
$password        = 'sbMemreethima1#123';
//$cobSessionToken = $cosession_token;
$response        = array();

$config = array(
	"url_cobrand_login" => 'https://rest.developer.yodlee.com/services/srest/restserver/v1.0/authenticate/login',
	"cobrand_login" => array(
			"login" => $login,
			"password" => $password,
			"cobSessionToken" => $cobSessionToken
		)
);

$response_to_request   = Post($config["url_cobrand_login"], $config["cobrand_login"]);

$isErrorLocalExist     = array_key_exists("Error", $response_to_request);

if($isErrorLocalExist){
	$response = array(
		"isValid"      =>false,
		"ErrorServer"  => $response_to_request["Error"]
	);
} else {
	$response = array(
		"isValid"      => true,
		"Body"         => $response_to_request["Body"]
	);
}

//print_r($response);
 return $userSession_Token=$response['Body']->userContext->conversationCredentials->sessionToken;

}
function getSiteSearch($search){
$cobSessionToken=cobloginss();
$userSession_Token=getUserToken();
/***********************Fetch User Session Id Ends*****************************/


/************************Fetch Search Term Site List Starts************************/
 if($userSession_Token!='' && $cobSessionToken!='')
 {

$response        = array();

$config = array(
	"url" => 'https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/SiteTraversal/searchSite',
	"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"userSessionToken" => $userSession_Token,
			"siteSearchString" => $search
		)
);

$response_to_request   = Post($config["url"], $config["parameters"]);


return $response_to_request;



 }
/**************************Fetch Search Term Site List Ends****************************/




	}


	function getLoginForm($siteIds)
	{

	
$cobSessionToken=cobloginss();
$userSession_Token=getUserToken();	

$response        = array();

$config = array(
	"url" => "https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/SiteAccountManagement/getSiteLoginForm",
	"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"siteId" => $siteIds
		)
);

$response_to_request   = Post($config["url"], $config["parameters"]);

$response_to_request['sessions']=array('cobSessionToken' => $cobSessionToken,'userSessionToken' => $userSession_Token,'siteId' => $siteIds);
return $response_to_request;

	}


	function addSiteAccount1()
	{

		

		$cobSessionToken=cobloginss();
		$userSession_Token=getUserToken();	

		$response        = array();

		$config = array(
			"url" => "https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/SiteAccountManagement/addSiteAccount1",
			"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"userSessionToken" => $userSession_Token,
			"siteId" => $_POST['siteId'],
			"credentialFields[0].valueIdentifier" => $_POST['credentialFields1_valueIdentifier'],
			"credentialFields[0].valueMask" => $_POST['credentialFields1_valueMask'],
			"credentialFields[0].fieldType.typeName" => $_POST['credentialFields1_fieldType_typeName'],
			"credentialFields[0].size" => $_POST['credentialFields1_size'],
			"credentialFields[0].value" => $_POST['credentialFields'][0],
			"credentialFields[0].maxlength" => $_POST['credentialFields1_maxlength'],
			"credentialFields[0].name" => $_POST['credentialFields1_name'],
			"credentialFields[0].displayName" => $_POST['credentialFields1_displayName'],
			"credentialFields[0].isEditable" => $_POST['credentialFields1_isEditable'],
			"credentialFields[0].isOptional" => false,
			"credentialFields[0].isEscaped" => false,
			"credentialFields[0].helpText" => $_POST['credentialFields1_helpText'],
			"credentialFields[0].isOptionalMFA" => false,
			"credentialFields[0].isMFA" => false,


			"credentialFields[1].valueIdentifier" => $_POST['credentialFields2_valueIdentifier'],
			"credentialFields[1].valueMask" => $_POST['credentialFields2_valueMask'],
			"credentialFields[1].fieldType.typeName" => $_POST['credentialFields2_fieldType_typeName'],
			"credentialFields[1].size" => $_POST['credentialFields2_size'],
			"credentialFields[1].value" => $_POST['credentialFields'][1],
			"credentialFields[1].maxlength" => $_POST['credentialFields2_maxlength'],
			"credentialFields[1].name" => $_POST['credentialFields2_name'],
			"credentialFields[1].displayName" => $_POST['credentialFields2_displayName'],
			"credentialFields[1].isEditable" => $_POST['credentialFields2_isEditable'],
			"credentialFields[1].isOptional" => false,
			"credentialFields[1].isEscaped" => false,
			"credentialFields[1].helpText" => $_POST['credentialFields2_helpText'],
			"credentialFields[1].isOptionalMFA" => false,
			"credentialFields[1].isMFA" => false,

			"credentialFields.enclosedType" => 'com.yodlee.common.FieldInfoSingle'
		)
		);




		$response_to_request   = Post($config["url"], $config["parameters"]);
		return $response_to_request;

	}





	function getUserAccounts()
	{

	
 $cobSessionToken=cobloginss();
 $userSession_Token=getUserToken();	

$response        = array();

$config = array(
	"url" => "https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/SiteAccountManagement/getAllSiteAccounts",
	"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"userSessionToken" => $userSession_Token
		)
);

$response_to_request   = Post($config["url"], $config["parameters"]);

return $response_to_request;

	}


function getItemSummariesWithoutItemData()
	{
 $cobSessionToken=cobloginss();
 $userSession_Token=getUserToken();	
	

$response        = array();

$config = array(
	"url" => "https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/DataService/getItemSummariesWithoutItemData",
	"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"userSessionToken" => $userSession_Token
		

		)
);

$response_to_request   = Post($config["url"], $config["parameters"]);

return $response_to_request;

	}

function getItemSummariesForSite($siteAccountId)
	{
 $cobSessionToken=cobloginss();
 $userSession_Token=getUserToken();	
	

$response        = array();

$config = array(
	"url" => "https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/DataService/getItemSummariesForSite",
	"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"userSessionToken" => $userSession_Token,
			"memSiteAccId" => $siteAccountId
		

		)
);

$response_to_request   = Post($config["url"], $config["parameters"]);

return $response_to_request;

	}

	function getUserTransacions()
	{

	
$cobSessionToken=cobloginss();
$userSession_Token=getUserToken();	

$response        = array();

$config = array(
	"url" => "https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/TransactionSearchService/executeUserSearchRequest",
	"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"userSessionToken" => $userSession_Token,
			"transactionSearchRequest.containerType" => 'insurance',
			"transactionSearchRequest.higherFetchLimit" => '500',
			"transactionSearchRequest.lowerFetchLimit" => '1',
			"transactionSearchRequest.resultRange.endNumber" => '5',
			"transactionSearchRequest.resultRange.startNumber" => '1',
			"transactionSearchRequest.searchFilter.currencyCode" => 'USD',
			"transactionSearchRequest.ignoreUserInput" => 'true'
		)
);

$response_to_request   = Post($config["url"], $config["parameters"]);

$response_to_request['sessions']=array('cobSessionToken' => $cobSessionToken,'userSessionToken' => $userSession_Token,'siteId' => $siteIds);
return $response_to_request;

	}

	function getRegister()
	{

	
$cobSessionToken=cobloginss();
//$userSession_Token=getUserToken();	

$response        = array();

$config = array(
	"url" => "https://rest.developer.yodlee.com/services/srest/restserver/v1.0/jsonsdk/UserRegistration/register3",
	"parameters" => array(
			"cobSessionToken" => $cobSessionToken,
			"userCredentials.loginName" => 'preethip',
			"userCredentials.password" => 'preethip@123',
			"userCredentials.objectInstanceType" => 'com.yodlee.ext.login.PasswordCredentials',
			"userProfile.emailAddress" => 'preethip@solivarindia.com'
		)
);

$response_to_request   = Post($config["url"], $config["parameters"]);

return $response_to_request;

	}






	 function Post( $url, $parameters = array() ) {


	 $serviceBaseUrl = "https://rest.developer.yodlee.com/services/srest/restserver/v1.0";
	// Url for get the value cobSessionToken for the user.
	$URL_COBRAND_SESSION_TOKEN = "/authenticate/coblogin";
	// Url for get the value userSessionToken for the user.
	$URL_USER_SESSION_TOKEN = "/authenticate/login";
	// Url for get search Site
	$URL_SEARCH_SITES = "/jsonsdk/SiteTraversal/searchSite";
	// Url for get Site Login Form
	$URL_GET_SITE_LOGIN_FORM = "/jsonsdk/SiteAccountManagement/getSiteLoginForm";
	// Url for get itemSummaries
	$URL_GET_ITEM_SUMMARIES = "/jsonsdk/DataService/getItemSummaries";
    // Url Site Account Management: addSiteAccount 
	$URL_ADD_SITE_ACCOUNT = "/jsonsdk/SiteAccountManagement/addSiteAccount";	



		$return_values = array();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 360);

		if(count($parameters)>0){
			curl_setopt($ch, CURLOPT_POST, count($parameters));
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
		}

		$response = curl_exec($ch);
		if (curl_errno($ch)) {
               $return_values['Error'] = "Failed to reach $url.";
        } else {
			if ($response) {
				if(gettype($response) == "string"){
					$result = json_decode($response);
					if($result){
						$exitsError = array_key_exists("Error", $result);
						if($exitsError){
							$return_values["Body"] = self::_getErrors($result);
						}else{
							$return_values["Body"] = $result;
						}
					}else{
						$result = simplexml_load_string($response);
						$return_values["Body"] = $response;
					}
	        	}else{
	        		$result = json_decode($response);
	        		if($result === null) {
						$return_values['Body'] = "The request does not return any value.";
					} else {
						$return_values["Body"] = $result;
					}
	        	}
			}else{
				$return_values['Error'] = "Failed to reach $url.";
			}
        }
		curl_close($ch);
		return $return_values;
	}
?>