# # CareerPartner1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [readonly]
**name** | **string** |  | [optional]
**slug** | **string** | Slug for this partner, used for navigation on the website |
**published** | **bool** |  | [optional]
**category_id** | **int** |  |
**category** | [**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory**](CareerPartnerCategory.md) |  | [optional] [readonly]
**address** | [**\NathanEmanuel\Congressus\Rest\Model\Address**](Address.md) |  | [optional]
**postal_address** | [**\NathanEmanuel\Congressus\Rest\Model\Address**](Address.md) |  | [optional]
**phone** | [**\NathanEmanuel\Congressus\Rest\Model\PhoneNumber**](PhoneNumber.md) |  | [optional]
**description** | **string** | Description for this partner. HTML is allowed. | [optional]
**description_short** | **string** | Brief description for this partner. No HTML allowed. | [optional]
**email** | **string** | Email address for the partner | [optional]
**url** | **string** |  | [optional]
**logo** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](StorageObject.md) |  | [optional]
**memo** | **string** | Internal notes for this partner | [optional]
**invoice_reference** | **string** | Invoice reference for this organisation | [optional]
**invoice_addressee_attention** | **string** | Invoice addressee attention for this organisation | [optional]
**invoice_address_field** | **string** | Invoice address field for this organisation |
**invoice_email** | **string** | Invoice email address for this organisation. Leave empty to use the general email address. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
