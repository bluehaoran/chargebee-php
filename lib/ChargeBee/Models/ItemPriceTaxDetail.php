<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class ItemPriceTaxDetail extends Model
{
  protected $allowed = [
		'tax_profile_id',
		'avalara_sale_type',
		'avalara_transaction_type',
		'avalara_service_type',
		'avalara_tax_code',
		'taxjar_product_code'
	];
}
