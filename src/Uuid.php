<?php

namespace Eve\Uuid;

use Ramsey\Uuid\Uuid as BaseUuid;

class Uuid
{
    private static ?string $frozenValue;

    /**
     * "Freeze" the UUID to an (optional) value, useful for testing.
     * Any subsequent call to Uuid::generate() will return the "frozen" value, until Uuid::unfreeze() is called.
     *
     * @param string|null $value The frozen value. Auto-generated as a new UUID if null.
     */
    public static function freeze(?string $value = null): string
    {
        self::$frozenValue = $value ?: BaseUuid::uuid4()->toString();

        return self::$frozenValue;
    }

    public static function unfreeze(): void
    {
        self::$frozenValue = null;
    }

    public static function generate(): string
    {
        return self::$frozenValue ?? BaseUuid::uuid4()->toString();
    }
}
