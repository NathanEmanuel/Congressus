# NathanEmanuel\Congressus\Rest\GroupFoldersApi

Group folders

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30GroupFoldersGet()**](GroupFoldersApi.md#v30GroupFoldersGet) | **GET** /v30/group-folders | List Group folders |
| [**v30GroupFoldersObjIdDelete()**](GroupFoldersApi.md#v30GroupFoldersObjIdDelete) | **DELETE** /v30/group-folders/{obj_id} | Delete Group folder |
| [**v30GroupFoldersObjIdGet()**](GroupFoldersApi.md#v30GroupFoldersObjIdGet) | **GET** /v30/group-folders/{obj_id} | Retrieve Group folder |
| [**v30GroupFoldersObjIdPut()**](GroupFoldersApi.md#v30GroupFoldersObjIdPut) | **PUT** /v30/group-folders/{obj_id} | Update Group folder |
| [**v30GroupFoldersPost()**](GroupFoldersApi.md#v30GroupFoldersPost) | **POST** /v30/group-folders | Create Group folder |
| [**v30GroupFoldersRecursiveGet()**](GroupFoldersApi.md#v30GroupFoldersRecursiveGet) | **GET** /v30/group-folders/recursive | List Group folders - recursive |


## `v30GroupFoldersGet()`

```php
v30GroupFoldersGet($published, $parent_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GroupFolderPagination
```

List Group folders



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupFoldersApi(
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
    $result = $apiInstance->v30GroupFoldersGet($published, $parent_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupFoldersApi->v30GroupFoldersGet: ', $e->getMessage(), PHP_EOL;
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

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolderPagination**](../Model/GroupFolderPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupFoldersObjIdDelete()`

```php
v30GroupFoldersObjIdDelete($obj_id)
```

Delete Group folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30GroupFoldersObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling GroupFoldersApi->v30GroupFoldersObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30GroupFoldersObjIdGet()`

```php
v30GroupFoldersObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\GroupFolder
```

Retrieve Group folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30GroupFoldersObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupFoldersApi->v30GroupFoldersObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupFoldersObjIdPut()`

```php
v30GroupFoldersObjIdPut($obj_id, $group_folder): \NathanEmanuel\Congressus\Rest\Model\GroupFolder
```

Update Group folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$group_folder = new \NathanEmanuel\Congressus\Rest\Model\GroupFolder(); // \NathanEmanuel\Congressus\Rest\Model\GroupFolder

try {
    $result = $apiInstance->v30GroupFoldersObjIdPut($obj_id, $group_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupFoldersApi->v30GroupFoldersObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **group_folder** | [**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupFoldersPost()`

```php
v30GroupFoldersPost($group_folder): \NathanEmanuel\Congressus\Rest\Model\GroupFolder
```

Create Group folder



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_folder = new \NathanEmanuel\Congressus\Rest\Model\GroupFolder(); // \NathanEmanuel\Congressus\Rest\Model\GroupFolder

try {
    $result = $apiInstance->v30GroupFoldersPost($group_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupFoldersApi->v30GroupFoldersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_folder** | [**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupFoldersRecursiveGet()`

```php
v30GroupFoldersRecursiveGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GroupFolderListRecursivePagination
```

List Group folders - recursive

Recursive list with all group folders and their children. Added for convenience, e.g. when you     want to render a select dropdown with all folders.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupFoldersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30GroupFoldersRecursiveGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupFoldersApi->v30GroupFoldersRecursiveGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolderListRecursivePagination**](../Model/GroupFolderListRecursivePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
