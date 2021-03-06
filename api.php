
<?php
/*
$url = "https://embedsocial.com/admin/v2/api/reviews?reviews_ref=0d44e0b0a245de6fc9651f870d8b44efc4653184";
$ch = curl_init();
$accesstoken = "escfe7569d859dd903d77664e9983edf";
$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = 'Content-type: application/json';
$headr[] = 'Authorization: Bearer  '.$accesstoken;

curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HTTPGET, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);

curl_close($ch);

var_dump($result, true);
*/


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
var_dump(json_decode($result, true));
echo $result;

// echo <table>
//     <thead></thead>
//     <tbody>
//     for(){
//         <tr>
//             <td> $result.review[0].MinimumReview </td>
//             <td> $result.review[0].LatestReview </td>
//             <td> ... </td>
//             <td> ... </td>
//         </tr>
//     }
//     </tbody>
//     </table>

?>
