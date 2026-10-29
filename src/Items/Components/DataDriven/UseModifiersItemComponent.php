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

namespace Nexly\Items\Components\DataDriven;

use Attribute;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\StringTag;

/**
 * @since 1.20.50
 */
#[Attribute(Attribute::TARGET_CLASS)]
class UseModifiersItemComponent extends DataDrivenItemComponent
{
	/**
	 * @param bool    $emitVibrations Requires format version 1.21.120 or later.
	 * @param ?string $startSound     Custom sound names require format version 1.26.50 or later.
	 * @param ?string $startUsing     Requires format version 1.26.30 or later.
	 */
	public function __construct(
		protected float $duration,
		protected ?float $movementModifier = null,
		protected bool $emitVibrations = true,
		protected ?string $startSound = null,
		protected ?string $startUsing = null,
	) {
	}

	/**
	 * The name of the component.
	 */
	public static function getName() : string
	{
		return DataDrivenComponentIds::USE_MODIFIERS->getValue();
	}

	/**
	 * Build the NBT tag for this component.
	 */
	public function toNBT() : CompoundTag
	{
		$nbt = CompoundTag::create()
			->setTag("use_duration", new FloatTag($this->duration));

		if ($this->movementModifier !== null) {
			$nbt->setTag("movement_modifier", new FloatTag($this->movementModifier));
		}
		if (!$this->emitVibrations) {
			$nbt->setTag("emit_vibrations", new ByteTag(false));
		}
		if ($this->startSound !== null) {
			$nbt->setTag("start_sound", new StringTag($this->startSound));
		}
		if ($this->startUsing !== null) {
			$nbt->setTag("start_using", new StringTag($this->startUsing));
		}

		return $nbt;
	}
}
