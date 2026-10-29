<?php

/*
 *  _   _           _
 * | \ | | _____  _| |_   _
 * |  \| |/ _ \ \/ / | | | |
 * | |\  |  __/>  <| | |_| |
 * |_| \_|\___/_/\_\_|\__, |
 *                    |___/
 *
 * Nexly - A modern PocketMine-MP framework for custom blocks and items.
 *
 * This project is free software: you can redistribute it and/or modify
 * it under the terms of the Apache License, Version 2.0 as published by
 * the Apache Software Foundation.
 *
 * @author Zwuiix-cmd
 * @link   https://github.com/Zwuiix-cmd/Nexly
 *
 *
 */

namespace Nexly\Blocks\Components;

use Attribute;
use InvalidArgumentException;
use Nexly\Blocks\Components\Types\LiquidRule;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use function array_map;

/**
 * @since 1.21.60
 */
#[Attribute(Attribute::TARGET_CLASS)]
class LiquidDetectionComponent extends BlockComponent
{
	/**
	 * @param LiquidRule[] $rules
	 */
	public function __construct(
		protected array $rules,
	) {
		if (empty($this->rules)) {
			throw new InvalidArgumentException("minecraft:liquid_detection requires at least one detection rule.");
		}
	}

	/**
	 * Defines how this block behaves when detecting liquid.
	 */
	public function getName() : string
	{
		return BlockComponentIds::LIQUID_DETECTION;
	}

	/**
	 * Returns the component in the correct NBT format supported by the client.
	 */
	public function toNBT() : CompoundTag
	{
		return CompoundTag::create()
			->setTag("detectionRules", new ListTag(array_map(fn (LiquidRule $rule) => $rule->toNBT(), $this->rules), NBT::TAG_Compound));
	}
}
