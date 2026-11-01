<?php
declare(strict_types=1);

enum Predikat: string
{
    case CUMLAUDE = 'cumlaude';
    case SANGAT_MEMUASKAN = 'sangat_memuaskan';
    case MEMUASKAN = 'memuaskan';

    public function label(): string
    {
        return match($this) {
            self::CUMLAUDE => 'Cumlaude',
            self::SANGAT_MEMUASKAN => 'Sangat Memuaskan',
            self::MEMUASKAN => 'Memuaskan',
        };
    }
}
