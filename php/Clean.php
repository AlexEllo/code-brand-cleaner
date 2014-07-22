<?php

namespace CodeBrandCleaner;

class Clean {
	
	/**
	 * Карта замен.
	 * http://www.pjb.com.au/comp/diacritics.html
	 * Ö = \xD6
	 * ö = \xF6
	 * 
	 * @var string
	 */
	private static $a = "abcdefghijklmnopqrstuvwxyz/+-_()&\xD6\xF6\\";

	/**
	 * Карта замен.
	 * 
	 * @var string
	 */
	private static $b = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ       OO ';
	
	/**
	 * Очистка кода от примесей.
	 * 
	 * @param string $str Строка.
	 * 
	 * @return string
	 */
	public static function code($str) {
		
		if (is_array($str) || is_object($str)) {
			return '';
		}

		// такая проверка дает небольшой прирост производительности
		if (!preg_match('#^[A-Z0-9]+$#', $str)) {
			$str = preg_replace('#[^A-Z0-9]#i', '', $str);
			$str = strtoupper($str);
		}
		
		return strval($str);
	}
	
	/**
	 * Очистка кода от примесей.
	 * 
	 * @param strin $str Строка.
	 * 
	 * @return string
	 */
	public static function brand($str) {
		
		$str = utf8_encode(strtr(utf8_decode($str), self::$a, self::$b));

		$str = preg_replace('#[^A-Z0-9\s]#i', '', $str);
		$str = preg_replace('#^\s+|(?<=\s)\s+|\s+$#', '', $str); // Заменяет все двойные пробелы на 1, и удаляет лишние пробелы в начале и в конце строки
		//$str = trim(preg_replace('/\s+/', ' ', $str));
		
		
		
		return strval($str);
	}

}
