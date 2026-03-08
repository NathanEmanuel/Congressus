# # UpdateLogEntry

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**type** | **string** |  | [readonly]
**text** | **string** |  | [optional]
**subject_type** | **string** |  | [readonly]
**subject_id** | **int** |  | [readonly]
**author_id** | **int** |  | [optional] [readonly]
**created** | **\DateTime** |  | [optional] [readonly]
**modified** | **\DateTime** |  | [optional] [readonly]
**author** | [**\NathanEmanuel\Congressus\Rest\Model\LogEntryUser**](LogEntryUser.md) |  | [optional] [readonly]
**subject** | [**\NathanEmanuel\Congressus\Rest\Model\LogEntrySubject**](LogEntrySubject.md) |  | [optional] [readonly]
**assignee_type** | **string** |  | [optional]
**assignee_id** | **int** |  | [optional]
**assignee** | [**\NathanEmanuel\Congressus\Rest\Model\LogEntryUser**](LogEntryUser.md) |  | [optional] [readonly]
**is_completed** | **bool** |  | [optional]
**completed** | **\DateTime** |  | [optional] [readonly]
**completed_by_id** | **int** |  | [optional]
**completed_by** | [**\NathanEmanuel\Congressus\Rest\Model\LogEntryUser**](LogEntryUser.md) |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
