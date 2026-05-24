<?php

namespace App\Enums;

class StatusEnum
{
    const PENDING = 'pending';
    const IN_PROGRESS = 'in_progress';
    const COMPLETED = 'completed';

    public static function values()
    {
        return [
            self::PENDING,
            self::IN_PROGRESS,
            self::COMPLETED,
        ];
    }
}