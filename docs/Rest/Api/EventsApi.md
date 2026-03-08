# NathanEmanuel\Congressus\Rest\EventsApi

Events are used for a the publication of events on the website(s) of an association. When enabled, both  members and/or external persons can sign up for an event.  Sign up has multiple modes; &#x60;registration&#x60; for single ticket registrations for an event and &#x60;ticketing&#x60; for more complex sign up with the option to select one or more tickets per participation.  Billing and payment is defined by the sign up settings too. - When &#x60;participation_billing_enabled&#x60;, the &#x60;participation_billing_type&#x60; defines if an invoice is send direct or later. - The &#x60;participation_payment_&lt;xx&gt;&#x60; options define the available payment methods when participation_billing_enabled and  participation_billing_type is set to direct.  ## Data model - **Event** - Base model for events - **EventCategory** - Defines category and basic publication settings for the associated events. Each event has exactly  one category. - **EventTicketType** - Ticket type available for an event - **EventParticipation** - Participation with one or more sold tickets - **EventParticipationTicket** - Ticket sold for an event to a member or non-member

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30EventsEventIdParticipationsObjIdApprovePost()**](EventsApi.md#v30EventsEventIdParticipationsObjIdApprovePost) | **POST** /v30/events/{event_id}/participations/{obj_id}/approve | Approve participation |
| [**v30EventsEventIdParticipationsObjIdDeclinePost()**](EventsApi.md#v30EventsEventIdParticipationsObjIdDeclinePost) | **POST** /v30/events/{event_id}/participations/{obj_id}/decline | Decline participation |
| [**v30EventsEventIdParticipationsObjIdGet()**](EventsApi.md#v30EventsEventIdParticipationsObjIdGet) | **GET** /v30/events/{event_id}/participations/{obj_id} | Retrieve Event participation |
| [**v30EventsEventIdParticipationsObjIdPut()**](EventsApi.md#v30EventsEventIdParticipationsObjIdPut) | **PUT** /v30/events/{event_id}/participations/{obj_id} | Update Event participation |
| [**v30EventsEventIdParticipationsObjIdSetPresencePost()**](EventsApi.md#v30EventsEventIdParticipationsObjIdSetPresencePost) | **POST** /v30/events/{event_id}/participations/{obj_id}/set-presence | Set presence on all tickets within participation |
| [**v30EventsEventIdParticipationsObjIdUnsubscribePost()**](EventsApi.md#v30EventsEventIdParticipationsObjIdUnsubscribePost) | **POST** /v30/events/{event_id}/participations/{obj_id}/unsubscribe | Unsubscribe participation |
| [**v30EventsEventIdParticipationsObjIdWaitPost()**](EventsApi.md#v30EventsEventIdParticipationsObjIdWaitPost) | **POST** /v30/events/{event_id}/participations/{obj_id}/wait | Move participation to waiting list |
| [**v30EventsEventIdTicketTypesObjIdDelete()**](EventsApi.md#v30EventsEventIdTicketTypesObjIdDelete) | **DELETE** /v30/events/{event_id}/ticket-types/{obj_id} | Delete Ticket type |
| [**v30EventsEventIdTicketTypesObjIdGet()**](EventsApi.md#v30EventsEventIdTicketTypesObjIdGet) | **GET** /v30/events/{event_id}/ticket-types/{obj_id} | Retrieve Ticket type |
| [**v30EventsEventIdTicketTypesObjIdPut()**](EventsApi.md#v30EventsEventIdTicketTypesObjIdPut) | **PUT** /v30/events/{event_id}/ticket-types/{obj_id} | Update Ticket type |
| [**v30EventsGet()**](EventsApi.md#v30EventsGet) | **GET** /v30/events | List Events |
| [**v30EventsObjIdDelete()**](EventsApi.md#v30EventsObjIdDelete) | **DELETE** /v30/events/{obj_id} | Delete Event |
| [**v30EventsObjIdGet()**](EventsApi.md#v30EventsObjIdGet) | **GET** /v30/events/{obj_id} | Retrieve Event |
| [**v30EventsObjIdParticipationsGet()**](EventsApi.md#v30EventsObjIdParticipationsGet) | **GET** /v30/events/{obj_id}/participations | List Event participations |
| [**v30EventsObjIdPut()**](EventsApi.md#v30EventsObjIdPut) | **PUT** /v30/events/{obj_id} | Update Event |
| [**v30EventsObjIdSignUpPost()**](EventsApi.md#v30EventsObjIdSignUpPost) | **POST** /v30/events/{obj_id}/sign-up | Create Event Participation (sign up) |
| [**v30EventsObjIdTicketTypesGet()**](EventsApi.md#v30EventsObjIdTicketTypesGet) | **GET** /v30/events/{obj_id}/ticket-types | List Ticket types |
| [**v30EventsObjIdTicketTypesPost()**](EventsApi.md#v30EventsObjIdTicketTypesPost) | **POST** /v30/events/{obj_id}/ticket-types | Create Ticket type |
| [**v30EventsPost()**](EventsApi.md#v30EventsPost) | **POST** /v30/events | Create Event |


## `v30EventsEventIdParticipationsObjIdApprovePost()`

```php
v30EventsEventIdParticipationsObjIdApprovePost($event_id, $obj_id, $event_participation_conditional)
```

Approve participation

Approve a participation. Requires the participation to be in a state where it can be approved. When `check_conditions` is True, approval is only possible when there are tickets available.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int
$event_participation_conditional = new \NathanEmanuel\Congressus\Rest\Model\EventParticipationConditional(); // \NathanEmanuel\Congressus\Rest\Model\EventParticipationConditional

try {
    $apiInstance->v30EventsEventIdParticipationsObjIdApprovePost($event_id, $obj_id, $event_participation_conditional);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdParticipationsObjIdApprovePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **event_participation_conditional** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationConditional**](../Model/EventParticipationConditional.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdParticipationsObjIdDeclinePost()`

```php
v30EventsEventIdParticipationsObjIdDeclinePost($event_id, $obj_id, $event_participation_fine)
```

Decline participation

Decline a participation. Requires the participation to be in a state where it can be declined.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int
$event_participation_fine = new \NathanEmanuel\Congressus\Rest\Model\EventParticipationFine(); // \NathanEmanuel\Congressus\Rest\Model\EventParticipationFine

try {
    $apiInstance->v30EventsEventIdParticipationsObjIdDeclinePost($event_id, $obj_id, $event_participation_fine);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdParticipationsObjIdDeclinePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **event_participation_fine** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationFine**](../Model/EventParticipationFine.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdParticipationsObjIdGet()`

```php
v30EventsEventIdParticipationsObjIdGet($event_id, $obj_id): \NathanEmanuel\Congressus\Rest\Model\EventParticipationWithRelations
```

Retrieve Event participation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int

try {
    $result = $apiInstance->v30EventsEventIdParticipationsObjIdGet($event_id, $obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdParticipationsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventParticipationWithRelations**](../Model/EventParticipationWithRelations.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdParticipationsObjIdPut()`

```php
v30EventsEventIdParticipationsObjIdPut($event_id, $obj_id, $event_participation_with_relations): \NathanEmanuel\Congressus\Rest\Model\EventParticipationWithRelations
```

Update Event participation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int
$event_participation_with_relations = new \NathanEmanuel\Congressus\Rest\Model\EventParticipationWithRelations(); // \NathanEmanuel\Congressus\Rest\Model\EventParticipationWithRelations

try {
    $result = $apiInstance->v30EventsEventIdParticipationsObjIdPut($event_id, $obj_id, $event_participation_with_relations);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdParticipationsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **event_participation_with_relations** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationWithRelations**](../Model/EventParticipationWithRelations.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventParticipationWithRelations**](../Model/EventParticipationWithRelations.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdParticipationsObjIdSetPresencePost()`

```php
v30EventsEventIdParticipationsObjIdSetPresencePost($event_id, $obj_id, $event_participation_presence)
```

Set presence on all tickets within participation

This action endpoint requires valid `status_presence` data as payload. Optionally, both `participation_certificates_credits_override` and `participation_certificates_date_override` are accepted.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int
$event_participation_presence = new \NathanEmanuel\Congressus\Rest\Model\EventParticipationPresence(); // \NathanEmanuel\Congressus\Rest\Model\EventParticipationPresence

try {
    $apiInstance->v30EventsEventIdParticipationsObjIdSetPresencePost($event_id, $obj_id, $event_participation_presence);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdParticipationsObjIdSetPresencePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **event_participation_presence** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationPresence**](../Model/EventParticipationPresence.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdParticipationsObjIdUnsubscribePost()`

```php
v30EventsEventIdParticipationsObjIdUnsubscribePost($event_id, $obj_id, $event_participation_fine)
```

Unsubscribe participation

Unsubscribe a participation. Requires the participation to be in a state where it can be unsubscribed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int
$event_participation_fine = new \NathanEmanuel\Congressus\Rest\Model\EventParticipationFine(); // \NathanEmanuel\Congressus\Rest\Model\EventParticipationFine

try {
    $apiInstance->v30EventsEventIdParticipationsObjIdUnsubscribePost($event_id, $obj_id, $event_participation_fine);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdParticipationsObjIdUnsubscribePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **event_participation_fine** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationFine**](../Model/EventParticipationFine.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdParticipationsObjIdWaitPost()`

```php
v30EventsEventIdParticipationsObjIdWaitPost($event_id, $obj_id, $event_participation_conditional)
```

Move participation to waiting list

Add participation to the waiting list. When `check_conditions` is True, the waiting list has to be active.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int
$event_participation_conditional = new \NathanEmanuel\Congressus\Rest\Model\EventParticipationConditional(); // \NathanEmanuel\Congressus\Rest\Model\EventParticipationConditional

try {
    $apiInstance->v30EventsEventIdParticipationsObjIdWaitPost($event_id, $obj_id, $event_participation_conditional);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdParticipationsObjIdWaitPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **event_participation_conditional** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationConditional**](../Model/EventParticipationConditional.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdTicketTypesObjIdDelete()`

```php
v30EventsEventIdTicketTypesObjIdDelete($event_id, $obj_id)
```

Delete Ticket type



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int

try {
    $apiInstance->v30EventsEventIdTicketTypesObjIdDelete($event_id, $obj_id);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdTicketTypesObjIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdTicketTypesObjIdGet()`

```php
v30EventsEventIdTicketTypesObjIdGet($event_id, $obj_id): \NathanEmanuel\Congressus\Rest\Model\EventTicketType
```

Retrieve Ticket type



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int

try {
    $result = $apiInstance->v30EventsEventIdTicketTypesObjIdGet($event_id, $obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdTicketTypesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventTicketType**](../Model/EventTicketType.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsEventIdTicketTypesObjIdPut()`

```php
v30EventsEventIdTicketTypesObjIdPut($event_id, $obj_id, $event_ticket_type): \NathanEmanuel\Congressus\Rest\Model\EventTicketType
```

Update Ticket type



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_id = 56; // int
$obj_id = 56; // int
$event_ticket_type = new \NathanEmanuel\Congressus\Rest\Model\EventTicketType(); // \NathanEmanuel\Congressus\Rest\Model\EventTicketType

try {
    $result = $apiInstance->v30EventsEventIdTicketTypesObjIdPut($event_id, $obj_id, $event_ticket_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsEventIdTicketTypesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **event_ticket_type** | [**\NathanEmanuel\Congressus\Rest\Model\EventTicketType**](../Model/EventTicketType.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventTicketType**](../Model/EventTicketType.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsGet()`

```php
v30EventsGet($category_id, $period_filter, $published, $participation_billing_enabled, $participating_member_id, $socie_app_id, $member_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\EventPagination
```

List Events



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$category_id = array(56); // int[] | Filter by Category
$period_filter = 'period_filter_example'; // string | Filter period on `start`, `end`
$published = 'published_example'; // string | Filter on `published`
$participation_billing_enabled = array('participation_billing_enabled_example'); // string[] | Filter by Billing type
$participating_member_id = array('participating_member_id_example'); // string[] | Filter by Participant
$socie_app_id = 'socie_app_id_example'; // string
$member_id = array('member_id_example'); // string[] | Filter by Published for member
$page = 1; // int
$page_size = 25; // int
$order = 'start:desc'; // string

try {
    $result = $apiInstance->v30EventsGet($category_id, $period_filter, $published, $participation_billing_enabled, $participating_member_id, $socie_app_id, $member_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **category_id** | [**int[]**](../Model/int.md)| Filter by Category | [optional] |
| **period_filter** | **string**| Filter period on &#x60;start&#x60;, &#x60;end&#x60; | [optional] |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **participation_billing_enabled** | [**string[]**](../Model/string.md)| Filter by Billing type | [optional] |
| **participating_member_id** | [**string[]**](../Model/string.md)| Filter by Participant | [optional] |
| **socie_app_id** | **string**|  | [optional] |
| **member_id** | [**string[]**](../Model/string.md)| Filter by Published for member | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;start:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventPagination**](../Model/EventPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsObjIdDelete()`

```php
v30EventsObjIdDelete($obj_id)
```

Delete Event



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30EventsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsObjIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsObjIdGet()`

```php
v30EventsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\Event
```

Retrieve Event



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30EventsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Event**](../Model/Event.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsObjIdParticipationsGet()`

```php
v30EventsObjIdParticipationsGet($obj_id, $event_id, $status, $has_invoice, $sale_invoice_status, $member_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\EventParticipationPagination
```

List Event participations



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$event_id = array('event_id_example'); // string[] | Filter by Event
$status = array('status_example'); // string[] | Filter by Status
$has_invoice = 'has_invoice_example'; // string | Filter on `has_invoice`
$sale_invoice_status = array('sale_invoice_status_example'); // string[] | Filter by Invoice status
$member_id = array(56); // int[] | Filter by member_id
$page = 1; // int
$page_size = 25; // int
$order = 'created:desc'; // string

try {
    $result = $apiInstance->v30EventsObjIdParticipationsGet($obj_id, $event_id, $status, $has_invoice, $sale_invoice_status, $member_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsObjIdParticipationsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **event_id** | [**string[]**](../Model/string.md)| Filter by Event | [optional] |
| **status** | [**string[]**](../Model/string.md)| Filter by Status | [optional] |
| **has_invoice** | **string**| Filter on &#x60;has_invoice&#x60; | [optional] |
| **sale_invoice_status** | [**string[]**](../Model/string.md)| Filter by Invoice status | [optional] |
| **member_id** | [**int[]**](../Model/int.md)| Filter by member_id | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;created:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventParticipationPagination**](../Model/EventParticipationPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsObjIdPut()`

```php
v30EventsObjIdPut($obj_id, $event): \NathanEmanuel\Congressus\Rest\Model\Event
```

Update Event



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$event = new \NathanEmanuel\Congressus\Rest\Model\Event(); // \NathanEmanuel\Congressus\Rest\Model\Event

try {
    $result = $apiInstance->v30EventsObjIdPut($obj_id, $event);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **event** | [**\NathanEmanuel\Congressus\Rest\Model\Event**](../Model/Event.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Event**](../Model/Event.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsObjIdSignUpPost()`

```php
v30EventsObjIdSignUpPost($obj_id, $event_participation_builder): \NathanEmanuel\Congressus\Rest\Model\EventParticipationBuilder
```

Create Event Participation (sign up)

- Depending on the selected ticket types, `addressee` and e-mail are `required`. They can be omitted if `member_id` is given.  - `member_id` is required for tickets with `visibility_level=members|members_filter` and should be omitted for tickets with the `visibility_level=external_only`  - The invoice properties are required when the event has `participation_billing_enabled=True`.  - `remarks` can be submitted when the event has `participant_remarks_enabled=True`, otherwise they are not editable in the manager  - When an event has `participation_information_collection_type=ticket`, `name`  and `email` is required per ticket.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$event_participation_builder = new \NathanEmanuel\Congressus\Rest\Model\EventParticipationBuilder(); // \NathanEmanuel\Congressus\Rest\Model\EventParticipationBuilder

try {
    $result = $apiInstance->v30EventsObjIdSignUpPost($obj_id, $event_participation_builder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsObjIdSignUpPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **event_participation_builder** | [**\NathanEmanuel\Congressus\Rest\Model\EventParticipationBuilder**](../Model/EventParticipationBuilder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventParticipationBuilder**](../Model/EventParticipationBuilder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsObjIdTicketTypesGet()`

```php
v30EventsObjIdTicketTypesGet($obj_id, $is_available_for_members, $is_available_for_external, $availability_status, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\TicketTypePagination
```

List Ticket types



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$is_available_for_members = 'is_available_for_members_example'; // string | Filter on `is_available_for_members`
$is_available_for_external = 'is_available_for_external_example'; // string | Filter on `is_available_for_external`
$availability_status = array('availability_status_example'); // string[] | Filter by Availability
$page = 1; // int
$page_size = 25; // int
$order = 'created:desc'; // string

try {
    $result = $apiInstance->v30EventsObjIdTicketTypesGet($obj_id, $is_available_for_members, $is_available_for_external, $availability_status, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsObjIdTicketTypesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **is_available_for_members** | **string**| Filter on &#x60;is_available_for_members&#x60; | [optional] |
| **is_available_for_external** | **string**| Filter on &#x60;is_available_for_external&#x60; | [optional] |
| **availability_status** | [**string[]**](../Model/string.md)| Filter by Availability | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;created:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\TicketTypePagination**](../Model/TicketTypePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsObjIdTicketTypesPost()`

```php
v30EventsObjIdTicketTypesPost($obj_id, $event_ticket_type): \NathanEmanuel\Congressus\Rest\Model\EventTicketType
```

Create Ticket type



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$event_ticket_type = new \NathanEmanuel\Congressus\Rest\Model\EventTicketType(); // \NathanEmanuel\Congressus\Rest\Model\EventTicketType

try {
    $result = $apiInstance->v30EventsObjIdTicketTypesPost($obj_id, $event_ticket_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsObjIdTicketTypesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **event_ticket_type** | [**\NathanEmanuel\Congressus\Rest\Model\EventTicketType**](../Model/EventTicketType.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\EventTicketType**](../Model/EventTicketType.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30EventsPost()`

```php
v30EventsPost($event): \NathanEmanuel\Congressus\Rest\Model\Event
```

Create Event



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event = new \NathanEmanuel\Congressus\Rest\Model\Event(); // \NathanEmanuel\Congressus\Rest\Model\Event

try {
    $result = $apiInstance->v30EventsPost($event);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->v30EventsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **event** | [**\NathanEmanuel\Congressus\Rest\Model\Event**](../Model/Event.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Event**](../Model/Event.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
