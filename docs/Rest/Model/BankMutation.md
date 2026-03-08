# # BankMutation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**bank_statement** | [**\NathanEmanuel\Congressus\Rest\Model\BankStatement**](BankStatement.md) |  | [optional] [readonly]
**matches** | [**\NathanEmanuel\Congressus\Rest\Model\BankMutationMatch[]**](BankMutationMatch.md) |  | [optional] [readonly]
**status** | **string** | Match status for this mutation | [optional] [readonly]
**end_to_end_id** | **string** |  | [optional] [readonly]
**mutation_date** | **\DateTime** |  | [optional] [readonly]
**iban** | **string** |  | [optional] [readonly]
**name** | **string** |  | [optional] [readonly]
**description** | **string** |  | [optional] [readonly]
**amount** | **float** |  | [optional] [readonly]
**prop_bank_code** | **string** |  | [optional] [readonly]
**is_sdd** | **bool** |  | [optional] [readonly]
**sdd_reason_code** | **string** | Reason code for reversed SEPA direct debit payments, only relevant when &#x60;is_sdd &#x3D; true&#x60; | [optional] [readonly]
**sdd_reason_code_description** | **string** | Human readable information on the sdd_reason_code, only relevant when &#x60;is_sdd &#x3D; true&#x60; | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
