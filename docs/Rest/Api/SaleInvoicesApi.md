# NathanEmanuel\Congressus\Rest\SaleInvoicesApi



All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30SaleInvoicesGet()**](SaleInvoicesApi.md#v30SaleInvoicesGet) | **GET** /v30/sale-invoices | List Sale invoices |
| [**v30SaleInvoicesObjIdDelete()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdDelete) | **DELETE** /v30/sale-invoices/{obj_id} | Delete sale invoice |
| [**v30SaleInvoicesObjIdDownloadGet()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdDownloadGet) | **GET** /v30/sale-invoices/{obj_id}/download | Download a sale invoice as PDF file |
| [**v30SaleInvoicesObjIdGet()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdGet) | **GET** /v30/sale-invoices/{obj_id} | Retrieve sale invoice |
| [**v30SaleInvoicesObjIdItemsGet()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdItemsGet) | **GET** /v30/sale-invoices/{obj_id}/items | List sale invoice items |
| [**v30SaleInvoicesObjIdItemsPost()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdItemsPost) | **POST** /v30/sale-invoices/{obj_id}/items | Create sale invoice item |
| [**v30SaleInvoicesObjIdLogsGet()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdLogsGet) | **GET** /v30/sale-invoices/{obj_id}/logs | List LogEntries |
| [**v30SaleInvoicesObjIdLogsLogEntryIdDelete()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdLogsLogEntryIdDelete) | **DELETE** /v30/sale-invoices/{obj_id}/logs/{log_entry_id} | Delete LogEntry |
| [**v30SaleInvoicesObjIdLogsLogEntryIdGet()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdLogsLogEntryIdGet) | **GET** /v30/sale-invoices/{obj_id}/logs/{log_entry_id} | Retrieve LogEntry |
| [**v30SaleInvoicesObjIdLogsLogEntryIdPut()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdLogsLogEntryIdPut) | **PUT** /v30/sale-invoices/{obj_id}/logs/{log_entry_id} | Update LogEntry |
| [**v30SaleInvoicesObjIdLogsPost()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdLogsPost) | **POST** /v30/sale-invoices/{obj_id}/logs | Create LogEntry |
| [**v30SaleInvoicesObjIdMarkCollectiblePost()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdMarkCollectiblePost) | **POST** /v30/sale-invoices/{obj_id}/mark-collectible | Mark sale invoice as collectible |
| [**v30SaleInvoicesObjIdMarkUncollectiblePost()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdMarkUncollectiblePost) | **POST** /v30/sale-invoices/{obj_id}/mark-uncollectible | Mark sale invoice as uncollectible |
| [**v30SaleInvoicesObjIdPut()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdPut) | **PUT** /v30/sale-invoices/{obj_id} | Update sale invoice |
| [**v30SaleInvoicesObjIdRemindPost()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdRemindPost) | **POST** /v30/sale-invoices/{obj_id}/remind | Remind a sale invoice |
| [**v30SaleInvoicesObjIdSendPost()**](SaleInvoicesApi.md#v30SaleInvoicesObjIdSendPost) | **POST** /v30/sale-invoices/{obj_id}/send | Send a sale invoice |
| [**v30SaleInvoicesPost()**](SaleInvoicesApi.md#v30SaleInvoicesPost) | **POST** /v30/sale-invoices | Create SaleInvoice |
| [**v30SaleInvoicesWorkflowsGet()**](SaleInvoicesApi.md#v30SaleInvoicesWorkflowsGet) | **GET** /v30/sale-invoices/workflows | List sale invoice workflows |


## `v30SaleInvoicesGet()`

```php
v30SaleInvoicesGet($entity_id, $period_filter, $invoice_status, $invoice_num_reminders_send, $invoice_type, $category, $product_offer_id, $member_id, $collection_id, $use_direct_debit, $contribution_start, $contribution_end, $direct_debit_file_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\SaleInvoicePagination
```

List Sale invoices



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$entity_id = 'entity_id_example'; // string
$period_filter = 'period_filter_example'; // string | Filter period on `invoice_date`
$invoice_status = array('invoice_status_example'); // string[] | Filter by Invoice status
$invoice_num_reminders_send = array('invoice_num_reminders_send_example'); // string[] | Filter by # Reminders
$invoice_type = array('invoice_type_example'); // string[] | Filter by Invoice type
$category = array('category_example'); // string[] | Filter by Category
$product_offer_id = array('product_offer_id_example'); // string[] | Filter by Product
$member_id = array('member_id_example'); // string[] | Filter by Member
$collection_id = array('collection_id_example'); // string[] | Filter by Collection
$use_direct_debit = 'use_direct_debit_example'; // string | Filter on `use_direct_debit`
$contribution_start = 'contribution_start_example'; // string | Filter period on `contribution_start`
$contribution_end = 'contribution_end_example'; // string | Filter period on `contribution_end`
$direct_debit_file_id = array('direct_debit_file_id_example'); // string[] | Filter by Direct debit file
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30SaleInvoicesGet($entity_id, $period_filter, $invoice_status, $invoice_num_reminders_send, $invoice_type, $category, $product_offer_id, $member_id, $collection_id, $use_direct_debit, $contribution_start, $contribution_end, $direct_debit_file_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **entity_id** | **string**|  | [optional] |
| **period_filter** | **string**| Filter period on &#x60;invoice_date&#x60; | [optional] |
| **invoice_status** | [**string[]**](../Model/string.md)| Filter by Invoice status | [optional] |
| **invoice_num_reminders_send** | [**string[]**](../Model/string.md)| Filter by # Reminders | [optional] |
| **invoice_type** | [**string[]**](../Model/string.md)| Filter by Invoice type | [optional] |
| **category** | [**string[]**](../Model/string.md)| Filter by Category | [optional] |
| **product_offer_id** | [**string[]**](../Model/string.md)| Filter by Product | [optional] |
| **member_id** | [**string[]**](../Model/string.md)| Filter by Member | [optional] |
| **collection_id** | [**string[]**](../Model/string.md)| Filter by Collection | [optional] |
| **use_direct_debit** | **string**| Filter on &#x60;use_direct_debit&#x60; | [optional] |
| **contribution_start** | **string**| Filter period on &#x60;contribution_start&#x60; | [optional] |
| **contribution_end** | **string**| Filter period on &#x60;contribution_end&#x60; | [optional] |
| **direct_debit_file_id** | [**string[]**](../Model/string.md)| Filter by Direct debit file | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SaleInvoicePagination**](../Model/SaleInvoicePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdDelete()`

```php
v30SaleInvoicesObjIdDelete($obj_id)
```

Delete sale invoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30SaleInvoicesObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30SaleInvoicesObjIdDownloadGet()`

```php
v30SaleInvoicesObjIdDownloadGet($obj_id)
```

Download a sale invoice as PDF file



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30SaleInvoicesObjIdDownloadGet($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdDownloadGet: ', $e->getMessage(), PHP_EOL;
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

## `v30SaleInvoicesObjIdGet()`

```php
v30SaleInvoicesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\SaleInvoice
```

Retrieve sale invoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30SaleInvoicesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SaleInvoice**](../Model/SaleInvoice.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdItemsGet()`

```php
v30SaleInvoicesObjIdItemsGet($obj_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItemPagination
```

List sale invoice items



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30SaleInvoicesObjIdItemsGet($obj_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdItemsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItemPagination**](../Model/SaleInvoiceItemPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdItemsPost()`

```php
v30SaleInvoicesObjIdItemsPost($obj_id, $sale_invoice_item): \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItem
```

Create sale invoice item



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$sale_invoice_item = new \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItem(); // \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItem

try {
    $result = $apiInstance->v30SaleInvoicesObjIdItemsPost($obj_id, $sale_invoice_item);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdItemsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **sale_invoice_item** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItem**](../Model/SaleInvoiceItem.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceItem**](../Model/SaleInvoiceItem.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdLogsGet()`

```php
v30SaleInvoicesObjIdLogsGet($obj_id, $author_id, $type, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\LogEntryPagination
```

List LogEntries

List log entries. Log entries can be of type `note`, `task`, `action` or `change`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$author_id = array(56); // int[] | Filter by None
$type = array('type_example'); // string[] | Filter by None
$page = 1; // int
$page_size = 25; // int
$order = 'created:desc'; // string

try {
    $result = $apiInstance->v30SaleInvoicesObjIdLogsGet($obj_id, $author_id, $type, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdLogsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **author_id** | [**int[]**](../Model/int.md)| Filter by None | [optional] |
| **type** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;created:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntryPagination**](../Model/LogEntryPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdLogsLogEntryIdDelete()`

```php
v30SaleInvoicesObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id)
```

Delete LogEntry

Delete a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int

try {
    $apiInstance->v30SaleInvoicesObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdLogsLogEntryIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **log_entry_id** | **int**|  | |

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

## `v30SaleInvoicesObjIdLogsLogEntryIdGet()`

```php
v30SaleInvoicesObjIdLogsLogEntryIdGet($obj_id, $log_entry_id): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Retrieve LogEntry



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int

try {
    $result = $apiInstance->v30SaleInvoicesObjIdLogsLogEntryIdGet($obj_id, $log_entry_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdLogsLogEntryIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **log_entry_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntry**](../Model/LogEntry.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdLogsLogEntryIdPut()`

```php
v30SaleInvoicesObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $update_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Update LogEntry

## Update a log entry  ### Limitations: This is only possible for log entries of type `note` or `task`.  ### Updating simple fields: For notes, only the `text` field can be updated. For tasks, it's also possible to update the assignee through the `assignee_type` and `assignee_id` fields.  ### Marking tasks as completed: Tasks can also be marked as complete by setting `is_completed` to true and optionally setting `completed_by_id` to the ID of the user that completed the task. If `completed_by_id` is not set, the current user will be used.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int
$update_log_entry = new \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry

try {
    $result = $apiInstance->v30SaleInvoicesObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $update_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdLogsLogEntryIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **log_entry_id** | **int**|  | |
| **update_log_entry** | [**\NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry**](../Model/UpdateLogEntry.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntry**](../Model/LogEntry.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdLogsPost()`

```php
v30SaleInvoicesObjIdLogsPost($obj_id, $create_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Create LogEntry

Create a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$create_log_entry = new \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry

try {
    $result = $apiInstance->v30SaleInvoicesObjIdLogsPost($obj_id, $create_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdLogsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **create_log_entry** | [**\NathanEmanuel\Congressus\Rest\Model\CreateLogEntry**](../Model/CreateLogEntry.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntry**](../Model/LogEntry.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdMarkCollectiblePost()`

```php
v30SaleInvoicesObjIdMarkCollectiblePost($obj_id, $body)
```

Mark sale invoice as collectible



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$body = array('key' => new \stdClass); // object

try {
    $apiInstance->v30SaleInvoicesObjIdMarkCollectiblePost($obj_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdMarkCollectiblePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **body** | **object**|  | [optional] |

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

## `v30SaleInvoicesObjIdMarkUncollectiblePost()`

```php
v30SaleInvoicesObjIdMarkUncollectiblePost($obj_id, $body)
```

Mark sale invoice as uncollectible



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$body = array('key' => new \stdClass); // object

try {
    $apiInstance->v30SaleInvoicesObjIdMarkUncollectiblePost($obj_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdMarkUncollectiblePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **body** | **object**|  | [optional] |

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

## `v30SaleInvoicesObjIdPut()`

```php
v30SaleInvoicesObjIdPut($obj_id, $sale_invoice): \NathanEmanuel\Congressus\Rest\Model\SaleInvoice
```

Update sale invoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$sale_invoice = new \NathanEmanuel\Congressus\Rest\Model\SaleInvoice(); // \NathanEmanuel\Congressus\Rest\Model\SaleInvoice

try {
    $result = $apiInstance->v30SaleInvoicesObjIdPut($obj_id, $sale_invoice);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **sale_invoice** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoice**](../Model/SaleInvoice.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SaleInvoice**](../Model/SaleInvoice.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesObjIdRemindPost()`

```php
v30SaleInvoicesObjIdRemindPost($obj_id, $body)
```

Remind a sale invoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$body = array('key' => new \stdClass); // object

try {
    $apiInstance->v30SaleInvoicesObjIdRemindPost($obj_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdRemindPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **body** | **object**|  | [optional] |

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

## `v30SaleInvoicesObjIdSendPost()`

```php
v30SaleInvoicesObjIdSendPost($obj_id, $sale_invoice_send)
```

Send a sale invoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$sale_invoice_send = new \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceSend(); // \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceSend

try {
    $apiInstance->v30SaleInvoicesObjIdSendPost($obj_id, $sale_invoice_send);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesObjIdSendPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **sale_invoice_send** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceSend**](../Model/SaleInvoiceSend.md)|  | [optional] |

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

## `v30SaleInvoicesPost()`

```php
v30SaleInvoicesPost($sale_invoice): \NathanEmanuel\Congressus\Rest\Model\SaleInvoice
```

Create SaleInvoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$sale_invoice = new \NathanEmanuel\Congressus\Rest\Model\SaleInvoice(); // \NathanEmanuel\Congressus\Rest\Model\SaleInvoice

try {
    $result = $apiInstance->v30SaleInvoicesPost($sale_invoice);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sale_invoice** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoice**](../Model/SaleInvoice.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SaleInvoice**](../Model/SaleInvoice.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30SaleInvoicesWorkflowsGet()`

```php
v30SaleInvoicesWorkflowsGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceWorkflowPagination
```

List sale invoice workflows



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\SaleInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30SaleInvoicesWorkflowsGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaleInvoicesApi->v30SaleInvoicesWorkflowsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceWorkflowPagination**](../Model/SaleInvoiceWorkflowPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
