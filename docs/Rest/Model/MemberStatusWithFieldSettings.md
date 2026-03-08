# # MemberStatusWithFieldSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**name** | **string** |  |
**description** | **string** | Description for this member status, used for online sign up | [optional] [default to '']
**archived** | **bool** | Archived status, members are not able to log in on the website(s) | [optional]
**hidden** | **bool** | Former member statuses, not currently in use in the administration | [optional]
**deceased** | **bool** | Deceased status for passed away members, only available in our Enterprise plan | [optional]
**order** | **int** | Display order | [optional]
**is_available_for_online_sign_up** | **bool** | True when new members can sign up online for this member status | [optional]
**registration_product_offer_id** | **int** |  | [optional]
**registration_product_offer** | [**\NathanEmanuel\Congressus\Rest\Model\ProductOffer**](ProductOffer.md) |  | [optional] [readonly]
**membership_fee_product_offer_id** | **int** |  | [optional]
**membership_fee_product_offer** | [**\NathanEmanuel\Congressus\Rest\Model\ProductOffer**](ProductOffer.md) |  | [optional] [readonly]
**websites** | [**\NathanEmanuel\Congressus\Rest\Model\BaseWebsite[]**](BaseWebsite.md) | Website(s) on which this member status is able to log in. Only working for member statuses that are not archived | [optional] [readonly]
**websites_member_list** | [**\NathanEmanuel\Congressus\Rest\Model\BaseWebsite[]**](BaseWebsite.md) | Website(s) on which this member status is visible in the member list | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
