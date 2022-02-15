<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class InvoiceIssuedCreditNote extends Model
{
	protected $allowed = [
		'cn_id',
		'cn_reason_code',
		'cn_date',
		'cn_total',
		'cn_status',
	];
}
