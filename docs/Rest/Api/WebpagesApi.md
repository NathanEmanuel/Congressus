# NathanEmanuel\Congressus\Rest\WebpagesApi

Webpage objects represent a webpage on a Website  ## Data model  - **Webpage** - Pages linked to a Website. Have a parent/child relationship, so we can build a nice tree of Webpages - **ContentRow** - A webpage has one or more rows for with content (see remarks). - **ContentItem** - Section with content. Has a &#x60;size&#x60; which defines if the content has to be shown full width or not.   ## Content rows At this moment each Webpage has exactly one row with content. We plan to support multiple rows and row types in the  future e.g. CTA rows, rows with different background, etc.  The only additional information for content rows at this moment is the &#x60;order&#x60;. This order defaults to 1.   ## Content items A generic type, returning the content for a section of content shown on the webpage. We expect to expand on the  different content types in future updates of this API.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30WebpagesGet()**](WebpagesApi.md#v30WebpagesGet) | **GET** /v30/webpages | List Webpages |
| [**v30WebpagesObjIdGet()**](WebpagesApi.md#v30WebpagesObjIdGet) | **GET** /v30/webpages/{obj_id} | Retrieve Webpage |


## `v30WebpagesGet()`

```php
v30WebpagesGet($published, $website_id, $template_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\WebpagePagination
```

List Webpages



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebpagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$website_id = array('website_id_example'); // string[] | Filter by Website
$template_id = array('template_id_example'); // string[] | Filter by Template
$page = 1; // int
$page_size = 25; // int
$order = 'order'; // string

try {
    $result = $apiInstance->v30WebpagesGet($published, $website_id, $template_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebpagesApi->v30WebpagesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
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

## `v30WebpagesObjIdGet()`

```php
v30WebpagesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\WebpageWithContent
```

Retrieve Webpage



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\WebpagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30WebpagesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebpagesApi->v30WebpagesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\WebpageWithContent**](../Model/WebpageWithContent.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
