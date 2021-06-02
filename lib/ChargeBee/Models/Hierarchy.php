<?php
namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class Hierarchy extends Model
{

  protected $allowed = [
      'parentId',
      'paymentOwnerId',
      'invoiceOwnerId',
      'customerId',
      'childrenIds'
  ];

  # OPERATIONS
  #-----------
}