# # EventTicketType

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**availability_status** | **string** | Status for the availability of this ticket type. Ticket types with status \&quot;available\&quot;, \&quot;limited\&quot; and \&quot;waiting list\&quot; are available for new participants. | [optional] [readonly]
**available_from** | **\DateTime** |  | [optional]
**available_to** | **\DateTime** |  | [optional]
**cancel_to** | **\DateTime** |  | [optional]
**confirmation_email_text** | **string** | Additional text added to the confirmation email for participants. Only added when the corresponding boolean is set to True | [optional]
**confirmation_email_text_enabled** | **bool** | True when an additional text has to be added to the confirmation email for participants | [optional]
**description** | **string** | Optional description for this ticket type | [optional]
**event_id** | **int** |  | [optional] [readonly]
**filter_id** | **int** |  | [optional]
**id** | **int** |  | [optional] [readonly]
**modified** | **\DateTime** |  | [optional] [readonly]
**name** | **string** | Name for this ticket type |
**num_tickets** | **int** | Max. number of tickets that could be sold for this ticket type | [optional]
**num_tickets_available** | **mixed** |  | [optional] [readonly]
**num_tickets_max** | **int** |  | [optional]
**num_tickets_max_per** | **string** |  | [optional]
**num_tickets_sold** | **int** | Number of tickets that are sold for this ticket type | [optional] [readonly]
**price** | **float** | Price for this ticket. Set to 0 to show _free_, set to null to hide price. | [optional]
**pricing_enabled** | **bool** |  | [optional]
**vat_category** | [**\NathanEmanuel\Congressus\Rest\Model\VatCategory**](VatCategory.md) |  | [optional] [readonly]
**vat_category_id** | **int** |  |
**visibility_level** | **string** |  | [optional]
**waiting_list_enabled** | **bool** |  | [optional]
**participation_certificate_credits** | **float** | Number of credits for the participation certificate. Set to 0 to disable certificate. Set to null to use the default value from the event. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
