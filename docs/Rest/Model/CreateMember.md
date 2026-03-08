# # CreateMember

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status_id** | **int** |  |
**member_from** | **\DateTime** |  | [optional]
**member_to** | **\DateTime** |  | [optional]
**id** | **int** |  | [readonly]
**username** | **string** |  | [optional]
**status** | [**\NathanEmanuel\Congressus\Rest\Model\MembershipStatus**](MembershipStatus.md) |  | [optional] [readonly]
**statuses** | [**\NathanEmanuel\Congressus\Rest\Model\MembershipStatus[]**](MembershipStatus.md) |  | [optional] [readonly]
**gender** | **string** |  | [optional]
**prefix** | **string** |  | [optional]
**initials** | **string** |  | [optional]
**nickname** | **string** |  | [optional]
**given_name** | **string** |  | [optional]
**first_name** | **string** |  | [optional]
**primary_last_name_main** | **string** |  |
**primary_last_name_prefix** | **string** |  | [optional]
**primary_last_name** | **string** |  | [optional] [readonly]
**secondary_last_name_main** | **string** |  | [optional]
**secondary_last_name_prefix** | **string** |  | [optional]
**secondary_last_name** | **string** |  | [optional] [readonly]
**last_name_display** | **string** |  | [optional]
**last_name** | **string** |  | [optional] [readonly]
**search_name** | **string** |  | [optional] [readonly]
**suffix** | **string** |  | [optional]
**date_of_birth** | **\DateTime** |  | [optional]
**email** | **string** |  | [optional]
**phone_mobile** | [**\NathanEmanuel\Congressus\Rest\Model\PhoneNumber**](PhoneNumber.md) |  | [optional]
**phone_home** | [**\NathanEmanuel\Congressus\Rest\Model\PhoneNumber**](PhoneNumber.md) |  | [optional]
**address** | [**\NathanEmanuel\Congressus\Rest\Model\Address**](Address.md) |  | [optional]
**profile_picture_id** | **int** |  | [optional]
**profile_picture** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](StorageObject.md) |  | [optional]
**formal_picture_id** | **int** |  | [optional]
**formal_picture** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](StorageObject.md) |  | [optional]
**deleted** | **bool** |  | [optional] [readonly]
**receive_sms** | **bool** |  | [optional]
**receive_mailings** | **bool** |  | [optional]
**show_almanac** | **bool** |  | [optional]
**show_almanac_addresses** | **bool** |  | [optional]
**show_almanac_phonenumbers** | **bool** |  | [optional]
**show_almanac_email** | **bool** |  | [optional]
**show_almanac_date_of_birth** | **bool** |  | [optional]
**show_almanac_custom_fields** | **bool** |  | [optional]
**modified** | **\DateTime** |  | [optional] [readonly]
**memo** | **string** | Internal notes for this member. Deprecated and replaced by LogEntries. | [optional] [readonly]
**bank_account** | [**\NathanEmanuel\Congressus\Rest\Model\BankAccount**](BankAccount.md) |  | [optional]
**custom_field_data** | **object** | Object with custom field information for this member. Contains key/value pairs, with key being the field reference and value the field value. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
