<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;


class CouponItemConstraintCriteria extends Model
{
  protected $allowed = array('item_type', 'currencies', 'item_family_ids', 'item_price_periods');

}
