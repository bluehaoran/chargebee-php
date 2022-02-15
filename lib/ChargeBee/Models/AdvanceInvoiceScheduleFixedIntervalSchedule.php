<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class AdvanceInvoiceScheduleFixedIntervalSchedule extends Model
{
  protected $allowed = [
		'end_schedule_on',
		'number_of_occurrences',
		'days_before_renewal',
		'end_date',
		'created_at',
		'terms_to_charge'
	];
}
