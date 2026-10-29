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

namespace Nexly\Blocks\Components\Types;

class PrecipitationType
{
	public const OBSTRUCT_RAIN = "obstruct_rain";
	public const OBRAIN = self::OBSTRUCT_RAIN;
	public const OBSTRUCT_RAIN_ACCUMULATE_SNOW = "obstruct_rain_accumulate_snow";
	public const ACCUMULATE_SNOW = self::OBSTRUCT_RAIN_ACCUMULATE_SNOW;
	public const SNOW_LOGGING = "snowlogging";
	public const NONE = "none";
}
