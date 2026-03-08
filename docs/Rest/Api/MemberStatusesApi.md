# NathanEmanuel\Congressus\Rest\MemberStatusesApi



All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30MemberStatusesGet()**](MemberStatusesApi.md#v30MemberStatusesGet) | **GET** /v30/member-statuses | List Member statuses |
| [**v30MemberStatusesObjIdDelete()**](MemberStatusesApi.md#v30MemberStatusesObjIdDelete) | **DELETE** /v30/member-statuses/{obj_id} | Delete Member status |
| [**v30MemberStatusesObjIdGet()**](MemberStatusesApi.md#v30MemberStatusesObjIdGet) | **GET** /v30/member-statuses/{obj_id} | Retrieve Member status |
| [**v30MemberStatusesObjIdPut()**](MemberStatusesApi.md#v30MemberStatusesObjIdPut) | **PUT** /v30/member-statuses/{obj_id} | Update Member status |


## `v30MemberStatusesGet()`

```php
v30MemberStatusesGet($archived, $hidden, $deceased, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\MemberStatusListPagination
```

List Member statuses

Use the _include_hidden_ parameter to include hidden member statuses. Hidden member statuses     are not shown by default.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MemberStatusesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$archived = 'archived_example'; // string | Filter on `archived`
$hidden = 'hidden_example'; // string | Filter on `hidden`
$deceased = 'deceased_example'; // string | Filter on `is_deceased`
$page = 1; // int
$page_size = 25; // int
$order = 'hidden:asc,archived:asc,order:asc,name:asc'; // string

try {
    $result = $apiInstance->v30MemberStatusesGet($archived, $hidden, $deceased, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MemberStatusesApi->v30MemberStatusesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **archived** | **string**| Filter on &#x60;archived&#x60; | [optional] |
| **hidden** | **string**| Filter on &#x60;hidden&#x60; | [optional] |
| **deceased** | **string**| Filter on &#x60;is_deceased&#x60; | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;hidden:asc,archived:asc,order:asc,name:asc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberStatusListPagination**](../Model/MemberStatusListPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MemberStatusesObjIdDelete()`

```php
v30MemberStatusesObjIdDelete($obj_id)
```

Delete Member status



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MemberStatusesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30MemberStatusesObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling MemberStatusesApi->v30MemberStatusesObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30MemberStatusesObjIdGet()`

```php
v30MemberStatusesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\MemberStatusWithFieldSettings
```

Retrieve Member status



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MemberStatusesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30MemberStatusesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MemberStatusesApi->v30MemberStatusesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberStatusWithFieldSettings**](../Model/MemberStatusWithFieldSettings.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MemberStatusesObjIdPut()`

```php
v30MemberStatusesObjIdPut($obj_id, $member_status_with_field_settings): \NathanEmanuel\Congressus\Rest\Model\MemberStatusWithFieldSettings
```

Update Member status



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MemberStatusesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$member_status_with_field_settings = new \NathanEmanuel\Congressus\Rest\Model\MemberStatusWithFieldSettings(); // \NathanEmanuel\Congressus\Rest\Model\MemberStatusWithFieldSettings

try {
    $result = $apiInstance->v30MemberStatusesObjIdPut($obj_id, $member_status_with_field_settings);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MemberStatusesApi->v30MemberStatusesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **member_status_with_field_settings** | [**\NathanEmanuel\Congressus\Rest\Model\MemberStatusWithFieldSettings**](../Model/MemberStatusWithFieldSettings.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberStatusWithFieldSettings**](../Model/MemberStatusWithFieldSettings.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
