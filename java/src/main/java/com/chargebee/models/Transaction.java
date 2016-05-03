package com.chargebee.models;

import com.chargebee.*;
import com.chargebee.internal.*;
import com.chargebee.filter.*;
import com.chargebee.internal.HttpUtil.Method;
import com.chargebee.models.enums.*;
import org.json.*;
import java.io.*;
import java.sql.Timestamp;
import java.util.*;

public class Transaction extends Resource<Transaction> {

    public enum Type {
        AUTHORIZATION,
        PAYMENT,
        REFUND,
        PAYMENT_REVERSAL,
        _UNKNOWN; /*Indicates unexpected value for this enum. You can get this when there is a
        java-client version incompatibility. We suggest you to upgrade to the latest version */
    }

    public enum Status {
        IN_PROGRESS,
        SUCCESS,
        VOIDED,
        FAILURE,
        TIMEOUT,
        NEEDS_ATTENTION,
        _UNKNOWN; /*Indicates unexpected value for this enum. You can get this when there is a
        java-client version incompatibility. We suggest you to upgrade to the latest version */
    }

    public static class LinkedInvoice extends Resource<LinkedInvoice> {
        public LinkedInvoice(JSONObject jsonObj) {
            super(jsonObj);
        }

        public String invoiceId() {
            return reqString("invoice_id");
        }

        public Integer appliedAmount() {
            return reqInteger("applied_amount");
        }

        public Timestamp appliedAt() {
            return reqTimestamp("applied_at");
        }

        public Timestamp invoiceDate() {
            return optTimestamp("invoice_date");
        }

        public Integer invoiceTotal() {
            return optInteger("invoice_total");
        }

        public Invoice.Status invoiceStatus() {
            return reqEnum("invoice_status", Invoice.Status.class);
        }

    }

    public static class LinkedCreditNote extends Resource<LinkedCreditNote> {
        public LinkedCreditNote(JSONObject jsonObj) {
            super(jsonObj);
        }

        public String cnId() {
            return reqString("cn_id");
        }

        public Integer appliedAmount() {
            return reqInteger("applied_amount");
        }

        public Timestamp appliedAt() {
            return reqTimestamp("applied_at");
        }

        public CreditNote.ReasonCode cnReasonCode() {
            return reqEnum("cn_reason_code", CreditNote.ReasonCode.class);
        }

        public Timestamp cnDate() {
            return optTimestamp("cn_date");
        }

        public Integer cnTotal() {
            return optInteger("cn_total");
        }

        public CreditNote.Status cnStatus() {
            return reqEnum("cn_status", CreditNote.Status.class);
        }

        public String cnReferenceInvoiceId() {
            return reqString("cn_reference_invoice_id");
        }

    }

    public static class LinkedRefund extends Resource<LinkedRefund> {
        public LinkedRefund(JSONObject jsonObj) {
            super(jsonObj);
        }

        public String txnId() {
            return reqString("txn_id");
        }

        public Transaction.Status txnStatus() {
            return reqEnum("txn_status", Transaction.Status.class);
        }

        public Timestamp txnDate() {
            return reqTimestamp("txn_date");
        }

        public Integer txnAmount() {
            return reqInteger("txn_amount");
        }

    }

    //Constructors
    //============

    public Transaction(String jsonStr) {
        super(jsonStr);
    }

    public Transaction(JSONObject jsonObj) {
        super(jsonObj);
    }

    // Fields
    //=======

    public String id() {
        return reqString("id");
    }

    public String customerId() {
        return optString("customer_id");
    }

    public String subscriptionId() {
        return optString("subscription_id");
    }

    public PaymentMethod paymentMethod() {
        return reqEnum("payment_method", PaymentMethod.class);
    }

    public String referenceNumber() {
        return optString("reference_number");
    }

    public Gateway gateway() {
        return reqEnum("gateway", Gateway.class);
    }

    public Type type() {
        return reqEnum("type", Type.class);
    }

    public Timestamp date() {
        return optTimestamp("date");
    }

    public Integer amount() {
        return optInteger("amount");
    }

    public String idAtGateway() {
        return optString("id_at_gateway");
    }

    public Status status() {
        return optEnum("status", Status.class);
    }

    public String errorCode() {
        return optString("error_code");
    }

    public String errorText() {
        return optString("error_text");
    }

    public Timestamp voidedAt() {
        return optTimestamp("voided_at");
    }

    public Integer amountUnused() {
        return optInteger("amount_unused");
    }

    public String maskedCardNumber() {
        return optString("masked_card_number");
    }

    public String referenceTransactionId() {
        return optString("reference_transaction_id");
    }

    public String refundedTxnId() {
        return optString("refunded_txn_id");
    }

    public String reversalTransactionId() {
        return optString("reversal_transaction_id");
    }

    public List<Transaction.LinkedInvoice> linkedInvoices() {
        return optList("linked_invoices", Transaction.LinkedInvoice.class);
    }

    public List<Transaction.LinkedCreditNote> linkedCreditNotes() {
        return optList("linked_credit_notes", Transaction.LinkedCreditNote.class);
    }

    public List<Transaction.LinkedRefund> linkedRefunds() {
        return optList("linked_refunds", Transaction.LinkedRefund.class);
    }

    public String currencyCode() {
        return optString("currency_code");
    }

    // Operations
    //===========

    public static TransactionListRequest list() throws IOException {
        String uri = uri("transactions");
        return new TransactionListRequest(uri);
    }

    public static ListRequest transactionsForCustomer(String id) throws IOException {
        String uri = uri("customers", nullCheck(id), "transactions");
        return new ListRequest(uri);
    }

    public static ListRequest transactionsForSubscription(String id) throws IOException {
        String uri = uri("subscriptions", nullCheck(id), "transactions");
        return new ListRequest(uri);
    }

    public static ListRequest paymentsForInvoice(String id) throws IOException {
        String uri = uri("invoices", nullCheck(id), "payments");
        return new ListRequest(uri);
    }

    public static Request retrieve(String id) throws IOException {
        String uri = uri("transactions", nullCheck(id));
        return new Request(Method.GET, uri);
    }


    // Operation Request Classes
    //==========================

    public static class TransactionListRequest extends ListRequest<TransactionListRequest> {

        private TransactionListRequest(String uri) {
            super(uri);
        }
    
        public TransactionListRequest limit(Integer limit) {
            params.addOpt("limit", limit);
            return this;
        }


        public TransactionListRequest offset(String offset) {
            params.addOpt("offset", offset);
            return this;
        }


        public EnumeratedStringFilter<String> id() {
            return new EnumeratedStringFilter<String>("id",uri,this);
        }


        public EnumeratedStringFilter<String> customerId() {
            return new EnumeratedStringFilter<String>("customer_id",uri,this);
        }


        public EnumeratedStringFilter<String> subscriptionId() {
            return new EnumeratedStringFilter<String>("subscription_id",uri,this);
        }


        public EnumFilter<PaymentMethod> paymentMethod() {
            return new EnumFilter<PaymentMethod>("payment_method",uri,this);
        }


        public EnumFilter<Gateway> gateway() {
            return new EnumFilter<Gateway>("gateway",uri,this);
        }


        public StringFilter<String> referenceNumber() {
            return new StringFilter<String>("reference_number",uri,this);
        }


        public EnumFilter<Type> type() {
            return new EnumFilter<Type>("type",uri,this);
        }


        public TimestampFilter<Timestamp> date() {
            return new TimestampFilter<Timestamp>("date",uri,this);
        }


        public NumberFilter<Integer> amount() {
            return new NumberFilter<Integer>("amount",uri,this);
        }


        public EnumFilter<Status> status() {
            return new EnumFilter<Status>("status",uri,this);
        }


        public ListRequest sortByDate(SortOrder order) {
            params.addOpt("sort_by["+order.name().toLowerCase()+"]","date");
            return this;
        }


        @Override
        public Params params() {
            return params;
        }
    }

}
