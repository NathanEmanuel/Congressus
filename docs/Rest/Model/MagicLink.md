# # MagicLink

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**uuid** | **string** |  | [optional] [readonly]
**member_id** | **int** | ID of the member to create this magic link for. |
**context** | **string** | The context the magic link is for. |
**max_age** | **int** | The context the magic link is for. Optional, the context&#39;s default max age will be used if not set. | [optional]
**website_id** | **int** | ID of the website to create this magic link for. | [optional]
**redirect_url** | **string** | Redirect URL for the magic link. The user will be redirected to this URL after logging in with the magic link. Can be a relative or absolute URL. Optional. | [optional]
**link** | **mixed** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
