
<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://embedsocial.com/admin/v2/api/reviews?reviews_ref=0d44e0b0a245de6fc9651f870d8b44efc4653184");
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Accept: application/json",
        "Content-Type: application/json; charset=utf-8", 
        "Authorization: Bearer escfe7569d859dd903d77664e9983edf"
    ));

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    
    //var_dump(json_decode($result, true));
    //echo $result;
    $resultDecoded = json_decode($result);
    $reviewsArray = $resultDecoded->reviews;

    return $reviewsArray;
?>