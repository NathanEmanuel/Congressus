# NathanEmanuel\Congressus\Rest\ProductsApi

Products are used for invoices. Congressus creates products automatically for event tickets, planning and rental.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30ProductsGet()**](ProductsApi.md#v30ProductsGet) | **GET** /v30/products | List Products |
| [**v30ProductsObjIdDelete()**](ProductsApi.md#v30ProductsObjIdDelete) | **DELETE** /v30/products/{obj_id} | Delete Product |
| [**v30ProductsObjIdGet()**](ProductsApi.md#v30ProductsObjIdGet) | **GET** /v30/products/{obj_id} | Retrieve Product |
| [**v30ProductsObjIdLogsGet()**](ProductsApi.md#v30ProductsObjIdLogsGet) | **GET** /v30/products/{obj_id}/logs | List LogEntries |
| [**v30ProductsObjIdLogsLogEntryIdDelete()**](ProductsApi.md#v30ProductsObjIdLogsLogEntryIdDelete) | **DELETE** /v30/products/{obj_id}/logs/{log_entry_id} | Delete LogEntry |
| [**v30ProductsObjIdLogsLogEntryIdGet()**](ProductsApi.md#v30ProductsObjIdLogsLogEntryIdGet) | **GET** /v30/products/{obj_id}/logs/{log_entry_id} | Retrieve LogEntry |
| [**v30ProductsObjIdLogsLogEntryIdPut()**](ProductsApi.md#v30ProductsObjIdLogsLogEntryIdPut) | **PUT** /v30/products/{obj_id}/logs/{log_entry_id} | Update LogEntry |
| [**v30ProductsObjIdLogsPost()**](ProductsApi.md#v30ProductsObjIdLogsPost) | **POST** /v30/products/{obj_id}/logs | Create LogEntry |
| [**v30ProductsObjIdPut()**](ProductsApi.md#v30ProductsObjIdPut) | **PUT** /v30/products/{obj_id} | Update Product |
| [**v30ProductsPost()**](ProductsApi.md#v30ProductsPost) | **POST** /v30/products | Create Product |


## `v30ProductsGet()`

```php
v30ProductsGet($published, $status, $folder_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\ProductPagination
```

List Products



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$status = 'status_example'; // string | Filter on `status`
$folder_id = array('folder_id_example'); // string[] | Filter by Folder
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30ProductsGet($published, $status, $folder_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **status** | **string**| Filter on &#x60;status&#x60; | [optional] |
| **folder_id** | [**string[]**](../Model/string.md)| Filter by Folder | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\ProductPagination**](../Model/ProductPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30ProductsObjIdDelete()`

```php
v30ProductsObjIdDelete($obj_id)
```

Delete Product



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30ProductsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30ProductsObjIdGet()`

```php
v30ProductsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\Product
```

Retrieve Product



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30ProductsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Product**](../Model/Product.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30ProductsObjIdLogsGet()`

```php
v30ProductsObjIdLogsGet($obj_id, $author_id, $type, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\LogEntryPagination
```

List LogEntries

List log entries. Log entries can be of type `note`, `task`, `action` or `change`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
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
    $result = $apiInstance->v30ProductsObjIdLogsGet($obj_id, $author_id, $type, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdLogsGet: ', $e->getMessage(), PHP_EOL;
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

## `v30ProductsObjIdLogsLogEntryIdDelete()`

```php
v30ProductsObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id)
```

Delete LogEntry

Delete a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int

try {
    $apiInstance->v30ProductsObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdLogsLogEntryIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30ProductsObjIdLogsLogEntryIdGet()`

```php
v30ProductsObjIdLogsLogEntryIdGet($obj_id, $log_entry_id): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Retrieve LogEntry



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int

try {
    $result = $apiInstance->v30ProductsObjIdLogsLogEntryIdGet($obj_id, $log_entry_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdLogsLogEntryIdGet: ', $e->getMessage(), PHP_EOL;
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

## `v30ProductsObjIdLogsLogEntryIdPut()`

```php
v30ProductsObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $update_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Update LogEntry

## Update a log entry  ### Limitations: This is only possible for log entries of type `note` or `task`.  ### Updating simple fields: For notes, only the `text` field can be updated. For tasks, it's also possible to update the assignee through the `assignee_type` and `assignee_id` fields.  ### Marking tasks as completed: Tasks can also be marked as complete by setting `is_completed` to true and optionally setting `completed_by_id` to the ID of the user that completed the task. If `completed_by_id` is not set, the current user will be used.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int
$update_log_entry = new \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry

try {
    $result = $apiInstance->v30ProductsObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $update_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdLogsLogEntryIdPut: ', $e->getMessage(), PHP_EOL;
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

## `v30ProductsObjIdLogsPost()`

```php
v30ProductsObjIdLogsPost($obj_id, $create_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Create LogEntry

Create a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$create_log_entry = new \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry

try {
    $result = $apiInstance->v30ProductsObjIdLogsPost($obj_id, $create_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdLogsPost: ', $e->getMessage(), PHP_EOL;
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

## `v30ProductsObjIdPut()`

```php
v30ProductsObjIdPut($obj_id, $product): \NathanEmanuel\Congressus\Rest\Model\Product
```

Update Product



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$product = new \NathanEmanuel\Congressus\Rest\Model\Product(); // \NathanEmanuel\Congressus\Rest\Model\Product

try {
    $result = $apiInstance->v30ProductsObjIdPut($obj_id, $product);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **product** | [**\NathanEmanuel\Congressus\Rest\Model\Product**](../Model/Product.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Product**](../Model/Product.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30ProductsPost()`

```php
v30ProductsPost($product): \NathanEmanuel\Congressus\Rest\Model\Product
```

Create Product



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product = new \NathanEmanuel\Congressus\Rest\Model\Product(); // \NathanEmanuel\Congressus\Rest\Model\Product

try {
    $result = $apiInstance->v30ProductsPost($product);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->v30ProductsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product** | [**\NathanEmanuel\Congressus\Rest\Model\Product**](../Model/Product.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Product**](../Model/Product.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
