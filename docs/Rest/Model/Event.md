# # Event

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] [readonly]
**category_id** | **int** |  |
**category** | [**\NathanEmanuel\Congressus\Rest\Model\EventCategoryBase**](EventCategoryBase.md) |  | [optional] [readonly]
**status** | **string** | Status for participating at this event | [optional] [readonly]
**slug** | **string** |  | [optional] [readonly]
**name** | **string** |  |
**description** | **string** |  | [optional]
**published** | **bool** | True when this event is published on the website | [optional]
**visibility** | **string** | Visibility level set for this event | [optional]
**authentication_required** | **bool** | True when only authenticated users are allowed to view this event | [optional] [readonly]
**start** | **\DateTime** |  | [optional]
**end** | **\DateTime** |  | [optional]
**whole_day** | **bool** |  | [optional]
**location** | **string** |  | [optional]
**organizer_id** | **int** |  | [optional]
**organizer** | [**\NathanEmanuel\Congressus\Rest\Model\Group**](Group.md) |  | [optional] [readonly]
**show_participants** | **bool** |  | [optional]
**show_waiting_list** | **bool** |  | [optional]
**show_rented_items** | **bool** |  | [optional]
**participation_enabled** | **bool** | Enable sign up for this event | [optional]
**participation_mode** | **string** | Participation mode for this event. Use &#x60;\&quot;single\&quot;&#x60; for registration (one ticket) or &#x60;\&quot;ticketing\&quot;&#x60; for multiple tickets per participation. | [optional] [default to 'single']
**participation_billing_enabled** | **bool** | Enable billing for this event. When enabled, Congressus will handle invoicing and payments. | [optional]
**participation_billing_type** | **string** | Define if the participant is billed direct or later. When set to &#x60;\&quot;later\&quot;&#x60;, it is possible to update prices after the event, before invoices are sent. | [optional]
**participation_payment_ideal** | **bool** | Enable payment method &#x60;iDeal&#x60; | [optional]
**participation_payment_direct_debit** | **bool** | Enable payment method &#x60;direct debit&#x60; | [optional]
**participation_payment_on_invoice** | **bool** | Enable payment method &#x60;on invoice&#x60; | [optional]
**participation_information_collection_type** | **string** | Define if name and email is required per order or per ticket. | [optional]
**qr_ticketing_enabled** | **bool** | When enabled, Congressus generates tickets with a QR code which could be used to scan tickets at the door of the event. _Please note: additional charges apply for QR tickets_ | [optional]
**ticket_types** | [**\NathanEmanuel\Congressus\Rest\Model\EventTicketType[]**](EventTicketType.md) |  | [optional] [readonly]
**num_tickets** | **int** | Capacity for this event. Null means no capacity limit. | [optional]
**num_tickets_sold** | **int** | Number of tickets that are sold for this event | [optional] [readonly]
**num_tickets_max_per_order** | **int** | Max. number of tickets that can be ordered at once. Only relevant for participation_mode&#x3D;&#x60;\&quot;ticketing\&quot;&#x60;. | [optional] [default to 1]
**participant_remarks_enabled** | **bool** | Enables participants to add remarks to their order | [optional]
**participant_remarks_placeholder** | **string** | Placeholder text for the participant remarks. Could be used for questions etc. | [optional]
**rental_enabled** | **bool** | Enables rental for participants. Only available when module rental is enabled. | [optional]
**rental_categories** | [**\NathanEmanuel\Congressus\Rest\Model\RentalCategory[]**](RentalCategory.md) | Rental categories from which participants can rent items | [optional]
**rental_max_price** | **float** | Max. rental price per participation. When set to null, no limit is used. | [optional]
**career_partners** | [**\NathanEmanuel\Congressus\Rest\Model\CareerPartner1[]**](CareerPartner1.md) |  | [optional] [readonly]
**website_url** | **string** | URL for this event on the website. If the association has multiple websites, the first available website on which this event is published, is used. | [optional] [readonly]
**website_subscribe_url** | **string** | URL on the website to subscribe for this event. If the association has multiple websites, the first available website on which this event is published, is used. | [optional] [readonly]
**comments_open** | **bool** |  | [optional]
**comments** | [**\NathanEmanuel\Congressus\Rest\Model\EventComment[]**](EventComment.md) |  | [optional] [readonly]
**media** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject[]**](StorageObject.md) |  | [optional] [readonly]
**memo** | **string** | Internal notes for this event | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
