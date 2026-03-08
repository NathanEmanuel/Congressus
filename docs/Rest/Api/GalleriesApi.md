# NathanEmanuel\Congressus\Rest\GalleriesApi

Photo galleries

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30GalleriesAlbumsAlbumIdPhotosGet()**](GalleriesApi.md#v30GalleriesAlbumsAlbumIdPhotosGet) | **GET** /v30/galleries/albums/{album_id}/photos | List Gallery photos |
| [**v30GalleriesAlbumsAlbumIdPhotosObjIdGet()**](GalleriesApi.md#v30GalleriesAlbumsAlbumIdPhotosObjIdGet) | **GET** /v30/galleries/albums/{album_id}/photos/{obj_id} | Retrieve Gallery photo |
| [**v30GalleriesAlbumsGet()**](GalleriesApi.md#v30GalleriesAlbumsGet) | **GET** /v30/galleries/albums | List Gallery albums |
| [**v30GalleriesAlbumsObjIdGet()**](GalleriesApi.md#v30GalleriesAlbumsObjIdGet) | **GET** /v30/galleries/albums/{obj_id} | Retrieve Gallery album |


## `v30GalleriesAlbumsAlbumIdPhotosGet()`

```php
v30GalleriesAlbumsAlbumIdPhotosGet($album_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GalleryPhotoPagination
```

List Gallery photos



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GalleriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$album_id = 56; // int
$page = 1; // int
$page_size = 25; // int
$order = 'order'; // string

try {
    $result = $apiInstance->v30GalleriesAlbumsAlbumIdPhotosGet($album_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GalleriesApi->v30GalleriesAlbumsAlbumIdPhotosGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **album_id** | **int**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;order&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GalleryPhotoPagination**](../Model/GalleryPhotoPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GalleriesAlbumsAlbumIdPhotosObjIdGet()`

```php
v30GalleriesAlbumsAlbumIdPhotosObjIdGet($obj_id, $album_id): \NathanEmanuel\Congressus\Rest\Model\GalleryPhoto
```

Retrieve Gallery photo



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GalleriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$album_id = 56; // int

try {
    $result = $apiInstance->v30GalleriesAlbumsAlbumIdPhotosObjIdGet($obj_id, $album_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GalleriesApi->v30GalleriesAlbumsAlbumIdPhotosObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **album_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GalleryPhoto**](../Model/GalleryPhoto.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GalleriesAlbumsGet()`

```php
v30GalleriesAlbumsGet($socie_app, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GalleryAlbumPagination
```

List Gallery albums



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GalleriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$socie_app = 'socie_app_example'; // string | Filter on `filter_id`, `published`
$page = 1; // int
$page_size = 25; // int
$order = 'order'; // string

try {
    $result = $apiInstance->v30GalleriesAlbumsGet($socie_app, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GalleriesApi->v30GalleriesAlbumsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **socie_app** | **string**| Filter on &#x60;filter_id&#x60;, &#x60;published&#x60; | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;order&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GalleryAlbumPagination**](../Model/GalleryAlbumPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GalleriesAlbumsObjIdGet()`

```php
v30GalleriesAlbumsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\GalleryAlbum
```

Retrieve Gallery album



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GalleriesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30GalleriesAlbumsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GalleriesApi->v30GalleriesAlbumsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GalleryAlbum**](../Model/GalleryAlbum.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
