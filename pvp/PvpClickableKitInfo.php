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

use legionpe\theta\utils\MUtils;

class PvpClickableKitInfo extends PvpKitInfo{
	/** @var int */
	private $typeId;
	public function __construct($type, $amplitude, $count){
		parent::__construct(self::CAT_REAL | self::SUBCAT_REAL_SPECIAL_ITEM | $type, $amplitude, $count);
		$this->typeId = $type;
	}
	public function getHourPrice(){
		return $this->getBaseHourPrice() * $this->getAmplitude() * $this->getCount();
	}
	public function getBaseHourPrice(){
		switch($this->typeId){
			case self::SPECIAL_KNOCKBACK_BOMB:
				return 0;
		}
		return 0;
	}
	public function name(){
		return $this->getCount() . " " . $this->getTypeName() . " (" . MUtils::romanic_number($this->getAmplitude() + 1) . ") (button)";
	}
	public function getTypeName(){
		switch($this->typeId){
			case self::SPECIAL_KNOCKBACK_BOMB:
				return "Knockback bomb";
			case self::SPECIAL_SPEED:
				return "Speed";
		}
		return "unknown";
	}
	/**
	 * @return int
	 */
	public function getTypeId(){
		return $this->typeId;
	}
	public function isBomb(){
		switch($this->typeId){
			case self::SPECIAL_SLOW_BOMB:
			case self::SPECIAL_NAUSEA_BOMB:
			case self::SPECIAL_WEAKNESS_BOMB:
			case self::SPECIAL_VULNERABILITY_BOMB:
			case self::SPECIAL_POISON_BOMB:
			case self::SPECIAL_WITHER_BOMB:
			case self::SPECIAL_DIARRHEA_BOMB:
				return true;
		}
		return false;
	}
	public function getRadius(){
		if(!$this->isBomb()){
			return 0;
		}
		switch($this->typeId){
			case self::SPECIAL_SLOW_BOMB:
				return 4 + $this->getAmplitude();
			case self::SPECIAL_NAUSEA_BOMB:
				return 6 + $this->getAmplitude();
			case self::SPECIAL_WEAKNESS_BOMB:
				return 4 + $this->getAmplitude();
			case self::SPECIAL_VULNERABILITY_BOMB:
				return 4 + $this->getAmplitude() / 2;
			case self::SPECIAL_POISON_BOMB:
				return 2 + $this->getAmplitude();
			case self::SPECIAL_WITHER_BOMB:
				return 2 + $this->getAmplitude() / 2;
			case self::SPECIAL_DIARRHEA_BOMB:
				return 4 + $this->getAmplitude();
		}
		return 0;
	}
	/**
	 * @return int in ticks
	 */
	public function getDuration(){
		switch($this->typeId){
			case self::SPECIAL_SPEED:
				return 200 + $this->getAmplitude() * 40;
			case self::SPECIAL_SLOW_BOMB:
				return 100 + $this->getAmplitude() * 20;
			case self::SPECIAL_NAUSEA_BOMB:
				return 150 + $this->getAmplitude() * 20;
			case self::SPECIAL_JUMP:
				return 100 + $this->getAmplitude() * 20;
			case self::SPECIAL_INVISIBILITY:

		}
		return 0;
	}
}
