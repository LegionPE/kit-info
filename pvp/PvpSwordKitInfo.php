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

class PvpSwordKitInfo extends PvpKitInfo{
	const WOODEN_SWORD = 1;
	const STONE_SWORD = 2;
	const IRON_SWORD = 3;
	const DIAMOND_SWORD = 4;
	const BASE_PRICE = 500;
	private $materialId;
	protected function __construct($materialId){
		parent::__construct(self::CAT_REAL | self::SUBCAT_REAL_ACTUAL_ITEM | $this->getItemIdByMaterialId($this->materialId = $materialId), 0, 1);
	}
	public static function getItemIdByMaterialId($materialId){
		switch($materialId){
			case self::WOODEN_SWORD:
				return Item::WOODEN_SWORD;
			case self::STONE_SWORD:
				return Item::STONE_SWORD;
			case self::IRON_SWORD:
				return Item::IRON_SWORD;
			case self::DIAMOND_SWORD:
				return Item::DIAMOND_SWORD;
		}
		return 0;
	}
	public static function getMaterialIdByItemId($itemId){
		switch($itemId){
			case Item::WOODEN_SWORD:
				return self::WOODEN_SWORD;
			case Item::STONE_SWORD:
				return self::STONE_SWORD;
			case Item::IRON_SWORD:
				return self::IRON_SWORD;
			case Item::DIAMOND_SWORD:
				return self::DIAMOND_SWORD;
		}
		return 0;
	}
	public function getUpgrades(){
		$out = [];
		foreach(self::$_ as $info){
			if($info instanceof self and $info->getMaterialId() > $this->getMaterialId()){
				$out[] = $info;
			}
		}
		return $out;
	}
	public function name(){
		$base = "Sword (level $this->materialId sword)";
		switch($this->materialId){
			case self::WOODEN_SWORD:
				return "Wooden $base";
			case self::STONE_SWORD:
				return "Stone $base";
			case self::IRON_SWORD:
				return "Iron $base";
			case self::DIAMOND_SWORD:
				return "Diamond $base";
		}
		return $base;
	}
	/**
	 * @return int
	 */
	public function getMaterialId(){
		return $this->materialId;
	}
	public function getHourPrice(){
		return 5 ** (($this->materialId - 1) / 2);
	}
}
