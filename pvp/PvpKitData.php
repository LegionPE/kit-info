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

interface PvpKitData{
	const CAT_ARMOR = 0x01000000;
	const SUBCAT_ARMOR_MATERIAL = 0x0000000F;
	const ARMOR_MATERIAL_DIAMOND = 0x00000005;
	const ARMOR_MATERIAL_IRON = 0x00000004;
	const ARMOR_MATERIAL_CHAIN = 0x00000003;
	const ARMOR_MATERIAL_GOLD = 0x00000002;
	const ARMOR_MATERIAL_LEATHER = 0x00000001;
	const ARMOR_MATERIAL_SHIFT_BITS = 0;
	const SUBCAT_ARMOR_SLOT = 0x00000030;
	const ARMOR_SLOT_HELMET = 0x00000000;
	const ARMOR_SLOT_CHESTPLATE = 0x00000010;
	const ARMOR_SLOT_LEGGINGS = 0x00000020;
	const ARMOR_SLOT_BOOTS = 0x00000030;
	const CAT_REAL = 0x02000000;
	const SUBCAT_REAL_ACTUAL_ITEM = 0x00100000;
	const ACTUAL_ITEM_ID = 0x0000FFFF;
	const SUBCAT_REAL_SPECIAL_ITEM = 0x00200000;
	const SPECIAL_KNOCKAWAY_BOMB = 0x00000001;
	const SPECIAL_SPEED = 0x00000002;
	const SPECIAL_SLOW_BOMB = 0x00000003;
	const SPECIAL_NAUSEA_BOMB = 0x00000004;
	const SPECIAL_JUMP = 0x00000005;
	const SPECIAL_INVISIBILITY = 0x00000006;
	const SPECIAL_STRENTH = 0x00000007;
	const SPECIAL_WEAKNESS_BOMB = 0x00000008;
	const SPECIAL_RESISTANCE = 0x00000009;
	const SPECIAL_VULNERABILITY_BOMB = 0x0000000A;
	const SPECIAL_OXYGEN = 0x0000000B;
	const SPECIAL_FIRE_RESISTANCE = 0x0000000C;
	const SPECIAL_REGENERATION = 0x0000000D;
	const SPECIAL_POISON_BOMB = 0x0000000E;
	const SPECIAL_WITHER_BOMB = 0x0000000F;
	const SPECIAL_DIARRHEA_BOMB = 0x00000010; // eating heals less
	const CAT_ABSTRACT = 0x04000000;
	const CAT_ABSTRACT_EFFECT = 0x04100000;
	const SUBCAT_ABSTRACT_EFFECT_ID = 0x000000FF;
	const CAT_ABSTRACT_ENCHANT = 0x04200000;
	const ENCHANT_FIRE_SWORD = 0x00000001;
	const ENCHANT_FLAME_BOW = 0x00000002;
	const ENCHANT_STRIKER_SWORD = 0x00000003;
	const ENCHANT_KNOCKBACK_BOW = 0x00000003;
	const ENCHANT_ELECTRIC_SWORD = 0x00000004;
	const ENCHANT_MAGNETIC_ARROW = 0x00000006;
	const ENCHANT_DIAMOND_CRUSHER_SWORD = 0x00000005;
	const ENCHANT_CARBON_FLATTENER = 0x00000007;
	const ENCHANT_STICKY_ARMOR = 0x00000010; // increase cooldown
	const ENCHANT_THORNED_ARMOR = 0x00000020;
	const ENCHANT_NAILED_BOOTS = 0x00000030;
	const ENCHANT_PARACHUTE_HELMET = 0x000000040;
	const AMPLITUDE_NIL = -1;

	const FIRE_SWORD_TICKS = [
		0 => 20,
		1 => 40,
		2 => 60,
		3 => 80
	];
	const FLAME_BOW_TICKS = [
		0 => 40,
		1 => 70,
		2 => 120,
		3 => 160
	];
	const STRIKER_SWORD_AMPLIFIER = [
		0 => 1.4,
		1 => 1.6,
		2 => 1.8,
		3 => 1.0,
		4 => 2.2
	];
	const KNOCKBACK_BOW_AMPLIFIER = [
		0 => 1.2,
		1 => 1.6,
		2 => 2.2,
		3 => 3.0,
		4 => 4.0
	];
	const ELECTRIC_SWORD_AMPLIFIER = [
		0 => 0.3,
		1 => 0.6,
		2 => 0.9,
		3 => 1.2,
		4 => 1.5
	];
	const MAGNETIC_ARROW_AMPLIFIER = [
		0 => 0.5,
		1 => 0.7,
		2 => 0.9,
		3 => 1.1
	];
	const DIAMOND_CRUSHER_SWORD_AMPLIFIER = [
		0 => 0.3,
		1 => 0.6,
		2 => 0.9,
		3 => 1.2,
		4 => 1.5
	];
	const CARBON_FLATTENER_ARROW_AMPLIFIER = [
		0 => 0.5,
		1 => 0.7,
		2 => 0.9,
		3 => 1.1
	];
	const STICKY_ARMOR_COOLDOWN = [
		self::AMPLITUDE_NIL => 0.5, // default value
		0 => 0.55,
		1 => 0.6,
		2 => 0.7,
		3 => 0.75,
		4 => 0.8
	];
	const FORTUNE_DOUBLE_CHANCE = [
		0 => 20,
		1 => 40,
		2 => 60,
		3 => 80
	];
	const THORNED_ARMOR_CHANCE = [
		0 => 20,
		1 => 40,
		2 => 60,
		3 => 80,
		4 => 100
	];
	const NAILED_BOOTS_AMPLIFIER = [
		0 => 0.7,
		1 => 0.5,
		2 => 0.4,
		3 => 0.2,
		4 => 0
	];
	const PARACHUTE_HELMET_AMPLIFIER = [
		0 => 0.5,
		1 => 0.3,
		2 => 0.1
	];
	const THORNED_ARMOR_CHARGEBACK_RATE = 0.3;
}
