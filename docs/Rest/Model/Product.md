# # Product

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**product_offer_id** | **int** | id for the product offer (variant) | [optional]
**folder_id** | **int** | id for the product folder |
**folder** | [**\NathanEmanuel\Congressus\Rest\Model\ProductFolder**](ProductFolder.md) |  | [optional] [readonly]
**name** | **string** |  | [optional]
**description** | **string** |  | [optional]
**media** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject[]**](StorageObject.md) |  | [optional] [readonly]
**published** | **bool** | True when this product is published on the website | [optional]
**price** | **float** | Price including VAT | [optional]
**vat_category** | [**\NathanEmanuel\Congressus\Rest\Model\VatCategory**](VatCategory.md) |  | [optional]
**vat_percentage** | **float** |  | [optional]
**type** | **string** |  | [optional] [readonly]
**is_archived** | **bool** | True when this product is archived | [optional]
**created** | **\DateTime** |  | [optional]
**modified** | **\DateTime** |  | [optional]
**memo** | **string** | Internal notes for this product | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
