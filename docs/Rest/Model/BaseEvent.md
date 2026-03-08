# # BaseEvent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**category_id** | **int** |  |
**category** | [**\NathanEmanuel\Congressus\Rest\Model\EventCategoryBase**](EventCategoryBase.md) |  | [optional] [readonly]
**status** | **string** | Status for participating at this event | [optional] [readonly]
**slug** | **string** |  | [optional] [readonly]
**name** | **string** |  |
**description** | **string** |  | [optional]
**published** | **bool** | True when this event is published on the website | [optional]
**visibility** | **string** | Visibility level set for this event | [optional]
**authentication_required** | **bool** | True when only authenticated users are allowed to view this event | [optional] [readonly]
**start** | **\DateTime** |  | [optional]
**end** | **\DateTime** |  | [optional]
**whole_day** | **bool** |  | [optional]
**location** | **string** |  | [optional]
**organizer_id** | **int** |  | [optional]
**organizer** | [**\NathanEmanuel\Congressus\Rest\Model\Group**](Group.md) |  | [optional] [readonly]
**num_tickets** | **int** | Capacity for this event. Null means no capacity limit. | [optional]
**num_tickets_sold** | **int** | Number of tickets that are sold for this event | [optional] [readonly]
**website_url** | **string** | URL for this event on the website. If the association has multiple websites, the first available website on which this event is published, is used. | [optional] [readonly]
**website_subscribe_url** | **string** | URL on the website to subscribe for this event. If the association has multiple websites, the first available website on which this event is published, is used. | [optional] [readonly]
**comments_open** | **bool** |  | [optional]
**comments** | [**\NathanEmanuel\Congressus\Rest\Model\EventComment[]**](EventComment.md) |  | [optional] [readonly]
**media** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject[]**](StorageObject.md) |  | [optional] [readonly]
**memo** | **string** | Internal notes for this event | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
