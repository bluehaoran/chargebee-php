using System;
using System.Globalization;
using System.IO;
using System.Text;

using ChargeBee.Api;
using ChargeBee.Models;
using ChargeBee.Models.Enums;

namespace Examples
{

	public class Snippets
	{

		public void Configure()
		{
			//ApiConfig.Configure("cbprod3-test", "7xXe3SGFHq4SlqEUKOA7adHEcuERvGcu3a");
			//ApiConfig.Proto = "http";
			//ApiConfig.DomainSuffix = "localcb.com:8080";
			ApiConfig.Configure("rrcb-test", "jaGdadHeCQxfmFQG2sEgSrzHdyt23cwcd");
		}

		public void TestSerializeEvent()
		{
			Event e = new Event(@"{
						    'id': 'ev_8avWjOLGCcwL4',
						    'occurred_at': 1317407414,
						    'source': 'system',
						    'object': 'event',
						    'content': {
						        'customer': {
						            'id': '8avWjOLGCcfp2',
						            'first_name': 'Benjamin',
						            'last_name': 'Ross',
						            'email': 'Benjamin@test.com',
						            'auto_collection': 'on',
						            'created_at': 1317407413,
						            'object': 'customer',
						            'card_status': 'valid'
						        },
						        'card': {
						            'customer_id': '8avWjOLGCcfp2',
						            'status': 'valid',
						            'gateway': 'chargebee',
						            'iin': '411111',
						            'last4': '1111',
						            'card_type': 'visa',
						            'expiry_month': 1,
						            'expiry_year': 2016,
						            'object': 'card',
						            'masked_number': '************1111'
						        }
						    },
						    'event_type': 'card_added',
						    'webhook_status': 'not_configured'
						}");
			Console.Write(e.Id);
		}

		public void TestListEvents()
		{
			ListResult result = FetchEventsList(null);
			String _nextOffset = "";
			Console.WriteLine("At\t\t\t\t\tEvent\t\t\t\tId\t\t\t\tWebhook");
			int i=0;
			while (_nextOffset != null && i++<3)
			{
				foreach(var item in result.List)
				{
					Event evt = item.Event;
					Console.WriteLine("{0}\t{1}\t{2}\t{3}",evt.OccurredAt, evt.EventType, evt.Id, evt.WebhookStatus);
				}
				result = FetchEventsList(_nextOffset);
				_nextOffset = result.NextOffset;

				//Subscription subs = evnt.Content.Subscription;
				//Console.WriteLine(subs);
			}
		}
		
		private ListResult FetchEventsList(string _offset)
		{
			Event.EventListRequest _listReq =  Event.List().Limit(10);
			if(_offset != null)
			{
				_listReq.Offset(_offset);
			}
			return _listReq.Request();
		}
		
		public void TestRetrieveEvent()
		{
			Event evt = Event.Retrieve("ev_IsLMimiO0BjMT3B8").Request().Event;
			Console.WriteLine(evt.WebhookStatus);
		}
		
		public void TestCreateSubscription()
		{
			string planId = "enterprise_half_yearly";
			
			EntityResult result = Subscription.Create()
				.PlanId(planId)
					.CustomerEmail("john@user.com")
					.CustomerFirstName("John")
					.CustomerLastName("Wayne")
					.AddonId(1, "on_call_support").Request();
			
			Subscription subs = result.Subscription;
		}
		
		public void TestListSubscriptions()
		{
			ListResult result = Subscription.List().Request();
			foreach (var item in result.List)
			{
				Subscription subs = item.Subscription;
				Console.WriteLine("{0}\t\t{1}\t\t{2}\t\t{3}", subs.Id, subs.CreatedAt, subs.ActivatedAt, subs.CancelledAt);
			}
		}
		
		public void TestRetrieveSubscriptions()
		{
			/*EntityResult result = Subscription.Create().PlanId("enterprise_half_yearly").Request();
			Subscription subs1 = result.Subscription;
			Console.WriteLine ("new sub is " + subs1.Id);*/

			EntityResult result = Subscription.Retrieve("HuBHde1OCOADMts0").Request();
			Subscription subs2 = result.Subscription;
			if(result.Customer.BillingAddress != null)
			{
				Console.WriteLine(result.Customer.BillingAddress.Country());
			}
			if(result.Subscription.Coupons != null)
			{
				foreach(var cpn in result.Subscription.Coupons)
				{
					Console.WriteLine(cpn.CouponId());
					//Console.WriteLine(cpn);
				}
			}
			Console.WriteLine(subs2.PlanId);
		}

		public void TestRetrieveInvoice()
		{
			EntityResult result = Invoice.Retrieve("6369").Request();
			Invoice invoice = result.Invoice;
			foreach(var li in invoice.LineItems)
			{
				Console.WriteLine("{0}\t{1}\t{2}\t{3}",li.UnitAmount(), li.EntityType(), li.LineItemType(), li.EntityId());

				//Console.WriteLine(item.EntityId);
				//Console.WriteLine(item.EntityType);
				//Console.WriteLine(item.LineItemType);
//				Console.WriteLine(li.UnitAmount);
				Console.WriteLine (li);
			}
		}

		public void TestUpdateSubscription()
		{
			EntityResult result = Subscription.Create().PlanId("enterprise_half_yearly").Request();
			Subscription subs1 = result.Subscription;

			Subscription.UpdateRequest r = Subscription.Update(subs1.Id).
				PlanId("basic").
					AddonId(1, "on_call_support").
					CardGateway(GatewayEnum.PaypalPro);
			result = r.Request();
			
			Subscription subs2 = result.Subscription;
		}
		
		public void TestCancelSubscription()
		{
			EntityResult result = Subscription.Create().PlanId("enterprise_half_yearly").Request();
			Subscription subs1 = result.Subscription;

			result = Subscription.Cancel(subs1.Id).Request();
			
			Subscription subs2 = result.Subscription;
		}

		public void TestHostedPageCheckout()
		{
			EntityResult result = HostedPage.CheckoutNew().SubscriptionPlanId("professional").Request();
			HostedPage hp = result.HostedPage;
			Console.WriteLine(hp.Url);
		}

		public void TestDiacritics()
		{
			Subscription.CreateRequest cReq = Subscription.Create().PlanId("basic").CustomerFirstName("Petr").CustomerLastName("Šrámek");
			EntityResult result = cReq.Request();
			Subscription subs1 = result.Subscription;
			
			result = Subscription.Cancel(subs1.Id).Request();
			
			Subscription subs2 = result.Subscription;
		}

		public void TestCustomFields() 
		{
			EntityResult result = Subscription.Retrieve("active_direct").Request();
			Subscription s = result.Subscription;
			Customer c = result.Customer;
			Console.WriteLine(c);
			Console.WriteLine(c.GetValue<String>("cf_mobile_number", false));
			Console.WriteLine(c.GetValue<String>("cf_domicile", false));
			//Console.WriteLine(subs2.PlanId);
		}

		public static void Main(string[] args) 
		{
			Snippets s = new Snippets();
			s.Configure ();
//			s.TestRetrieveSubscriptions();
			//s.TestRetrieveInvoice();
			//s.TestCustomFields();
			//s.TestListSubscriptions();
			//s.TestListEvents();
			s.TestSerializeEvent();
			//s.TestRetrieveEvent();
			//s.TestHostedPageCheckout();
			//s.TestDiacritics();
		}
		

	}
}
