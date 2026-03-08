# NathanEmanuel\Congressus\Rest\StorageFoldersApi

Storage folders are used to organise documents and other media files. Storage folders can have children, which allows for a hierarchical structure.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30StorageFoldersGet()**](StorageFoldersApi.md#v30StorageFoldersGet) | **GET** /v30/storage-folders | List Storage folders |
| [**v30StorageFoldersObjIdDelete()**](StorageFoldersApi.md#v30StorageFoldersObjIdDelete) | **DELETE** /v30/storage-folders/{obj_id} | Delete Storage folder |
| [**v30StorageFoldersObjIdGet()**](StorageFoldersApi.md#v30StorageFoldersObjIdGet) | **GET** /v30/storage-folders/{obj_id} | Retrieve Storage folder |
| [**v30StorageFoldersObjIdPut()**](StorageFoldersApi.md#v30StorageFoldersObjIdPut) | **PUT** /v30/storage-folders/{obj_id} | Update Storage folder |
| [**v30StorageFoldersPost()**](StorageFoldersApi.md#v30StorageFoldersPost) | **POST** /v30/storage-folders | Create Storage folder |
| [**v30StorageFoldersRecursiveGet()**](StorageFoldersApi.md#v30StorageFoldersRecursiveGet) | **GET** /v30/storage-folders/recursive | List Storage folders - recursive |


## `v30StorageFoldersGet()`

```php
v30StorageFoldersGet($published, $parent_id, $term, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\StorageFolderPagination
```

List Storage folders



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$parent_id = 'parent_id_example'; // string
$term = 'term_example'; // string
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30StorageFoldersGet($published, $parent_id, $term, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageFoldersApi->v30StorageFoldersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **parent_id** | **string**|  | [optional] |
| **term** | **string**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageFolderPagination**](../Model/StorageFolderPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StorageFoldersObjIdDelete()`

```php
v30StorageFoldersObjIdDelete($obj_id)
```

Delete Storage folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30StorageFoldersObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling StorageFoldersApi->v30StorageFoldersObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30StorageFoldersObjIdGet()`

```php
v30StorageFoldersObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\StorageFolder
```

Retrieve Storage folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30StorageFoldersObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageFoldersApi->v30StorageFoldersObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageFolder**](../Model/StorageFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StorageFoldersObjIdPut()`

```php
v30StorageFoldersObjIdPut($obj_id, $storage_folder): \NathanEmanuel\Congressus\Rest\Model\StorageFolder
```

Update Storage folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$storage_folder = new \NathanEmanuel\Congressus\Rest\Model\StorageFolder(); // \NathanEmanuel\Congressus\Rest\Model\StorageFolder

try {
    $result = $apiInstance->v30StorageFoldersObjIdPut($obj_id, $storage_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageFoldersApi->v30StorageFoldersObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **storage_folder** | [**\NathanEmanuel\Congressus\Rest\Model\StorageFolder**](../Model/StorageFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageFolder**](../Model/StorageFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StorageFoldersPost()`

```php
v30StorageFoldersPost($storage_folder): \NathanEmanuel\Congressus\Rest\Model\StorageFolder
```

Create Storage folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$storage_folder = new \NathanEmanuel\Congressus\Rest\Model\StorageFolder(); // \NathanEmanuel\Congressus\Rest\Model\StorageFolder

try {
    $result = $apiInstance->v30StorageFoldersPost($storage_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageFoldersApi->v30StorageFoldersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **storage_folder** | [**\NathanEmanuel\Congressus\Rest\Model\StorageFolder**](../Model/StorageFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageFolder**](../Model/StorageFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30StorageFoldersRecursiveGet()`

```php
v30StorageFoldersRecursiveGet($published, $parent_id, $term, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\StorageFolderListRecursivePagination
```

List Storage folders - recursive

Recursive list with all storage folders and their children. Added for convenience, e.g. when you     want to render a select dropdown with all folders.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\StorageFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$parent_id = 'parent_id_example'; // string
$term = 'term_example'; // string
$page = 1; // int
$page_size = 25; // int
$order = 'breadcrumbs'; // string

try {
    $result = $apiInstance->v30StorageFoldersRecursiveGet($published, $parent_id, $term, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageFoldersApi->v30StorageFoldersRecursiveGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **parent_id** | **string**|  | [optional] |
| **term** | **string**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;breadcrumbs&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\StorageFolderListRecursivePagination**](../Model/StorageFolderListRecursivePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
