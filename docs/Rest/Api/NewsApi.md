# NathanEmanuel\Congressus\Rest\NewsApi

News

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30NewsGet()**](NewsApi.md#v30NewsGet) | **GET** /v30/news | List News |
| [**v30NewsObjIdDelete()**](NewsApi.md#v30NewsObjIdDelete) | **DELETE** /v30/news/{obj_id} | Delete News |
| [**v30NewsObjIdGet()**](NewsApi.md#v30NewsObjIdGet) | **GET** /v30/news/{obj_id} | Retrieve News |
| [**v30NewsObjIdLogsGet()**](NewsApi.md#v30NewsObjIdLogsGet) | **GET** /v30/news/{obj_id}/logs | List LogEntries |
| [**v30NewsObjIdLogsLogEntryIdDelete()**](NewsApi.md#v30NewsObjIdLogsLogEntryIdDelete) | **DELETE** /v30/news/{obj_id}/logs/{log_entry_id} | Delete LogEntry |
| [**v30NewsObjIdLogsLogEntryIdGet()**](NewsApi.md#v30NewsObjIdLogsLogEntryIdGet) | **GET** /v30/news/{obj_id}/logs/{log_entry_id} | Retrieve LogEntry |
| [**v30NewsObjIdLogsLogEntryIdPut()**](NewsApi.md#v30NewsObjIdLogsLogEntryIdPut) | **PUT** /v30/news/{obj_id}/logs/{log_entry_id} | Update LogEntry |
| [**v30NewsObjIdLogsPost()**](NewsApi.md#v30NewsObjIdLogsPost) | **POST** /v30/news/{obj_id}/logs | Create LogEntry |
| [**v30NewsObjIdPut()**](NewsApi.md#v30NewsObjIdPut) | **PUT** /v30/news/{obj_id} | Update News |
| [**v30NewsPost()**](NewsApi.md#v30NewsPost) | **POST** /v30/news | Create News |


## `v30NewsGet()`

```php
v30NewsGet($period_filter, $actual, $comments_open, $visibility, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\NewsPagination
```

List News



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period_filter = 'period_filter_example'; // string | Filter period on `published_from`
$actual = 'actual_example'; // string | Filter on `actual`
$comments_open = 'comments_open_example'; // string | Filter on `comments_open`
$visibility = array('visibility_example'); // string[] | Filter by Visibility
$page = 1; // int
$page_size = 25; // int
$order = 'published_from:desc'; // string

try {
    $result = $apiInstance->v30NewsGet($period_filter, $actual, $comments_open, $visibility, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period_filter** | **string**| Filter period on &#x60;published_from&#x60; | [optional] |
| **actual** | **string**| Filter on &#x60;actual&#x60; | [optional] |
| **comments_open** | **string**| Filter on &#x60;comments_open&#x60; | [optional] |
| **visibility** | [**string[]**](../Model/string.md)| Filter by Visibility | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;published_from:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\NewsPagination**](../Model/NewsPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30NewsObjIdDelete()`

```php
v30NewsObjIdDelete($obj_id)
```

Delete News



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30NewsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30NewsObjIdGet()`

```php
v30NewsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\News
```

Retrieve News



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30NewsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\News**](../Model/News.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30NewsObjIdLogsGet()`

```php
v30NewsObjIdLogsGet($obj_id, $author_id, $type, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\LogEntryPagination
```

List LogEntries

List log entries. Log entries can be of type `note`, `task`, `action` or `change`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
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
    $result = $apiInstance->v30NewsObjIdLogsGet($obj_id, $author_id, $type, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdLogsGet: ', $e->getMessage(), PHP_EOL;
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

## `v30NewsObjIdLogsLogEntryIdDelete()`

```php
v30NewsObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id)
```

Delete LogEntry

Delete a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int

try {
    $apiInstance->v30NewsObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdLogsLogEntryIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30NewsObjIdLogsLogEntryIdGet()`

```php
v30NewsObjIdLogsLogEntryIdGet($obj_id, $log_entry_id): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Retrieve LogEntry



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int

try {
    $result = $apiInstance->v30NewsObjIdLogsLogEntryIdGet($obj_id, $log_entry_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdLogsLogEntryIdGet: ', $e->getMessage(), PHP_EOL;
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

## `v30NewsObjIdLogsLogEntryIdPut()`

```php
v30NewsObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $update_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Update LogEntry

## Update a log entry  ### Limitations: This is only possible for log entries of type `note` or `task`.  ### Updating simple fields: For notes, only the `text` field can be updated. For tasks, it's also possible to update the assignee through the `assignee_type` and `assignee_id` fields.  ### Marking tasks as completed: Tasks can also be marked as complete by setting `is_completed` to true and optionally setting `completed_by_id` to the ID of the user that completed the task. If `completed_by_id` is not set, the current user will be used.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$log_entry_id = 56; // int
$update_log_entry = new \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry

try {
    $result = $apiInstance->v30NewsObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $update_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdLogsLogEntryIdPut: ', $e->getMessage(), PHP_EOL;
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

## `v30NewsObjIdLogsPost()`

```php
v30NewsObjIdLogsPost($obj_id, $create_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Create LogEntry

Create a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$create_log_entry = new \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry

try {
    $result = $apiInstance->v30NewsObjIdLogsPost($obj_id, $create_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdLogsPost: ', $e->getMessage(), PHP_EOL;
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

## `v30NewsObjIdPut()`

```php
v30NewsObjIdPut($obj_id, $news): \NathanEmanuel\Congressus\Rest\Model\News
```

Update News



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$news = new \NathanEmanuel\Congressus\Rest\Model\News(); // \NathanEmanuel\Congressus\Rest\Model\News

try {
    $result = $apiInstance->v30NewsObjIdPut($obj_id, $news);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **news** | [**\NathanEmanuel\Congressus\Rest\Model\News**](../Model/News.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\News**](../Model/News.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30NewsPost()`

```php
v30NewsPost($news): \NathanEmanuel\Congressus\Rest\Model\News
```

Create News



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\NewsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$news = new \NathanEmanuel\Congressus\Rest\Model\News(); // \NathanEmanuel\Congressus\Rest\Model\News

try {
    $result = $apiInstance->v30NewsPost($news);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NewsApi->v30NewsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **news** | [**\NathanEmanuel\Congressus\Rest\Model\News**](../Model/News.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\News**](../Model/News.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
