<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
	case Pending = 'pending';
	case Created = 'created';
	case Processing = 'processing';
	case Out_For_Delivery = 'out for delivery';
	case Delivered = 'delivered';
};
