<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class SubscriptionItemTier extends Model
{
  protected $allowed = [
		'item_price_id',
		'starting_unit',
		'ending_unit',
		'price',
		'starting_unit_in_decimal',
		'ending_unit_in_decimal',
		'price_in_decimal'
	];
}
