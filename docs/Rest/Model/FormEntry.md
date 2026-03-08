# # FormEntry

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**form** | [**\NathanEmanuel\Congressus\Rest\Model\BaseForm**](BaseForm.md) |  | [optional] [readonly]
**user_id** | **int** |  | [optional] [readonly]
**data** | **object** | Object with field information for this entry. Contains key/value pairs, with key being the field reference and value the field value. | [optional] [readonly]
**ip** | **string** | IP address through which this entry is added | [optional] [readonly]
**archived_at** | **\DateTime** | Datetime at which this entry was archived | [optional]
**is_archived** | **bool** | Whether this entry is archived | [optional]
**created** | **\DateTime** |  | [optional] [readonly]
**modified** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
