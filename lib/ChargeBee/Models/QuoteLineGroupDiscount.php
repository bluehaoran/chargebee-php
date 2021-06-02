<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class QuoteLineGroupDiscount extends Model
{
  protected $allowed = array(
      'amount',
      'description',
      'entity_type',
      'entity_id'
  );

}