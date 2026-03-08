# # GroupFolderWithChildren

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**parent_id** | **int** |  | [optional]
**name** | **string** |  |
**slug** | **string** | Slug for this group folder, used for navigation on the website |
**path** | **string** | Path used on the website for groups in this folder, based on the slugs of this folder and parent folders | [optional] [readonly]
**breadcrumbs** | **string** | Full breadcrumbs to this folder | [optional] [readonly]
**published** | **bool** | True if this folder is published | [optional]
**order_type** | **string** | Order preference for memberships | [optional]
**children** | [**\NathanEmanuel\Congressus\Rest\Model\GroupFolderWithChildren[]**](GroupFolderWithChildren.md) |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
