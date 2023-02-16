<?php
/*
 *  Copyright 2022.  Baks.dev <admin@baks.dev>
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *   limitations under the License.
 *
 */

declare(strict_types=1);

namespace BaksDev\Reference\Clothing\Type;

/** Размер одежды (2XS ... 4XL) */
final class SizeClothing
{
	
	public const TYPE = 'size_clothing_type';
	
	private SizeClothingEnum $type;
	
	
	public function __construct(string|SizeClothingEnum $type)
	{
		
		if($type instanceof SizeClothingEnum)
		{
			$this->type = $type;
		}
		else
		{
			$this->type = SizeClothingEnum::from($type);
		}
	}
	
	
	public function __toString() : string
	{
		return $this->type->value;
	}
	
	
	public function getValue() : string
	{
		return $this->type->value;
	}
	
	
	public function getType() : SizeClothingEnum
	{
		return $this->type;
	}
	
	
	public function getName() : string
	{
		return $this->type->name;
	}
	
	
	public static function cases() : array
	{
		$case = null;
		
		foreach(SizeClothingEnum::cases() as $local)
		{
			$case[] = new self($local);
		}
		
		return $case;
		
	}
	
}