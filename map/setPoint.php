<?php

/**
 * 数据库配置信息
 */
$db_config = array(
		'host' => "localhost", 
		'user' => "root", 
		//'password' => "password", 
		'password' => "root",
		//'database' => "gis"
		'database' => "map"
);
/**
 * flush outputbuffer并将其输出到客户端，可实现即时输出
 * @param unknown_type $str
 */
function qk_echo($str) {
	echo $str;
	ob_flush();//刷新缓存
	flush();
}

/**
 * Helper 类，用于接收http请求并对外提供服务
 */
class Helper{
	private $db_config;
	public function __construct($db_config){
		$this->db_config=$db_config;
	}
	/**
	 * 对外提供api接口
	 * @param method api名称
	 */
	public function do_api(){
		$method=$_GET['method'];
		$result="";
		switch ($method) {
			case 'get_trj':
				# code...
				$result=$this->get_trj();
				break;
			
			default:
				# code...
				break;
		}
		qk_echo($result);	//Response
	}

	/**
	 * 获取轨迹信息，以字符串的形式返回
	 */
	public function get_trj(){
		//初始化数据库连接
		$conn=mysql_connect($this->db_config['host'], $this->db_config['user'],$this->db_config['password']);
		//选择数据库
		@mysql_select_db($this->db_config['database'],$conn);
		$sql="select id,lon,lat,time from gps;";
		
		// 执行sql查询
		$rs=mysql_query($sql,$conn);
    	$result=array();
    	while($row=mysql_fetch_row($rs)){
    		//加入经纬度信息
			//echo $row[1];
    		$result[]=array($row[0],$row[1],$row[2],$row[3]);
    	}
    	//关闭数据集 
    	@mysql_close($rs); 

    	//返回结果
		return json_encode($result);
	}
}

/*$link=mysql_connect("localhost","root","root"); 
if(!$link) echo "FAILD!连接错误，用户名密码不对"; 
else echo "OK!可以连接"; */


$helper=new Helper($db_config);
$helper->do_api();
$helper->get_trj();