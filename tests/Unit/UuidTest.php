<?php

namespace Tests\Unit;

use Eve\Uuid\Uuid;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    public function testFreezeWithoutFixedValue(): void
    {
        $uuid = Uuid::freeze();
        self::assertSame($uuid, Uuid::generate());

        Uuid::unfreeze();
        self::assertNotSame($uuid, Uuid::generate());
    }

    public function testFreezeWithFixedValue(): void
    {
        Uuid::freeze('foo');
        self::assertSame('foo', Uuid::generate());

        Uuid::unfreeze();
        self::assertNotSame('foo', Uuid::generate());
    }

    public function testHelperFunction(): void
    {
        $uuid = Uuid::freeze();
        self::assertSame($uuid, uuid());

        Uuid::unfreeze();
        self::assertNotSame($uuid, uuid());

        Uuid::freeze('foo');
        self::assertSame('foo', uuid());

        Uuid::unfreeze();
        self::assertNotSame('foo', uuid());
    }
}
