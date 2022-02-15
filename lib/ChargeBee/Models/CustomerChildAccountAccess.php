<?php
namespace ChargeBee\ChargeBee\Models;

use ChargeBee\ChargeBee\Model;

class CustomerChildAccountAccess extends Model
{
  protected $allowed = [
		'portal_edit_subscriptions',
		'portal_download_invoices',
		'send_subscription_emails',
		'send_invoice_emails',
		'send_payment_emails'
  ];
}