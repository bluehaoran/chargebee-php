<?php
namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class InvoiceDunningAttempt extends Model
{
  protected $allowed = array(
      'attempt',
      'transaction_id',
      'dunning_type',
      'created_at',
      'txn_status',
      'txn_amount'
  );

}