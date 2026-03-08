# NathanEmanuel\Congressus\Rest\ProductFoldersApi

Product folders

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30ProductFoldersGet()**](ProductFoldersApi.md#v30ProductFoldersGet) | **GET** /v30/product-folders | List Product folders |
| [**v30ProductFoldersObjIdDelete()**](ProductFoldersApi.md#v30ProductFoldersObjIdDelete) | **DELETE** /v30/product-folders/{obj_id} | Delete Product folder |
| [**v30ProductFoldersObjIdGet()**](ProductFoldersApi.md#v30ProductFoldersObjIdGet) | **GET** /v30/product-folders/{obj_id} | Retrieve Product folder |
| [**v30ProductFoldersObjIdPut()**](ProductFoldersApi.md#v30ProductFoldersObjIdPut) | **PUT** /v30/product-folders/{obj_id} | Update Product folder |
| [**v30ProductFoldersPost()**](ProductFoldersApi.md#v30ProductFoldersPost) | **POST** /v30/product-folders | Create Product folder |
| [**v30ProductFoldersRecursiveGet()**](ProductFoldersApi.md#v30ProductFoldersRecursiveGet) | **GET** /v30/product-folders/recursive | List Product folders - recursive |


## `v30ProductFoldersGet()`

```php
v30ProductFoldersGet($published, $parent_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\ProductFolderPagination
```

List Product folders



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$parent_id = 'parent_id_example'; // string
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30ProductFoldersGet($published, $parent_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductFoldersApi->v30ProductFoldersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **parent_id** | **string**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\ProductFolderPagination**](../Model/ProductFolderPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30ProductFoldersObjIdDelete()`

```php
v30ProductFoldersObjIdDelete($obj_id)
```

Delete Product folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30ProductFoldersObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling ProductFoldersApi->v30ProductFoldersObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30ProductFoldersObjIdGet()`

```php
v30ProductFoldersObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\ProductFolder
```

Retrieve Product folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30ProductFoldersObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductFoldersApi->v30ProductFoldersObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\ProductFolder**](../Model/ProductFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30ProductFoldersObjIdPut()`

```php
v30ProductFoldersObjIdPut($obj_id, $product_folder): \NathanEmanuel\Congressus\Rest\Model\ProductFolder
```

Update Product folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$product_folder = new \NathanEmanuel\Congressus\Rest\Model\ProductFolder(); // \NathanEmanuel\Congressus\Rest\Model\ProductFolder

try {
    $result = $apiInstance->v30ProductFoldersObjIdPut($obj_id, $product_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductFoldersApi->v30ProductFoldersObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **product_folder** | [**\NathanEmanuel\Congressus\Rest\Model\ProductFolder**](../Model/ProductFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\ProductFolder**](../Model/ProductFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30ProductFoldersPost()`

```php
v30ProductFoldersPost($product_folder): \NathanEmanuel\Congressus\Rest\Model\ProductFolder
```

Create Product folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_folder = new \NathanEmanuel\Congressus\Rest\Model\ProductFolder(); // \NathanEmanuel\Congressus\Rest\Model\ProductFolder

try {
    $result = $apiInstance->v30ProductFoldersPost($product_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductFoldersApi->v30ProductFoldersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **product_folder** | [**\NathanEmanuel\Congressus\Rest\Model\ProductFolder**](../Model/ProductFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\ProductFolder**](../Model/ProductFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30ProductFoldersRecursiveGet()`

```php
v30ProductFoldersRecursiveGet($published, $parent_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\ProductFolderListRecursivePagination
```

List Product folders - recursive

Recursive list with all product folders and their children. Added for convenience, e.g. when you     want to render a select dropdown with all folders.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ProductFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$parent_id = 'parent_id_example'; // string
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30ProductFoldersRecursiveGet($published, $parent_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductFoldersApi->v30ProductFoldersRecursiveGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **parent_id** | **string**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\ProductFolderListRecursivePagination**](../Model/ProductFolderListRecursivePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
