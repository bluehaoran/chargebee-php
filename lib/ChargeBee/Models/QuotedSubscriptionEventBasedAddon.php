<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class QuotedSubscriptionEventBasedAddon extends Model
{
  protected $allowed = array('id', 'quantity', 'unit_price', 'service_period_in_days', 'on_event', 'charge_once', 'quantity_in_decimal', 'unit_price_in_decimal');

}
