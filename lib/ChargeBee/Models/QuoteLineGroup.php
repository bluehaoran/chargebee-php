<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class QuoteLineGroup extends Model
{

  protected $allowed = array(
      'version',
      'id',
      'subTotal',
      'total',
      'creditsApplied',
      'amountPaid',
      'amountDue',
      'chargeEvent',
      'billingCycleNumber',
      'lineItems',
      'discounts',
      'lineItemDiscounts',
      'taxes',
      'lineItemTaxes'
  );

  # OPERATIONS
  #-----------

}