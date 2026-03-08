# NathanEmanuel\Congressus\Rest\BackgroundProcessesApi



All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30BackgroundProcessesGet()**](BackgroundProcessesApi.md#v30BackgroundProcessesGet) | **GET** /v30/background-processes | List Background processs |
| [**v30BackgroundProcessesObjIdGet()**](BackgroundProcessesApi.md#v30BackgroundProcessesObjIdGet) | **GET** /v30/background-processes/{obj_id} | Retrieve BackgroundProcess |
| [**v30BackgroundProcessesResultsObjIdGet()**](BackgroundProcessesApi.md#v30BackgroundProcessesResultsObjIdGet) | **GET** /v30/background-processes/results/{obj_id} | Retrieve BackgroundProcess |


## `v30BackgroundProcessesGet()`

```php
v30BackgroundProcessesGet($state, $created, $modified, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\BackgroundProcessPagination
```

List Background processs



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BackgroundProcessesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$state = array('state_example'); // string[] | Filter by State
$created = 'created_example'; // string | Filter period on `created`
$modified = 'modified_example'; // string | Filter period on `modified`
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30BackgroundProcessesGet($state, $created, $modified, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackgroundProcessesApi->v30BackgroundProcessesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **state** | [**string[]**](../Model/string.md)| Filter by State | [optional] |
| **created** | **string**| Filter period on &#x60;created&#x60; | [optional] |
| **modified** | **string**| Filter period on &#x60;modified&#x60; | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BackgroundProcessPagination**](../Model/BackgroundProcessPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BackgroundProcessesObjIdGet()`

```php
v30BackgroundProcessesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BackgroundProcess
```

Retrieve BackgroundProcess



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BackgroundProcessesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BackgroundProcessesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackgroundProcessesApi->v30BackgroundProcessesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BackgroundProcess**](../Model/BackgroundProcess.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BackgroundProcessesResultsObjIdGet()`

```php
v30BackgroundProcessesResultsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BackgroundProcessResult
```

Retrieve BackgroundProcess



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BackgroundProcessesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 'obj_id_example'; // string

try {
    $result = $apiInstance->v30BackgroundProcessesResultsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackgroundProcessesApi->v30BackgroundProcessesResultsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **string**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BackgroundProcessResult**](../Model/BackgroundProcessResult.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
