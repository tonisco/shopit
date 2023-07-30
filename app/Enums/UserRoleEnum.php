<?php

namespace App\Enums;

enum UserRoleEnum: string
{
	case Admin = 'admin';
	case Vendor = 'vendor';
	case User = 'user';
}
