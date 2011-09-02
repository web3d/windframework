<?php
/**
 * @author Qian Su <aoxue.1988.su.qian@163.com> 2010-12-22
 * @link http://www.phpwind.com
 * @copyright Copyright &copy; 2003-2110 phpwind.com
 * @license 
 */

/**
 * the last known user to change this file in the repository  <$LastChangedBy$>
 * @author Qian Su <aoxue.1988.su.qian@163.com>
 * @version $Id$ 
 * @package 
 */
class WindValidator {

	/**
	 * 验证是否是电话号码
	 * 国际区号-地区号-电话号码的格式（在国际区号前可以有前导0和前导+号），
	 * 国际区号支持0-4位
	 * 地区号支持0-6位
	 * 电话号码支持4到12位
	 * 
	 * @param string $phone 被验证的电话号码
	 * @return boolean
	 */
	public static function isTelPhone($phone) {
		return 0 < preg_match('/^\+?[0\s]*[\d]{0,4}[\-\s]?\d{0,6}[\-\s]?\d{4,12}$/', $phone);
	}

	/**
	 * 验证是否是手机号码
	 * 国际区号-手机号码
	 *
	 * @param string $number
	 * @return boolean
	 */
	public static function isTelNumber($number) {
		return 0 < preg_match('/^\+?[0\s]*[\d]{0,4}[\-\s]?\d{4,12}$/', $number);
	}

	/**
	 * 验证是否是QQ号码
	 *
	 * @param string $qq
	 * @return boolean
	 */
	public static function isQQ($qq) {
		return 0 < preg_match('/^[1-9]\d{4,14}$/', $qq);
	}

	/**
	 * 验证是否是邮政编码
	 *
	 * @param string $zipcode
	 * @return boolean
	 */
	public static function isZipcode($zipcode) {
		return 0 < preg_match('/^\d{4,8}$/', $zipcode);
	}

	/**
	 * 验证是否是有合法的email
	 * @param string $string  被搜索的 字符串
	 * @param array $matches 会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return boolean
	 */
	public static function hasEmail($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp("/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是合法的email
	 * @param string $string
	 * @return boolean
	 */
	public static function isEmail($string) {
		return 0 < preg_match("/^\w+(?:[-+.']\w+)*@\w+(?:[-.]\w+)*\.\w+(?:[-.]\w+)*$/", $string);
	}

	/**
	 * 验证是否有合法的身份证号
	 * @param string $string  被搜索的 字符串
	 * @param array $matches 会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return boolean
	 */
	public static function hasIdCard($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp("/\d{17}[\d|X]|\d{15}/", $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是合法的身份证号
	 * @param string $string
	 * @return boolean
	 */
	public static function isIdCard($string) {
		return 0 < preg_match("/^(?:\d{17}[\d|X]|\d{15})$/", $string);
	}

	/**
	 * 验证是否有合法的URL
	 * @param string $string  被搜索的 字符串
	 * @param array $matches 会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return boolean
	 */
	public static function hasUrl($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp('/http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/', $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是合法的url
	 * @param string $string
	 * @return boolean
	 */
	public static function isUrl($string) {
		return 0 < preg_match('/^(?:http(?:s)?:\/\/(?:[\w-]+\.)+[\w-]+(?:\:\d+)*+(?:\/[\w- .\/?%&=]*)?)$/', $string);
	}

	/**
	 * 验证是否有中文
	 * @param string $string  被搜索的 字符串
	 * @param array $matches 会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return boolean
	 */
	public static function hasChinese($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp('/[\x{4e00}-\x{9fa5}]+/u', $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是中文
	 * @param string $string
	 * @return boolean
	 */
	public static function isChinese($string) {
		return 0 < preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $string);
	}

	/**
	 * 验证是否有html标记
	 * @param string $string  被搜索的 字符串
	 * @param array $matches 会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return boolean
	 */
	public static function hasHtml($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp('/<(.*)>.*|<(.*)\/>/', $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是合法的html标记
	 * @param string $string
	 * @return boolean
	 */
	public static function isHtml($string) {
		return 0 < preg_match('/^<(.*)>.*|<(.*)\/>$/', $string);
	}

	/**
	 * 验证是否有合法的ipv4地址
	 * @param string $string   被搜索的 字符串
	 * @param array $matches   会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return boolean
	 */
	public static function hasIpv4($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp('/((25[0-5]|2[0-4]\d|1\d{2}|0?[1-9]\d|0?0?\d)\.){3}(25[0-5]|2[0-4]\d|1\d{2}|0?[1-9]\d|0?0?\d)/', $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是合法的IP
	 * @param string $string
	 * @return boolean
	 */
	public static function isIpv4($string) {
		return 0 < preg_match('/(?:(?:25[0-5]|2[0-4]\d|1\d{2}|0?[1-9]\d|0?0?\d)\.){3}(?:25[0-5]|2[0-4]\d|1\d{2}|0?[1-9]\d|0?0?\d)/', $string);
	}

	/**
	 * 验证是否有合法的ipV6
	 *
	 * @param string $string
	 * @param array $matches
	 * @param boolean $ifAll
	 * @return boolean
	 */
	public static function hasIpv6($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp('/\A((([a-f0-9]{1,4}:){6}|
										::([a-f0-9]{1,4}:){5}|
										([a-f0-9]{1,4})?::([a-f0-9]{1,4}:){4}|
										(([a-f0-9]{1,4}:){0,1}[a-f0-9]{1,4})?::([a-f0-9]{1,4}:){3}|
										(([a-f0-9]{1,4}:){0,2}[a-f0-9]{1,4})?::([a-f0-9]{1,4}:){2}|
										(([a-f0-9]{1,4}:){0,3}[a-f0-9]{1,4})?::[a-f0-9]{1,4}:|
										(([a-f0-9]{1,4}:){0,4}[a-f0-9]{1,4})?::
									)([a-f0-9]{1,4}:[a-f0-9]{1,4}|
										(([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.){3}
										([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])
									)|((([a-f0-9]{1,4}:){0,5}[a-f0-9]{1,4})?::[a-f0-9]{1,4}|
										(([a-f0-9]{1,4}:){0,6}[a-f0-9]{1,4})?::
									)
								)\Z/ix', $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是合法的ipV6
	 *
	 * @param string $string
	 * @return boolean
	 */
	public static function isIpv6($string) {
		return 0 < preg_match('/\A(?:(?:(?:[a-f0-9]{1,4}:){6}|
										::(?:[a-f0-9]{1,4}:){5}|
										(?:[a-f0-9]{1,4})?::(?:[a-f0-9]{1,4}:){4}|
										(?:(?:[a-f0-9]{1,4}:){0,1}[a-f0-9]{1,4})?::(?:[a-f0-9]{1,4}:){3}|
										(?:(?:[a-f0-9]{1,4}:){0,2}[a-f0-9]{1,4})?::(?:[a-f0-9]{1,4}:){2}|
										(?:(?:[a-f0-9]{1,4}:){0,3}[a-f0-9]{1,4})?::[a-f0-9]{1,4}:|
										(?:(?:[a-f0-9]{1,4}:){0,4}[a-f0-9]{1,4})?::
									)(?:[a-f0-9]{1,4}:[a-f0-9]{1,4}|
										(?:(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.){3}
										(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])
									)|(?:(?:(?:[a-f0-9]{1,4}:){0,5}[a-f0-9]{1,4})?::[a-f0-9]{1,4}|
										(?:(?:[a-f0-9]{1,4}:){0,6}[a-f0-9]{1,4})?::
									)
								)\Z/ix', $string);
	}

	/**
	 * 验证是否有客户端脚本
	 * @param string $string   被搜索的 字符串
	 * @param array $matches   会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return boolean
	 */
	public static function hasScript($string, &$matches = array(), $ifAll = false) {
		return 0 < self::validateByRegExp('/<script(.*?)>([^\x00]*?)<\/script>/', $string, $matches, $ifAll);
	}

	/**
	 * 验证是否是合法的客户端脚本
	 * @param string $string
	 * @return boolean
	 */
	public static function isScript($string) {
		return 0 < preg_match('/<script(?:.*?)>(?:[^\x00]*?)<\/script>/', $string);
	}

	/**
	 * 判断是否为空
	 * @param string $value
	 * @return boolean
	 */
	public static function isEmpty($value) {
		return empty($value);
	}

	/**
	 * 验证是否是非负整数
	 * @param int $number 
	 * @return boolean
	 */
	public static function isNonNegative($number) {
		return 0 <= (int) $number;
	}

	/**
	 * 验证是否是正数
	 * @param int $number
	 * @return boolean
	 */
	public static function isPositive($number) {
		return 0 < (int) $number;
	}

	/**
	 * 验证是否是负数
	 * @param int $number   
	 * @return boolean
	 */
	public static function isNegative($number) {
		return 0 > (int) $number;
	}

	/**
	 * 判断一个元素是否是数组
	 * @param mixed $array
	 * @return boolean
	 */
	public static function isArray($array) {
		return is_array($array);
	}

	/**
	 * 验证是否是不能为空
	 *
	 * @param mixed $value
	 * @return boolean
	 */
	public static function isRequired($value) {
		return !self::isEmpty($value);
	}

	/**
	 * 判断一个值是否在指定数组中
	 * 
	 * @param mixed $needle
	 * @param array $array
	 * @param boolean $strict
	 * @return boolean
	 */
	public static function inArray($needle, array $array, $strict = true) {
		return in_array($needle, $array, $strict);
	}

	/**
	 * 验证字符串的长度
	 * @param string $string 要验证的字符串
	 * @param string $length 指定的合法的长度
	 * @param string $charset 字符编码
	 * @return boolean
	 */
	public static function isLegalLength($string, $length, $charset = 'utf8') {
		Wind::import('WIND:utility.WindString');
		return WindString::strlen($string, $charset) > (int) $length;
	}

	/**
	 * 在 $string 字符串中搜索与 $regExp 给出的正则表达式相匹配的内容。
	 * @param string $regExp  搜索的规则(正则)
	 * @param string $string  被搜索的 字符串
	 * @param array $matches 会被搜索的结果
	 * @param boolean $ifAll   是否进行全局正则表达式匹配
	 * @return number
	 */
	private static function validateByRegExp($regExp, $string, &$matches = array(), $ifAll = false) {
		if (true === $ifAll) {
			return preg_match_all($regExp, $string, $matches);
		}
		return preg_match($regExp, $string, $matches);
	}

}