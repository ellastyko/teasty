<?php

namespace App\Enum;

class ReceiptStatus extends Enum
{
    const DRAFT = 'draft';

    const PROCESSING = 'processing';

    const ACTIVE = 'active';

    const BANNED = 'banned';

    const DELETED = 'deleted';

    /**
     * @return int[]
     */
    public static function all(): array
    {
        return [
            self::DRAFT,
            self::PROCESSING,
            self::ACTIVE,
            self::BANNED,
            self::DELETED,
        ];
    }
}
