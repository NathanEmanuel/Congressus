# NathanEmanuel\Congressus\Rest\StorageApi

General layer for file storage objects like images and documents

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30StorageGet()**](StorageApi.md#v30StorageGet) | **GET** /v30/storage | List StorageObjects |
| [**v30StorageObjIdDelete()**](StorageApi.md#v30StorageObjIdDelete) | **DELETE** /v30/storage/{obj_id} | Delete StorageObject |
| [**v30StorageObjIdFileContentPut()**](StorageApi.md#v30StorageObjIdFileContentPut) | **PUT** /v30/storage/{obj_id}/file-content | Upload a file to an existing storage object |
| [**v30StorageObjIdGet()**](StorageApi.md#v30StorageObjIdGet) | **GET** /v30/storage/{obj_id} | Retrieve StorageObject |
| [**v30StorageObjIdPut()**](StorageApi.md#v30StorageObjIdPut) | **PUT** /v30/storage/{obj_id} | Update StorageObject |
| [**v30StoragePost()**](StorageApi.md#v30StoragePost) | **POST** /v30/storage | Create StorageObject |


## `v30StorageGet()`

```php
v30StorageGet($folder_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\StorageObjectPagination
```

List StorageObjects



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$folder_id = array('folder_id_example'); // string[] | Filter by Folder
$page = 1; // int
$page_size = 25; // int
$order = 'id'; // string

try {
    $result = $apiInstance->v30StorageGet($folder_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->v30StorageGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **folder_id** | [**string[]**](../Model/string.md)| Filter by Folder | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;id&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageObjectPagination**](../Model/StorageObjectPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StorageObjIdDelete()`

```php
v30StorageObjIdDelete($obj_id)
```

Delete StorageObject



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30StorageObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->v30StorageObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30StorageObjIdFileContentPut()`

```php
v30StorageObjIdFileContentPut($obj_id, $file)
```

Upload a file to an existing storage object

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$file = NULL; // mixed | The file to upload

try {
    $apiInstance->v30StorageObjIdFileContentPut($obj_id, $file);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->v30StorageObjIdFileContentPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **file** | [**mixed**](../Model/mixed.md)| The file to upload | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StorageObjIdGet()`

```php
v30StorageObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\StorageObject
```

Retrieve StorageObject



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30StorageObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->v30StorageObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](../Model/StorageObject.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StorageObjIdPut()`

```php
v30StorageObjIdPut($obj_id, $storage_object): \NathanEmanuel\Congressus\Rest\Model\StorageObject
```

Update StorageObject



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$storage_object = new \NathanEmanuel\Congressus\Rest\Model\StorageObject(); // \NathanEmanuel\Congressus\Rest\Model\StorageObject

try {
    $result = $apiInstance->v30StorageObjIdPut($obj_id, $storage_object);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->v30StorageObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **storage_object** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](../Model/StorageObject.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](../Model/StorageObject.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StoragePost()`

```php
v30StoragePost($storage_object): \NathanEmanuel\Congressus\Rest\Model\StorageObject
```

Create StorageObject



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$storage_object = new \NathanEmanuel\Congressus\Rest\Model\StorageObject(); // \NathanEmanuel\Congressus\Rest\Model\StorageObject

try {
    $result = $apiInstance->v30StoragePost($storage_object);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->v30StoragePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **storage_object** | [**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](../Model/StorageObject.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageObject**](../Model/StorageObject.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
