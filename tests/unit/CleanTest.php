<?php

namespace CodeBrandCleaner;

use Codeception\Configuration;

class CleanTest extends \PHPUnit_Framework_TestCase {

	/**
	 * [codeProvider description]
	 * @return [type] [description]
	 */
	public function providerCleanCode() {

		$config = Configuration::config();
		$res = file_get_contents($config['paths']['data'].'/clean_code.json');
		$array = json_decode($res, true);

		/*
		$codes = array(
			array('ŸADB1736', 'ADB1736'),
			array('незамерзайка', ''),
			array('﻿﻿63705a', '63705A'),
			array(array(), ''),
			array(new \stdClass, '')
		);*/
		return $array;
	}

	/**
	 * @dataProvider providerCleanCode
	 */
	public function testCleanCode($code, $etalon) {
		
		$this->assertEquals($etalon, Clean::code($code));
		
		
	}

	
	public function providerCleanBrand() {

		$config = Configuration::config();
		$res = file_get_contents($config['paths']['data'].'/clean_brand.json');
		$array = json_decode($res, true);
		
		/*
		$array = array(
			array(' HANGLASS(GEN)', 'HANGLASS GEN'),
			array('DS(HD)', 'DS HD'),
			array('JAEIL-E', 'JAEIL E'),
			array('AGC Karosserie', 'AGC KAROSSERIE'),
			array('R&A', 'R A'),
			array('ALFA/FIAT/LANCIA', 'ALFA FIAT LANCIA'),
			array('FIAT / LANCIA', 'FIAT LANCIA'),
			array('O.E._FIAT', 'OE FIAT'),
			array(' B+K', 'B K'),
			array('Ford\ÐÐµÐ¾Ñ€Ð¸Ð³Ð¸Ð½Ð°Ð»\AVA', 'FORD AVA'),
			array('Â AUTOWELT', 'AUTOWELT'), //AUTOWELT
			array('AUWÃ„RTER', 'AUWRTER'), //Auwärter
			array('BUCHER SchÃ¶rling', 'BUCHER SCHRLING'), //Bucher Schörling? //совпадет по синонимам
			array('DRÃ–GMÃ–LLER', 'DRGMLLER'), //DRÖGMÖLLER
			array('LÃ–BRO', 'LBRO'), //LÖBRO
			array('LUOÂ´S', 'LUOS'), //???
			array('Ocap Ð˜Ñ‚Ð°Ð».', 'OCAP'),
			array('KÃ–GEL', 'KGEL'), //KÖGEL
			array('LEMFÖRDER', 'LEMFORDER'),
			array('lemförder', 'LEMFORDER'),
			array('  A   A   ', 'A A')
		);
		*/
		


		return $array;
	}

	/**
	 * @dataProvider providerCleanBrand
	 */
	public function testCleanBrand($brand, $etalon) {
		$this->assertEquals(Clean::brand($brand), $etalon);
	}
}
