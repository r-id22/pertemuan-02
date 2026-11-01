<?php
declare(strict_types=1);

enum Semester: string
{
    case GANJIL = 'ganjil';
    case GENAP = 'genap';

    public function label(): string
    {
        return match($this) {
            self::GANJIL => 'Semester Ganjil',
            self::GENAP => 'Semester Genap',
        };
    }
}
