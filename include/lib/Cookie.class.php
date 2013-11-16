<?php
/**
 * Cookie操作类
 * @author wander
 *
 */
class Cookie {
	var $session_id = '';
	var $_ip = '';
	private $COOKIE_PATH = '/';
	private $COOKIE_DOMAIN = '';
	
	private static $_cookies = array ();
	
	/**
	 * 初始化
	 */
	public static function init() {
		if (! isset ( self::$_cookies )) {
			self::$_cookies = new Cookie ();
		}
		return self::$_cookies;
	}
	
	/**
	 * 初始化
	 */
	function __construct() {
	
	}
	
	/**
	 * 获取用户登录信息
	 */
	public function getUser() {
		$user = array ();
		$userCookie = $this->get ( USER_KEY );
		if (! empty ( $userCookie )) {
			$userInfo = explode ( "\r\n", $userCookie );
			$user = array ('user_id' => $userInfo [0], 
							'user_name' => $userInfo [1], 
						    'real_name' => $userInfo [2], 
						    'mobile' => $userInfo [3], 
						    'email' => $userInfo [4], 
						    'user_desc' => $userInfo [5],
						    'login_time' => $userInfo [6], 
						    'status' => $userInfo [7], 
						    'login_ip' => $userInfo [8], 
						    'user_group' => $userInfo [9],
							'template' => $userInfo [10],
							'shortcuts' => $userInfo [11],
							'show_quicknote' => $userInfo [12],
							'group_id' => $userInfo [13],
							'user_role' => $userInfo [14],
							'shortcuts_arr' => explode ( "\r\n", $userInfo [15] ),
							'setting' => $userInfo [16]
			);
		}
		return $user;
	}
	
	/**
	 * 设置cookie
	 * Enter description here ...
	 * @param string $name
	 * @param string $value
	 * @param int $expirytime 过期时间 默认为0
	 */
	public function add($name, $value, $expirytime = 0) {
		$value = $this->_encrypt ( $value );
		$cookie_path = $this->COOKIE_PATH;
		$cookie_domain = $this->COOKIE_DOMAIN;
		setcookie ( $name, $value, $expirytime, $cookie_path, $cookie_domain );
	}
	
	/**
	 * 获取cookie
	 * Enter description here ...
	 * @param $name
	 */
	public function get($name) {
		$value = isset ( $_COOKIE [$name] ) ? $_COOKIE [$name] : '';
		if (is_array ( $value )) {
			$ret = array();
			foreach ( $value as $key => $val ) {
				$ret [$key] = $this->_decrypt ( $val );
			}
			return $ret;
		} else {
			$value = $this->_decrypt ( $value );
			return $value;
		}
	}
	
	/**
	 * GUID
	 * Enter description here ...
	 */
	public function get_guid() {
		return md5 ( uniqid ( mt_rand (), true ) );
	}
	
	/**
	 * 返回id
	 * Enter description here ...
	 */
	public function get_session_id() {
		return $this->session_id;
	}
	
	function gen_session_id() {
		$this->session_id = $this->get_guid ();
	}
	
	function gen_session_key($session_id) {
		$ip = '';
		if ($ip == '') {
			$ip = substr ( $this->_ip, 0, strrpos ( $this->_ip, '.' ) );
		}
		return sprintf ( '%08x', crc32 ( __DIR__ . $ip . $session_id ) );
	}
	
	/**
	 * 解密已经加密了的cookie
	 *
	 * @param string $encryptedText
	 * @return string
	 */
	public function _decrypt($encryptedText) {
		return $this->authcode ( $encryptedText, 'DECODE' );
	}
	
	/**
	 * 加密cookie
	 *
	 * @param string $plainText
	 * @return string
	 */
	public function _encrypt($plainText) {
		return $this->authcode ( $plainText, 'ENCODE' );
	}
	
	/**
	 * 字符串加密以及解密函数
	 *
	 * @param string $string	原文或者密文
	 * @param string $operation	操作(ENCODE | DECODE), 默认为 DECODE
	 * @param string $key		密钥
	 * @param int $expiry		密文有效期, 加密时候有效， 单位 秒，0 为永久有效
	 * @return string		处理后的 原文或者 经过 base64_encode 处理后的密文
	 *
	 * @example
	 *
	 * $a = authcode('abc', 'ENCODE', 'key');
	 * $b = authcode($a, 'DECODE', 'key');  // $b(abc)
	 *
	 * $a = authcode('abc', 'ENCODE', 'key', 3600);
	 * $b = authcode('abc', 'DECODE', 'key'); // 在一个小时内，$b(abc)，否则 $b 为空
	 */
	private function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
		
		$ckey_length = 4;
		//note 随机密钥长度 取值 0-32;
		//note 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
		//note 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
		//note 当此值为 0 时，则不产生随机密钥
		

		$key = md5 ( $key ? $key : 'cookie_code_wandercookie_code_wandercookie_code_wander' );
		$keya = md5 ( substr ( $key, 0, 16 ) );
		$keyb = md5 ( substr ( $key, 16, 16 ) );
		$keyc = $ckey_length ? ($operation == 'DECODE' ? substr ( $string, 0, $ckey_length ) : substr ( md5 ( microtime () ), - $ckey_length )) : '';
		
		$cryptkey = $keya . md5 ( $keya . $keyc );
		$key_length = strlen ( $cryptkey );
		
		$string = $operation == 'DECODE' ? base64_decode ( substr ( $string, $ckey_length ) ) : sprintf ( '%010d', $expiry ? $expiry + time () : 0 ) . substr ( md5 ( $string . $keyb ), 0, 16 ) . $string;
		$string_length = strlen ( $string );
		
		$result = '';
		$box = range ( 0, 255 );
		
		$rndkey = array ();
		for($i = 0; $i <= 255; $i ++) {
			$rndkey [$i] = ord ( $cryptkey [$i % $key_length] );
		}
		
		for($j = $i = 0; $i < 256; $i ++) {
			$j = ($j + $box [$i] + $rndkey [$i]) % 256;
			$tmp = $box [$i];
			$box [$i] = $box [$j];
			$box [$j] = $tmp;
		}
		
		for($a = $j = $i = 0; $i < $string_length; $i ++) {
			$a = ($a + 1) % 256;
			$j = ($j + $box [$a]) % 256;
			$tmp = $box [$a];
			$box [$a] = $box [$j];
			$box [$j] = $tmp;
			$result .= chr ( ord ( $string [$i] ) ^ ($box [($box [$a] + $box [$j]) % 256]) );
		}
		
		if ($operation == 'DECODE') {
			if ((substr ( $result, 0, 10 ) == 0 || substr ( $result, 0, 10 ) - time () > 0) && substr ( $result, 10, 16 ) == substr ( md5 ( substr ( $result, 26 ) . $keyb ), 0, 16 )) {
				return substr ( $result, 26 );
			} else {
				return '';
			}
		} else {
			return $keyc . str_replace ( '=', '', base64_encode ( $result ) );
		}
	}

}
