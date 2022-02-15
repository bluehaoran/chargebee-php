<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class PaymentIntentPaymentAttempt extends Model
{
  protected $allowed = [
		'id',
		'status',
		'payment_method_type',
		'id_at_gateway',
		'error_code',
		'error_text',
		'created_at',
		'modified_at'
	];
}