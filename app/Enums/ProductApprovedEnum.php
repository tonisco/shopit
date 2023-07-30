<?php

namespace App\Enums;

enum ProductApprovedEnum: string
{
	case Pending = 'pending';
	case Approved = 'approved';
	case Rejected = 'rejected';
}
