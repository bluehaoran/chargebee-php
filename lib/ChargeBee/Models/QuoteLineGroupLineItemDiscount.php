<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class QuoteLineGroupLineItemDiscount extends Model
{
  protected $allowed = array(
      'line_item_id',
      'discount_type',
      'coupon_id',
      'discount_amount'
  );

}