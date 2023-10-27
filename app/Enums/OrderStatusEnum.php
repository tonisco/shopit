<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
	case Pending = 'pending';
	case Created = 'created';
	case Processing = 'processing';
	case Out_For_Delivery = 'out for delivery';
	case Delivered = 'delivered';
	case Cancelled = 'cancelled';

	public static function getColor(string $color): string
	{
		return match ($color) {
			// set colors in app.css
			self::Pending->value => 'gray-badge',
			self::Created->value => 'gray-badge',
			self::Delivered->value => 'green-badge',
			self::Processing->value => 'yellow-badge',
			self::Out_For_Delivery->value => 'blue-badge',
			self::Cancelled->value => 'red-badge',
		};
	}
};
