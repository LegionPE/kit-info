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

class PvpArmorKitInfo extends PvpKitInfo{
	const BASE_PRICE = 1;
	protected function __construct($material, $slot){
		parent::__construct(self::CAT_ARMOR | $material | $slot, 0, 1);
	}
	public function getUpgardes(){
		$out = [];
		foreach(self::$_ as $info){
			if($info instanceof PvpArmorKitInfo and $info->getSlot() === $this->getSlot() and $info->getMaterial() > $this->getMaterial()){
				$out[] = $info;
			}
		}
		return $out;
	}
	public function getMaterial(){
		return $this->getId() & self::SUBCAT_ARMOR_MATERIAL;
	}
	public function getSlot(){
		return $this->getId() & self::SUBCAT_ARMOR_SLOT;
	}
	public function getMaterialName(){
		switch($this->getMaterial()){
			case self::ARMOR_MATERIAL_LEATHER:
				return "Leather";
			case self::ARMOR_MATERIAL_GOLD:
				return "Gold";
			case self::ARMOR_MATERIAL_CHAIN:
				return "Chain";
			case self::ARMOR_MATERIAL_IRON:
				return "Iron";
			case self::ARMOR_MATERIAL_DIAMOND:
				return "Diamond";
		}
		return "";
	}
	public function getSlotName(){
		switch($this->getSlot()){
			case self::ARMOR_SLOT_HELMET:
				return "Helmet";
			case self::ARMOR_SLOT_CHESTPLATE:
				return "Chestplate";
			case self::ARMOR_SLOT_LEGGINGS:
				return "Leggings";
			case self::ARMOR_SLOT_BOOTS:
				return "Boots";
		}
		return "Armor";
	}
	public function name(){
		return $this->getMaterialName() . " " . $this->getSlotName();
	}
	public function getHourPrice(){
		$slotFactor = 1;
		switch($this->getSlot()){
			case self::ARMOR_SLOT_HELMET:
				$slotFactor = 5;
				break;
			case self::ARMOR_SLOT_CHESTPLATE:
				$slotFactor = 8;
				break;
			case self::ARMOR_SLOT_LEGGINGS:
				$slotFactor = 7;
				break;
			case self::ARMOR_SLOT_BOOTS:
				$slotFactor = 4;
				break;
		}
		$material = $this->getMaterial() >> self::ARMOR_MATERIAL_SHIFT_BITS;
		$slotFactor *= ($material ** 2) * self::BASE_PRICE;
		return $slotFactor;
	}
}
