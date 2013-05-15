<?php
    
    //Using the Bitly and Twilio APIs to create a Bitly Search via SMS tool.
    //SMS a search term to a phone number and get the top Bitly Search result with title, source and a shortened link.

    $access_token = ""; //Insert your bitly access token from https://bitly.com/a/oauth_apps
    
    $qry = urlencode($_REQUEST['Body']); //Get the search terms from the SMS
    $sms = "";
    
    // Use the v3/search Bitly API endpoint to get the top search result - http://dev.bitly.com/data_apis.html#v3_search
    $uri = file_get_contents("https://api-ssl.bitly.com/v3/search?access_token=".$access_token."&limit=1&fields=aggregate_link%2Ctitle%2Cdomain&query=".$qry, 
        true);
    
    $obj = json_decode($uri);
    
    //Extract the web page title, source domain, and shortened link from the results.
    if (isset($obj->data->results[0]->title))
        $sms = $obj->data->results[0]->title." - ".$obj->data->results[0]->aggregate_link." (from ".$obj->data->results[0]->domain.")";
    else $sms = "No results for your query.  Sorry.";

    //Convert the response to XML usable by Twilio to respond back with the results
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Sms><?php echo $sms; ?></Sms>
</Response>