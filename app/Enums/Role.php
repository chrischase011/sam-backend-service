<?php

namespace App\Enums;

enum Role: string
{
    case Superadmin = 'superadmin';
    case Admin = 'admin';
    case User = 'user';
    case Guest = 'guest';
}
