<?php
error_reporting(E_ALL || ~E_NOTICE);

$link = mysql_connect('localhost', 'root', 'root');

if (!$link) {

    echo "fail";

}

mysql_select_db("map");
set_time_limit( 0 );
ob_implicit_flush();
$socket = socket_create( AF_INET, SOCK_DGRAM, SOL_UDP );

if ( $socket === false ) {
    echo "socket_create() failed:reason:" . socket_strerror( socket_last_error() ) . "\n";
}

$ok = socket_bind( $socket, '0.0.0.0', 9999);

if ( $ok === false ) {
    echo "socket_bind() failed:reason:" . socket_strerror( socket_last_error( $socket ) );
}
while ( true ) {

    $from = "";
    $port = 0;
    socket_recvfrom( $socket, $buf,1024, 0, $from, $port );

	


	
//插入数据库
	if (strlen($buf)>10){
		date_default_timezone_set('PRC');
		//$sql = "insert into gps(time,lat,lon) values('$time','$lat','$lon')";
		//$result = @mysql_query($sql);
		//echo $time;
		$preg= '/Lat.*?(?=READ)/';
		preg_match_all($preg,$buf,$res);
		if($res[0][0] != NULL){
			echo $time=date("Y-m-d H:i:s");
			echo "  Lat/Lon: ".$res[0][0];
			echo "\n";
			$lat = convert(substr($res[0][0],4,8));
			$lon = convert(substr($res[0][0],-9));
			$sql = "insert into gps(time,lat,lon) values('$time','$lat','$lon')";
			$result = @mysql_query($sql);
			
		}
	}
    usleep(1000);
}

function convert($str) {
    $arr = explode('.', $str);
	$sum = $arr[0] + $arr[1] / 60.0 + $arr[2] /3600;
    return round($sum,6);
}			
?>