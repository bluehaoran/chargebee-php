<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class QuotedSubscriptionItemTier extends Model
{
  protected $allowed = [
		'item_price_id',
		'starting_unit',
		'ending_unit',
		'price'
	];
}
