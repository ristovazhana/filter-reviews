<?
$result = file_get_contents($curl);

var_dump(json_decode($result, true));
?>