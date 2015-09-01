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

use pocketmine\item\Item;

class PvpFoodKitInfo extends PvpKitInfo{
	const BASE_FOOD_PRICE = 2.5;
	const MELON = 1;
	const COOKIE = 2;
	const CARROT = 3;
	const APPLE = 4;
	const BREAD = 5;
	const GRASS_CARP = 6;
	const SALMON = 7;
	const PORKCHOP = 8;
	const CHICKEN_LEG = 9;
	const STEAK = 10;
	private $level;
	public function __construct($level, $count){
		parent::__construct(self::CAT_REAL | self::SUBCAT_REAL_ACTUAL_ITEM | $this->levelToItemId($this->level = $level), $this->levelToItemDamage($level), $count);
	}
	public function name(){
		switch($this->level){
			case self::MELON:
				$item = "Melons";
				break;
			case self::COOKIE:
				$item = "Cookies";
				break;
			case self::CARROT:
				$item = "Carrots";
				break;
			case self::APPLE:
				$item = "Apples";
				break;
			case self::BREAD:
				$item = "Bread";
				break;
			case self::GRASS_CARP:
				$item = "Grass Carp";
				break;
			case self::SALMON:
				$item = "Salmon Fish";
				break;
			case self::PORKCHOP:
				$item = "Porkchop";
				break;
			case self::CHICKEN_LEG:
				$item = "Chicken Legs";
				break;
			case self::STEAK:
				$item = "Beef Steak";
				break;
			default:
				$item = "Food";
		}
		return $this->getCount() . " " . $item . " (level $this->level food)";
	}
	public function levelToItemId($level){
		switch($level){
			case self::MELON:
				return Item::MELON_SLICE;
			case self::COOKIE:
				return Item::COOKIE;
			case self::CARROT:
				return Item::CARROT;
			case self::APPLE:
				return Item::APPLE;
			case self::BREAD:
				return Item::BREAD;
			case self::GRASS_CARP:
				return Item::COOKED_FISH;
			case self::SALMON:
				return Item::COOKED_FISH;
			case self::PORKCHOP:
				return Item::COOKED_PORKCHOP;
			case self::CHICKEN_LEG:
				return Item::COOKED_CHICKEN;
		}
		return 0;
	}
	public function levelToItemDamage($level){
		switch($level){
			case self::SALMON:
				return 1;
		}
		return 0;
	}
	public function getHourPrice(){
		$er = 1 / M_E;
		return self::BASE_FOOD_PRICE * (($this->level + $er) * log($this->level + $er) + $er) * $this->getCount() / 64;
	}
	public function getIncreasables(){
		$out = [];
		foreach(self::$_ as $info){
			if($info instanceof self and $info->getLevel() === $this->level and $info->getCount() > $this->getCount()){
				$out[] = $info;
			}
		}
		return $out;
	}
	public function getUpgrades(){
		$out = [];
		foreach(self::$_ as $info){
			if($info instanceof self and $info->getCount() === $this->getCount() and $info->getLevel() > $this->level){
				$out[] = $info;
			}
		}
		return $out;
	}
	/**
	 * @return int
	 */
	public function getLevel(){
		return $this->level;
	}
}
