# # Group

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [readonly]
**folder_id** | **int** |  | [optional]
**folder** | [**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](GroupFolder.md) |  | [optional] [readonly]
**name** | **string** |  | [optional]
**address** | [**\NathanEmanuel\Congressus\Rest\Model\Address**](Address.md) |  | [optional]
**postal_address** | [**\NathanEmanuel\Congressus\Rest\Model\Address**](Address.md) |  | [optional]
**phone** | [**\NathanEmanuel\Congressus\Rest\Model\PhoneNumber**](PhoneNumber.md) |  | [optional]
**description** | **string** | Description for this group. HTML is allowed. | [optional]
**description_short** | **string** | Brief description for this group. No HTML allowed. | [optional]
**email** | **string** | Email address for the group | [optional]
**url** | **string** |  | [optional]
**logo** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](StorageObject.md) |  | [optional]
**slug** | **string** | Slug for this group, used for navigation on the website |
**path** | **string** | Full path to this group, including the folder path | [optional] [readonly]
**published** | **bool** |  | [optional]
**start** | **\DateTime** | Start date of the group |
**end** | **\DateTime** | Optional end date of the group | [optional]
**memo** | **string** | Internal notes for this group | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
