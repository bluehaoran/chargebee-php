<?php

namespace ChargeBee\ChargeBee\Models;
use ChargeBee\ChargeBee\Request;
use ChargeBee\ChargeBee\Util;

class ItemPriceAccountingDetail extends Model
{
  	protected $allowed = [
		'sku',
		'accounting_code',
		'accounting_category1',
		'accounting_category2'
  	];
}

?>