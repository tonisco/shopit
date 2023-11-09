<?php

namespace App\Enums;

enum VendorRequestStatusEnum: string
{
	case Approved = 'approved';
	case Pending = 'pending';
	case Rejected = 'rejected';
}
