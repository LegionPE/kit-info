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

namespace libtheta\info;

abstract class KitInfo{
	const ONE_DAY = 3;
	const THREE_DAYS = 4;
	const ONE_WEEK = 5;
	const ONE_MONTH = 6;
	public function getPrice($duration){
		$p = $this->getHourPrice();
		switch($duration){
			case self::ONE_DAY:
				return $p * 18; // 25% off
			case self::THREE_DAYS:
				return $p * 50; // 30% off
			case self::ONE_WEEK:
				return $p * 100; // 40% off
			case self::ONE_MONTH:
				return $p * 360; // 50% off
		}
		return $p;
	}
	public static function durationToSecs($duration){
		switch($duration){
			case self::ONE_DAY:
				return 86400;
			case self::THREE_DAYS:
				return 259200;
			case self::ONE_WEEK:
				return 604800;
			case self::ONE_MONTH:
				return 2592000;
		}
		return 0;
	}
	public abstract function getHourPrice();
	public abstract function getIncreasables();
	public abstract function getUpgrades();
	public abstract function getId();
	public abstract function getAmplitude();
	public abstract function getCount();
	public abstract function name();
	public abstract function canLengthen();
}
