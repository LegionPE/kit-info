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

use libtheta\info\KitInfo;
use pocketmine\item\Item;

if(!defined("STDERR")){
	define("STDERR", fopen("php://stderr", "wt"));
}

abstract class PvpKitInfo extends KitInfo implements PvpKitData{
	/** @var PvpKitInfo[] */
	public static $_ = [];
	/** @var int */
	private $id;
	/** @var int */
	private $amplitude;
	/** @var int */
	private $count;
	protected function __construct($id, $amplitude, $count){
		$this->id = $id;
		$this->amplitude = $amplitude;
		$this->count = $count;
		self::register($this);
	}
	public function getIncreasables(){
		return [];
	}
	public function getUpgrades(){
		return [];
	}
	public function canLengthen(){
		return true;
	}
	/**
	 * @return int
	 */
	public function getId(){
		return $this->id;
	}
	/**
	 * @return int
	 */
	public function getAmplitude(){
		return $this->amplitude;
	}
	/**
	 * @return int
	 */
	public function getCount(){
		return $this->count;
	}
	public static function register(self $info){
		self::$_[] = $info;
	}
	public static function init(){
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_GOLD, self::ARMOR_SLOT_HELMET);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_GOLD, self::ARMOR_SLOT_CHESTPLATE);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_GOLD, self::ARMOR_SLOT_LEGGINGS);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_GOLD, self::ARMOR_SLOT_BOOTS);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_CHAIN, self::ARMOR_SLOT_HELMET);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_CHAIN, self::ARMOR_SLOT_CHESTPLATE);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_CHAIN, self::ARMOR_SLOT_LEGGINGS);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_CHAIN, self::ARMOR_SLOT_BOOTS);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_IRON, self::ARMOR_SLOT_HELMET);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_IRON, self::ARMOR_SLOT_CHESTPLATE);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_IRON, self::ARMOR_SLOT_LEGGINGS);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_IRON, self::ARMOR_SLOT_BOOTS);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_DIAMOND, self::ARMOR_SLOT_HELMET);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_DIAMOND, self::ARMOR_SLOT_CHESTPLATE);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_DIAMOND, self::ARMOR_SLOT_LEGGINGS);
		new PvpArmorKitInfo(self::ARMOR_MATERIAL_DIAMOND, self::ARMOR_SLOT_BOOTS);
		new PvpSwordKitInfo(PvpSwordKitInfo::WOODEN_SWORD);
		new PvpSwordKitInfo(PvpSwordKitInfo::STONE_SWORD);
		new PvpSwordKitInfo(PvpSwordKitInfo::IRON_SWORD);
		new PvpSwordKitInfo(PvpSwordKitInfo::DIAMOND_SWORD);
		for($level = 1; $level <= 10; $level++){
			new PvpFoodKitInfo($level, 32);
			new PvpFoodKitInfo($level, 64);
		}
		new PvpGenericKitInfo(Item::ARROW, 0, 16, "16 Arrows", 150);
		new PvpGenericKitInfo(Item::ARROW, 0, 32, "32 Arrows", 300);
		new PvpGenericKitInfo(Item::ARROW, 0, 64, "64 Arrows", 450);
		new PvpClickableKitInfo(self::SPECIAL_KNOCKBACK_BOMB, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_KNOCKBACK_BOMB, 1, 2);
		new PvpClickableKitInfo(self::SPECIAL_KNOCKBACK_BOMB, 0, 4);
		new PvpClickableKitInfo(self::SPECIAL_KNOCKBACK_BOMB, 1, 4);
		new PvpClickableKitInfo(self::SPECIAL_SPEED, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_SPEED, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_SPEED, 2, 1);
		new PvpClickableKitInfo(self::SPECIAL_SLOW_BOMB, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_SLOW_BOMB, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_SLOW_BOMB, 2, 1);
		new PvpClickableKitInfo(self::SPECIAL_NAUSEA_BOMB, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_NAUSEA_BOMB, 1, 2);
		new PvpClickableKitInfo(self::SPECIAL_NAUSEA_BOMB, 2, 2);
		new PvpClickableKitInfo(self::SPECIAL_NAUSEA_BOMB, 3, 2);
		new PvpClickableKitInfo(self::SPECIAL_NAUSEA_BOMB, 4, 2);
		new PvpClickableKitInfo(self::SPECIAL_JUMP, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_JUMP, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_JUMP, 2, 1);
		new PvpClickableKitInfo(self::SPECIAL_INVISIBILITY, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_INVISIBILITY, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_INVISIBILITY, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_INVISIBILITY, 1, 2);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 0, 3);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 1, 2);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 1, 3);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 2, 1);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 2, 2);
		new PvpClickableKitInfo(self::SPECIAL_STRENGTH, 2, 3);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 0, 3);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 1, 2);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 1, 3);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 2, 1);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 2, 2);
		new PvpClickableKitInfo(self::SPECIAL_WEAKNESS_BOMB, 2, 3);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 0, 3);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 1, 2);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 1, 3);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 2, 1);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 2, 2);
		new PvpClickableKitInfo(self::SPECIAL_RESISTANCE, 2, 3);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 0, 3);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 1, 2);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 1, 3);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 2, 1);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 2, 2);
		new PvpClickableKitInfo(self::SPECIAL_VULNERABILITY_BOMB, 2, 3);
		new PvpClickableKitInfo(self::SPECIAL_OXYGEN, 0, 1);
		new PvpClickableKitInfo(self::SPECIAL_OXYGEN, 0, 2);
		new PvpClickableKitInfo(self::SPECIAL_OXYGEN, 1, 1);
		new PvpClickableKitInfo(self::SPECIAL_OXYGEN, 1, 2);
	}
	public static function get($id, $amp, $cnt){
		foreach(self::$_ as $info){
			if($info->getId() === $id and $info->getAmplitude() === $amp and $info->getCount() === $cnt){
				return $info;
			}
		}
		return null;
	}
}
