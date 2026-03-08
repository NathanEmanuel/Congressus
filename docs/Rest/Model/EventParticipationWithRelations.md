# # EventParticipationWithRelations

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**event_id** | **int** |  | [readonly]
**member_id** | **int** |  | [optional] [readonly]
**sale_invoice_id** | **int** |  | [optional] [readonly]
**form_entry_id** | **int** |  | [optional] [readonly]
**rental_reservation_id** | **int** |  | [optional] [readonly]
**addressee** | **string** |  | [optional] [readonly]
**email** | **string** |  | [optional] [readonly]
**num_tickets_sold** | **int** | Number of tickets sold for this participation | [optional] [readonly]
**uuid** | **string** |  | [optional] [readonly]
**status** | **string** | Status for this participation. You can update this status with action endpoints. | [optional] [readonly]
**access_key** | **string** |  | [optional] [readonly]
**remarks** | **string** | Remarks added by the participant during order | [optional]
**participation_certificates_credits_override** | **float** | Number of credits for the participation certificate. Set to 0 to disable certificate. Set to null to use the default value from the event. | [optional]
**participation_certificates_date_override** | **\DateTime** | Date override for the participation certificate. Set to null to use the default value from the event. | [optional]
**event** | [**\NathanEmanuel\Congressus\Rest\Model\BaseEvent**](BaseEvent.md) |  | [optional] [readonly]
**member** | [**\NathanEmanuel\Congressus\Rest\Model\MemberWithoutRelations**](MemberWithoutRelations.md) |  | [optional] [readonly]
**tickets** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationTicket[]**](EventParticipationTicket.md) |  | [optional] [readonly]
**sale_invoice** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoice**](SaleInvoice.md) |  | [optional] [readonly]
**rental_reservation** | [**\NathanEmanuel\Congressus\Rest\Model\RentalReservation**](RentalReservation.md) |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
