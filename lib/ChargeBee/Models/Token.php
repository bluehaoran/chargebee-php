<?php

namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class Token extends Model
{
  protected $allowed = [
		'id',
		'gateway',
		'gatewayAccountId',
		'paymentMethodType',
		'status',
		'idAtVault',
		'vault',
		'ipAddress',
		'createdAt',
		'expiredAt'
	];
}