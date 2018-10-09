<?php

error_reporting(E_ALL || ~E_NOTICE);

$link = mysql_connect('localhost', 'root', 'root');

if (!$link) {

    echo "fail";

}

mysql_select_db("map");

$result = mysql_query("select id,lon,lat,time from gps order by id desc limit 25");

class Gps

{

    public $id;

    public $time1;

    public $lon;
	
	public $lat;

}

$data = array();

while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

    $gps = new Gps();

    $gps->id = $row["id"];

    $gps->time1 = $row["time"];

    $gps->lon = $row["lon"];
	
	$gps->lat = $row["lat"];

    $data[] = $gps;

}

$json = json_encode($data);

echo $json;