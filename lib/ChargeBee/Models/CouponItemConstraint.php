<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class CouponItemConstraint extends Model
{
  protected $allowed = [
		'item_type',
		'constraint',
		'item_price_ids'
	];
}
