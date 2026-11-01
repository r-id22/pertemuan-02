<?php
declare(strict_types=1);

enum Predikat: string
{
    case CUMLAUDE = 'Cumlaude';
    case SANGAT_MEMUASKAN = 'Sangat Memuaskan';
    case MEMUASKAN = 'Memuaskan';

    public function label(): string
    {
        return match($this) {
            self::CUMLAUDE => 'Cumlaude',
            self::SANGAT_MEMUASKAN => 'Sangat Memuaskan',
            self::MEMUASKAN => 'Memuaskan',
        };
    }
}
