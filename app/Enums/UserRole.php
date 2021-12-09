<?php
namespace App\Enums;

class UserRole
{
    const ADMIN = 'admin';
    const USER = 'user';
    const KID = 'kid';

    const TYPES = [
        self::ADMIN,
        self::USER,
        self::KID
    ];
}
