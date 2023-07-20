<?php
function CurlOperation($url)
{
    $curl = curl_init();

    // Set the cURL options

    curl_setopt($curl, CURLOPT_URL, $url); // Set the URL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response instead of printing it

    // Execute the cURL request
$response = @curl_exec($curl);

    // Check for errors
    if(curl_errno($curl)) {
        $error_message = curl_error($curl);
        // Handle the error appropriately
    }

    // Close the cURL session
    curl_close($curl);

    // Process the response
    $array = json_decode($response, true);
    return $array;
}

function RFA($array)
{
	echo '<pre>';
   echo print_r($array, true);
   echo '</pre>';

}

?>