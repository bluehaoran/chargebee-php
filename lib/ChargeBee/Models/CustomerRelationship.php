<?php
namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class CustomerRelationship extends Model
{
  protected $allowed = [
      'parent_id',
      'payment_owner_id',
      'invoice_owner_id'
  ];

}