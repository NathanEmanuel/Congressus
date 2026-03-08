# # Form

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**title** | **string** |  | [optional]
**mail_user** | **bool** | Whether to send an email to the user after submitting the form. | [optional]
**mail_organisation** | **bool** | Whether to send an email to the organisation after submitting the form. | [optional]
**mail_organisation_address** | **string** | Email address to send the organisation email to. Multiple addresses can be separated by commas. | [optional]
**published** | **bool** | Whether the form is published and available for users. | [optional]
**num_entries** | **int** | Number of entries for this form. | [optional] [readonly]
**num_entries_open** | **int** | Number of current (i.e. not archived) entries for this form. | [optional] [readonly]
**created** | **\DateTime** |  | [optional] [readonly]
**modified** | **\DateTime** |  | [optional] [readonly]
**sets** | [**\NathanEmanuel\Congressus\Rest\Model\FormSet[]**](FormSet.md) | List of fieldsets for this form. | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
