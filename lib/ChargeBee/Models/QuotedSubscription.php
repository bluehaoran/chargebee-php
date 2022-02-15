<?php
namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class QuotedSubscription extends Model
{
  protected $allowed = [
		'id',
		'planId',
		'planQuantity',
		'planUnitPrice',
		'setupFee',
		'billingPeriod',
		'billingPeriodUnit',
		'startDate',
		'trialEnd',
		'remainingBillingCycles',
		'poNumber',
		'autoCollection',
		'addons',
		'eventBasedAddons',
		'coupons',
		'subscriptionItems',
		'itemTiers'
	];
 }
