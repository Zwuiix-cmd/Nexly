<?php

/*
 *  _   _           _
 * | \ | | _____  _| |_   _
 * |  \| |/ _ \ \/ / | | | |
 * | |\  |  __/>  <| | |_| |
 * |_| \_\___/_/\_\_|\__, |
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
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use function array_map;

/**
 * @since 1.26.60
 */
#[Attribute(Attribute::TARGET_CLASS)]
class NeighborChangeBlockComponent extends BlockComponent
{
	/**
	 * @param list<string> $neighborDirections
	 */
	public function __construct(
		protected array $neighborDirections = ["all"],
	) {
	}

	public function getName() : string
	{
		return BlockComponentIds::NEIGHBOR_CHANGE;
	}

	public function toNBT() : CompoundTag
	{
		return CompoundTag::create()->setTag(
			"neighbor_directions",
			new ListTag(array_map(static fn (string $direction) => new StringTag($direction), $this->neighborDirections), NBT::TAG_String),
		);
	}
}
