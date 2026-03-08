# NathanEmanuel\Congressus\Rest\CommunicationApi

Communication

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30CommunicationSavedRepliesGet()**](CommunicationApi.md#v30CommunicationSavedRepliesGet) | **GET** /v30/communication/saved-replies | List saved replies |
| [**v30CommunicationSavedRepliesObjIdDelete()**](CommunicationApi.md#v30CommunicationSavedRepliesObjIdDelete) | **DELETE** /v30/communication/saved-replies/{obj_id} | Delete SavedReply |
| [**v30CommunicationSavedRepliesObjIdGet()**](CommunicationApi.md#v30CommunicationSavedRepliesObjIdGet) | **GET** /v30/communication/saved-replies/{obj_id} | Retrieve SavedReply |
| [**v30CommunicationSavedRepliesObjIdPut()**](CommunicationApi.md#v30CommunicationSavedRepliesObjIdPut) | **PUT** /v30/communication/saved-replies/{obj_id} | Update SavedReply |
| [**v30CommunicationSavedRepliesPost()**](CommunicationApi.md#v30CommunicationSavedRepliesPost) | **POST** /v30/communication/saved-replies | Create SavedReply |


## `v30CommunicationSavedRepliesGet()`

```php
v30CommunicationSavedRepliesGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\SavedReplyPagination
```

List saved replies



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CommunicationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'name:asc'; // string

try {
    $result = $apiInstance->v30CommunicationSavedRepliesGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunicationApi->v30CommunicationSavedRepliesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name:asc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SavedReplyPagination**](../Model/SavedReplyPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CommunicationSavedRepliesObjIdDelete()`

```php
v30CommunicationSavedRepliesObjIdDelete($obj_id)
```

Delete SavedReply



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CommunicationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30CommunicationSavedRepliesObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling CommunicationApi->v30CommunicationSavedRepliesObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30CommunicationSavedRepliesObjIdGet()`

```php
v30CommunicationSavedRepliesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\SavedReply
```

Retrieve SavedReply



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CommunicationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30CommunicationSavedRepliesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunicationApi->v30CommunicationSavedRepliesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SavedReply**](../Model/SavedReply.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CommunicationSavedRepliesObjIdPut()`

```php
v30CommunicationSavedRepliesObjIdPut($obj_id, $saved_reply): \NathanEmanuel\Congressus\Rest\Model\SavedReply
```

Update SavedReply



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CommunicationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$saved_reply = new \NathanEmanuel\Congressus\Rest\Model\SavedReply(); // \NathanEmanuel\Congressus\Rest\Model\SavedReply

try {
    $result = $apiInstance->v30CommunicationSavedRepliesObjIdPut($obj_id, $saved_reply);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunicationApi->v30CommunicationSavedRepliesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **saved_reply** | [**\NathanEmanuel\Congressus\Rest\Model\SavedReply**](../Model/SavedReply.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SavedReply**](../Model/SavedReply.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CommunicationSavedRepliesPost()`

```php
v30CommunicationSavedRepliesPost($saved_reply): \NathanEmanuel\Congressus\Rest\Model\SavedReply
```

Create SavedReply



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CommunicationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$saved_reply = new \NathanEmanuel\Congressus\Rest\Model\SavedReply(); // \NathanEmanuel\Congressus\Rest\Model\SavedReply

try {
    $result = $apiInstance->v30CommunicationSavedRepliesPost($saved_reply);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunicationApi->v30CommunicationSavedRepliesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **saved_reply** | [**\NathanEmanuel\Congressus\Rest\Model\SavedReply**](../Model/SavedReply.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\SavedReply**](../Model/SavedReply.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
