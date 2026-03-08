# NathanEmanuel\Congressus\Rest\CareerPartnersApi



All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30CareerPartnersCategoriesGet()**](CareerPartnersApi.md#v30CareerPartnersCategoriesGet) | **GET** /v30/career/partners/categories | List Career partner categories |
| [**v30CareerPartnersCategoriesObjIdDelete()**](CareerPartnersApi.md#v30CareerPartnersCategoriesObjIdDelete) | **DELETE** /v30/career/partners/categories/{obj_id} | Delete Career partner category |
| [**v30CareerPartnersCategoriesObjIdGet()**](CareerPartnersApi.md#v30CareerPartnersCategoriesObjIdGet) | **GET** /v30/career/partners/categories/{obj_id} | Retrieve Career partner category |
| [**v30CareerPartnersCategoriesObjIdPut()**](CareerPartnersApi.md#v30CareerPartnersCategoriesObjIdPut) | **PUT** /v30/career/partners/categories/{obj_id} | Update Career partner category |
| [**v30CareerPartnersCategoriesPost()**](CareerPartnersApi.md#v30CareerPartnersCategoriesPost) | **POST** /v30/career/partners/categories | Create Career partner category |
| [**v30CareerPartnersGet()**](CareerPartnersApi.md#v30CareerPartnersGet) | **GET** /v30/career/partners | List Career partners |
| [**v30CareerPartnersObjIdDelete()**](CareerPartnersApi.md#v30CareerPartnersObjIdDelete) | **DELETE** /v30/career/partners/{obj_id} | Delete Career partner |
| [**v30CareerPartnersObjIdGet()**](CareerPartnersApi.md#v30CareerPartnersObjIdGet) | **GET** /v30/career/partners/{obj_id} | Retrieve Career partner |
| [**v30CareerPartnersObjIdPut()**](CareerPartnersApi.md#v30CareerPartnersObjIdPut) | **PUT** /v30/career/partners/{obj_id} | Update Career partner |
| [**v30CareerPartnersPost()**](CareerPartnersApi.md#v30CareerPartnersPost) | **POST** /v30/career/partners | Create Career partner |


## `v30CareerPartnersCategoriesGet()`

```php
v30CareerPartnersCategoriesGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategoryPagination
```

List Career partner categories



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30CareerPartnersCategoriesGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersCategoriesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategoryPagination**](../Model/CareerPartnerCategoryPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CareerPartnersCategoriesObjIdDelete()`

```php
v30CareerPartnersCategoriesObjIdDelete($obj_id)
```

Delete Career partner category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30CareerPartnersCategoriesObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersCategoriesObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30CareerPartnersCategoriesObjIdGet()`

```php
v30CareerPartnersCategoriesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory
```

Retrieve Career partner category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30CareerPartnersCategoriesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersCategoriesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory**](../Model/CareerPartnerCategory.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CareerPartnersCategoriesObjIdPut()`

```php
v30CareerPartnersCategoriesObjIdPut($obj_id, $career_partner_category): \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory
```

Update Career partner category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$career_partner_category = new \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory(); // \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory

try {
    $result = $apiInstance->v30CareerPartnersCategoriesObjIdPut($obj_id, $career_partner_category);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersCategoriesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **career_partner_category** | [**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory**](../Model/CareerPartnerCategory.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory**](../Model/CareerPartnerCategory.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CareerPartnersCategoriesPost()`

```php
v30CareerPartnersCategoriesPost($career_partner_category): \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory
```

Create Career partner category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$career_partner_category = new \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory(); // \NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory

try {
    $result = $apiInstance->v30CareerPartnersCategoriesPost($career_partner_category);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersCategoriesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **career_partner_category** | [**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory**](../Model/CareerPartnerCategory.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerCategory**](../Model/CareerPartnerCategory.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CareerPartnersGet()`

```php
v30CareerPartnersGet($career_partner_category_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\CareerPartnerPagination
```

List Career partners



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$career_partner_category_id = array('career_partner_category_id_example'); // string[] | Filter by Category
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30CareerPartnersGet($career_partner_category_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **career_partner_category_id** | [**string[]**](../Model/string.md)| Filter by Category | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartnerPagination**](../Model/CareerPartnerPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CareerPartnersObjIdDelete()`

```php
v30CareerPartnersObjIdDelete($obj_id)
```

Delete Career partner



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30CareerPartnersObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30CareerPartnersObjIdGet()`

```php
v30CareerPartnersObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\CareerPartner
```

Retrieve Career partner



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30CareerPartnersObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartner**](../Model/CareerPartner.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CareerPartnersObjIdPut()`

```php
v30CareerPartnersObjIdPut($obj_id, $career_partner): \NathanEmanuel\Congressus\Rest\Model\CareerPartner
```

Update Career partner



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$career_partner = new \NathanEmanuel\Congressus\Rest\Model\CareerPartner(); // \NathanEmanuel\Congressus\Rest\Model\CareerPartner

try {
    $result = $apiInstance->v30CareerPartnersObjIdPut($obj_id, $career_partner);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **career_partner** | [**\NathanEmanuel\Congressus\Rest\Model\CareerPartner**](../Model/CareerPartner.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartner**](../Model/CareerPartner.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30CareerPartnersPost()`

```php
v30CareerPartnersPost($career_partner): \NathanEmanuel\Congressus\Rest\Model\CareerPartner
```

Create Career partner



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\CareerPartnersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$career_partner = new \NathanEmanuel\Congressus\Rest\Model\CareerPartner(); // \NathanEmanuel\Congressus\Rest\Model\CareerPartner

try {
    $result = $apiInstance->v30CareerPartnersPost($career_partner);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CareerPartnersApi->v30CareerPartnersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **career_partner** | [**\NathanEmanuel\Congressus\Rest\Model\CareerPartner**](../Model/CareerPartner.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CareerPartner**](../Model/CareerPartner.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
