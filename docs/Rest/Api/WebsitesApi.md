# NathanEmanuel\Congressus\Rest\WebsitesApi

Website objects represent a website  ## Data model - **Website** - Website including properties as language and URL  - **Webpage** - Pages linked to a Website. Have a parent/child relationship, so we can build a nice tree of Webpages

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30WebsitesGet()**](WebsitesApi.md#v30WebsitesGet) | **GET** /v30/websites | List Websites |
| [**v30WebsitesObjIdGet()**](WebsitesApi.md#v30WebsitesObjIdGet) | **GET** /v30/websites/{obj_id} | Retrieve Website |
| [**v30WebsitesObjIdWebpagesGet()**](WebsitesApi.md#v30WebsitesObjIdWebpagesGet) | **GET** /v30/websites/{obj_id}/webpages | List Webpages |


## `v30WebsitesGet()`

```php
v30WebsitesGet($published, $template_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\WebsitePagination
```

List Websites



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebsitesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$template_id = array('template_id_example'); // string[] | Filter by Website template
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30WebsitesGet($published, $template_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebsitesApi->v30WebsitesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **template_id** | [**string[]**](../Model/string.md)| Filter by Website template | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\WebsitePagination**](../Model/WebsitePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30WebsitesObjIdGet()`

```php
v30WebsitesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\Website
```

Retrieve Website



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebsitesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30WebsitesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebsitesApi->v30WebsitesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Website**](../Model/Website.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30WebsitesObjIdWebpagesGet()`

```php
v30WebsitesObjIdWebpagesGet($obj_id, $published, $website_id, $template_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\WebpagePagination
```

List Webpages

Retrieve the complete tree of Webpages on this Website.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebsitesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$published = 'published_example'; // string | Filter on `published`
$website_id = array('website_id_example'); // string[] | Filter by Website
$template_id = array('template_id_example'); // string[] | Filter by Template
$page = 1; // int
$page_size = 25; // int
$order = 'order'; // string

try {
    $result = $apiInstance->v30WebsitesObjIdWebpagesGet($obj_id, $published, $website_id, $template_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebsitesApi->v30WebsitesObjIdWebpagesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **website_id** | [**string[]**](../Model/string.md)| Filter by Website | [optional] |
| **template_id** | [**string[]**](../Model/string.md)| Filter by Template | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;order&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\WebpagePagination**](../Model/WebpagePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
