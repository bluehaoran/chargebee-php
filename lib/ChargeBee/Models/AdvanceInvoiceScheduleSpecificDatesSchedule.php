<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class AdvanceInvoiceScheduleSpecificDatesSchedule extends Model
{
  protected $allowed = [
		'terms_to_charge',
		'date', 'created_at'
	];
}
