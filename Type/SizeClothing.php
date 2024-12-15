<?php
/*
 *  Copyright 2024.  Baks.dev <admin@baks.dev>
 *  
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is furnished
 *  to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 */

declare(strict_types=1);

namespace BaksDev\Reference\Clothing\Type;

use BaksDev\Reference\Clothing\Type\Sizes\Collection\SizeClothingInterface;

/** Размер одежды (2XS ... 4XL) */
final class SizeClothing
{
    public const string TYPE = 'size_clothing_type';

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
                    $this->size = new $class();
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
            $sizes = new $size();
            $case[$sizes::priority().$key] = new self($sizes);
        }

        ksort($case);

        return $case;
    }


    public static function getDeclaredSizes(): array
    {
        return array_filter(
            get_declared_classes(),
            static function ($className) {
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
