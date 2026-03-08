# # SaleInvoice

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**uuid** | **string** |  | [optional] [readonly]
**entity_id** | **int** | ID of the entity to use for this sale invoice. | [optional]
**entity** | [**\NathanEmanuel\Congressus\Rest\Model\ClientEntity**](ClientEntity.md) |  | [optional] [readonly]
**invoice_date** | **\DateTime** |  | [optional]
**invoice_source** | **string** |  | [readonly]
**invoice_type** | **string** |  | [optional] [readonly]
**delivery_method** | **string** |  | [optional] [readonly]
**invoice_send_date_time** | **\DateTime** |  | [optional] [readonly]
**invoice_due_date** | **\DateTime** |  | [optional] [readonly]
**invoice_reminded_date_time** | **\DateTime** |  | [optional] [readonly]
**invoice_num_reminders_send** | **int** |  | [optional] [readonly]
**invoice_next_due_date** | **\DateTime** |  | [optional] [readonly]
**invoice_status** | **string** | Status of the sale invoice. Follows the workflow. Cannot be set directly; use actions &#x60;send&#x60;, &#x60;remind&#x60; and &#x60;pay&#x60; instead. | [optional] [readonly]
**invoice_reference** | **string** |  | [optional]
**invoice_number** | **string** |  | [optional] [readonly]
**member_id** | **int** |  | [optional]
**collection_id** | **int** | ID of the collection (Group / Organisation) to which this sale invoice is addressed. Optional. | [optional]
**contribution_start** | **\DateTime** | Set a contribution start date when this invoice contains contribution. | [optional]
**contribution_end** | **\DateTime** | Set a contribution end date when this invoice contains contribution for a given period. | [optional]
**use_direct_debit** | **bool** | Set to true to use direct debit to collect this sale invoice. Take care: this value is normally set automatically when the associated member has a valid direct debit mandate, the workflow has direct debit enabled and the association has a valid direct debit contract with the bank. | [optional]
**invoice_workflow_id** | **int** | ID for the sale invoice workflow for this sale invoice. When omitted, the default workflow for the API is used. | [optional]
**addressee** | **string** | Required when collection_id and member_id are omitted. | [optional]
**addressee_attention** | **string** | Attention of the addressee, commonly used when the addressee is a company. | [optional]
**email** | **string** |  | [optional]
**address** | [**\NathanEmanuel\Congressus\Rest\Model\Address**](Address.md) |  | [optional]
**items** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItem[]**](SaleInvoiceItem.md) |  |
**payments** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoicePayment[]**](SaleInvoicePayment.md) |  | [optional] [readonly]
**price_inclusive_vat** | **mixed** |  | [optional] [readonly]
**price_exclusive_vat** | **mixed** |  | [optional] [readonly]
**vat** | **mixed** |  | [optional] [readonly]
**price_paid** | **mixed** |  | [optional] [readonly]
**price_unpaid** | **mixed** |  | [optional] [readonly]
**currency** | **mixed** |  | [optional] [readonly]
**created** | **\DateTime** |  | [optional] [readonly]
**modified** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
