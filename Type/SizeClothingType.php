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

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use InvalidArgumentException;

final class SizeClothingType extends StringType
{

    public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        return $value instanceof SizeClothing ? $value->getSize() : $value;
    }
    

    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {

        /** @var SizeClothing $size */
        foreach(SizeClothing::cases() as $size)
        {
            if($size->getSizeValue() === $value)
            {
                return $size;
            }
        }

        throw new InvalidArgumentException(sprintf('Not found Size Clothing %s', $value));

    }


    public function getName(): string
    {
        return SizeClothing::TYPE;
    }


    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

}