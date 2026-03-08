# # EventCategory

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional]
**name** | **string** | Name of this category |
**color** | **string** | Custom hex-color for this category | [optional]
**entity** | [**\NathanEmanuel\Congressus\Rest\Model\ClientEntity**](ClientEntity.md) |  | [optional]
**show_in_overview** | **bool** | Show this category in the overview | [optional]
**attach_ical_to_mails** | **bool** | Attach an ical file to mails for this category | [optional]
**published** | **bool** | Set the publication of objects in this category. | [optional] [default to true]
**visibility** | **string** | Set the visibility of objects in this category. | [optional]
**filter** | [**\NathanEmanuel\Congressus\Rest\Model\BasicFilter**](BasicFilter.md) |  | [optional] [readonly]
**websites** | [**\NathanEmanuel\Congressus\Rest\Model\BaseWebsite[]**](BaseWebsite.md) |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
