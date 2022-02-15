<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class SubscriptionChargedItem extends Model
{
  protected $allowed = [
		'item_price_id',
		'last_charged_at'
	];
}
