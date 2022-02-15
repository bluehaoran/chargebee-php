<?php
namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class AdvanceInvoiceSchedule extends Model
{
  protected $allowed = [
		'id',
		'scheduleType',
		'fixedIntervalSchedule',
		'specificDatesSchedule'
	];
	
 }
