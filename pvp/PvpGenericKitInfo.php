<?php

/*
 * libtheta
 *
 * Copyright (C) 2015 PEMapModder and contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PEMapModder
 */

namespace libtheta\info\pvp;

class PvpGenericKitInfo extends PvpKitInfo{
	/** @var string */
	private $name;
	/** @var int */
	private $hourPrice;
	public function __construct($id, $damage, $count, $name, $hourPrice){
		parent::__construct(self::CAT_REAL | self::SUBCAT_REAL_ACTUAL_ITEM | $id, $damage, $count);
		$this->name = $name;
		$this->hourPrice = $hourPrice;
	}
	public function getIncreasables(){
		$out = [];
		foreach(self::$_ as $info){
			if($info instanceof self and $info->getAmplitude() === $this->getAmplitude() and $info->getCount() > $this->getCount()){
				$out[] = $info;
			}
		}
		return $out;
	}
	public function name(){
		return $this->name;
	}
	public function getHourPrice(){
		return $this->hourPrice;
	}
}
