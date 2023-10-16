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

use BaksDev\Reference\Clothing\Type\Sizes\Collection\SizeClothingInterface;

/** Размер одежды (2XS ... 4XL) */
final class SizeClothing
{

    public const TYPE = 'size_clothing_type';

    private ?SizeClothingInterface $size = null;


    public function __construct(self|string|SizeClothingInterface $size)
    {
        if($size instanceof SizeClothingInterface)
        {
            $this->size = $size;
        }

        if($size instanceof $this)
        {
            $this->size = $size->getSize();
        }

        if(is_string($size))
        {
            /** @var SizeClothingInterface $class */
            foreach(self::getDeclaredSizes() as $class)
            {
                if($class::equals($size))
                {
                    $this->size = new $class;
                    break;
                }
            }
        }

    }


    public function __toString(): string
    {
        return $this->size ? $this->size->getvalue() : '';
    }


    /** Возвращает значение ColorsInterface */
    public function getSize(): SizeClothingInterface
    {
        return $this->size;
    }


    /** Возвращает значение ColorsInterface */
    public function getSizeValue(): string
    {
        return $this->size?->getValue() ?: '';
    }


    public static function cases(): array
    {
        $case = [];

        foreach(self::getDeclaredSizes() as $key => $size)
        {
            /** @var SizeClothingInterface $size */
            $sizes = new $size;
            $case[$sizes::sort().$key] = new self($sizes);
        }

        ksort($case);

        return $case;
    }


    public static function getDeclaredSizes(): array
    {
        return array_filter(
            get_declared_classes(),
            static function($className)
                {
                    return in_array(SizeClothingInterface::class, class_implements($className), true);
                },
        );
    }











    //	private SizeClothingEnum $type;
    //
    //
    //	public function __construct(string|SizeClothingEnum $type)
    //	{
    //
    //		if($type instanceof SizeClothingEnum)
    //		{
    //			$this->type = $type;
    //		}
    //		else
    //		{
    //			$this->type = SizeClothingEnum::from($type);
    //		}
    //	}
    //
    //
    //	public function __toString(): string
    //	{
    //		return $this->type->value;
    //	}
    //
    //
    //	/**
    //	 * @return SizeClothingEnum
    //	 */
    //	public function getSizeClothingEnum() : SizeClothingEnum
    //	{
    //		return $this->type;
    //	}
    //
    //
    //	public function getSizeClothingEnumValue(): string
    //	{
    //		return $this->type->value;
    //	}
    //
    //	public function getSizeClothingEnumName(): string
    //	{
    //		return $this->type->name;
    //	}
    //
    //
    //	public static function cases() : array
    //	{
    //		$case = null;
    //
    //		foreach(SizeClothingEnum::cases() as $local)
    //		{
    //			$case[] = new self($local);
    //		}
    //
    //		return $case;
    //
    //	}

}