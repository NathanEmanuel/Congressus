# NathanEmanuel\Congressus\Rest\WebhooksApi

Webhooks are useful in a broad range of situations. When the state of an object changes, Congressus will perform a  HTTP request to the URL you provide. Based on the payload of the request, you can determine which action you need to  perform.  You can read more about webhooks at Congressus in the special section about Webhooks at the top of our API  documentation.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30WebhooksGet()**](WebhooksApi.md#v30WebhooksGet) | **GET** /v30/webhooks | List Webhooks |
| [**v30WebhooksObjIdCallsGet()**](WebhooksApi.md#v30WebhooksObjIdCallsGet) | **GET** /v30/webhooks/{obj_id}/calls | List Webhook calls |
| [**v30WebhooksObjIdDelete()**](WebhooksApi.md#v30WebhooksObjIdDelete) | **DELETE** /v30/webhooks/{obj_id} | Delete Webhook |
| [**v30WebhooksObjIdGet()**](WebhooksApi.md#v30WebhooksObjIdGet) | **GET** /v30/webhooks/{obj_id} | Retrieve Webhook |
| [**v30WebhooksObjIdPut()**](WebhooksApi.md#v30WebhooksObjIdPut) | **PUT** /v30/webhooks/{obj_id} | Update Webhook |
| [**v30WebhooksPost()**](WebhooksApi.md#v30WebhooksPost) | **POST** /v30/webhooks | Create Webhook |


## `v30WebhooksGet()`

```php
v30WebhooksGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\WebhookPagination
```

List Webhooks



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30WebhooksGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->v30WebhooksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\WebhookPagination**](../Model/WebhookPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30WebhooksObjIdCallsGet()`

```php
v30WebhooksObjIdCallsGet($obj_id, $period_filter, $status_code, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\WebhookCallPagination
```

List Webhook calls



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$period_filter = 'period_filter_example'; // string | Filter period on `requested_at`
$status_code = array('status_code_example'); // string[] | Filter by Status code
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30WebhooksObjIdCallsGet($obj_id, $period_filter, $status_code, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->v30WebhooksObjIdCallsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **period_filter** | **string**| Filter period on &#x60;requested_at&#x60; | [optional] |
| **status_code** | [**string[]**](../Model/string.md)| Filter by Status code | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\WebhookCallPagination**](../Model/WebhookCallPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30WebhooksObjIdDelete()`

```php
v30WebhooksObjIdDelete($obj_id)
```

Delete Webhook



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30WebhooksObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->v30WebhooksObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30WebhooksObjIdGet()`

```php
v30WebhooksObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\Webhook
```

Retrieve Webhook



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30WebhooksObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->v30WebhooksObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Webhook**](../Model/Webhook.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30WebhooksObjIdPut()`

```php
v30WebhooksObjIdPut($obj_id, $webhook): \NathanEmanuel\Congressus\Rest\Model\Webhook
```

Update Webhook



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$webhook = new \NathanEmanuel\Congressus\Rest\Model\Webhook(); // \NathanEmanuel\Congressus\Rest\Model\Webhook

try {
    $result = $apiInstance->v30WebhooksObjIdPut($obj_id, $webhook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->v30WebhooksObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **webhook** | [**\NathanEmanuel\Congressus\Rest\Model\Webhook**](../Model/Webhook.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Webhook**](../Model/Webhook.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30WebhooksPost()`

```php
v30WebhooksPost($webhook): \NathanEmanuel\Congressus\Rest\Model\Webhook
```

Create Webhook



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook = new \NathanEmanuel\Congressus\Rest\Model\Webhook(); // \NathanEmanuel\Congressus\Rest\Model\Webhook

try {
    $result = $apiInstance->v30WebhooksPost($webhook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->v30WebhooksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook** | [**\NathanEmanuel\Congressus\Rest\Model\Webhook**](../Model/Webhook.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Webhook**](../Model/Webhook.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
