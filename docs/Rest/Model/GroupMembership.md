# # GroupMembership

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**member_id** | **int** |  |
**start** | **\DateTime** | Start date of the membership |
**end** | **\DateTime** | Optional end date of the membership | [optional]
**function** | **string** |  | [optional]
**may_edit_profile** | **bool** |  | [optional]
**may_manage_memberships** | **bool** |  | [optional]
**may_manage_storage_objects** | **bool** |  | [optional]
**is_self_enroll** | **bool** | True when the member self enrolled to this collection | [optional] [readonly]
**order_type** | **string** | Order preference for memberships, defined by the GroupFolder or OrganisationCategory resource | [optional] [readonly]
**order** | **int** | Order for this membership, only used when &#x60;order_type&#x60; is set to &#39;sorted&#39; | [optional]
**group_id** | **int** |  |
**group** | [**\NathanEmanuel\Congressus\Rest\Model\Group**](Group.md) |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
