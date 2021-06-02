<?php
namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class CustomerParentAccountAccess extends Model
{
  protected $allowed = [
      'portal_edit_child_subscriptions',
      'portal_download_child_invoices',
      'send_subscription_emails',
      'send_invoice_emails',
      'send_payment_emails'
  ];

}