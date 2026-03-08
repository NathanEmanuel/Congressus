# NathanEmanuel\Congressus\Rest\OrganisationsApi

Organisations are used as a special kind of group. Organisations have a profile which can be published on the website.  Members can be related to the Organisation, for example as employees or owners of the Organisation.  ## Data model - **Organisation**. - **OrganisationCategory** - Defines category and basic publication settings for the associated organisations. Each  organisation has exactly one category.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30OrganisationsCategoriesGet()**](OrganisationsApi.md#v30OrganisationsCategoriesGet) | **GET** /v30/organisations/categories | List Organisation categories |
| [**v30OrganisationsCategoriesObjIdDelete()**](OrganisationsApi.md#v30OrganisationsCategoriesObjIdDelete) | **DELETE** /v30/organisations/categories/{obj_id} | Delete Organisation category |
| [**v30OrganisationsCategoriesObjIdGet()**](OrganisationsApi.md#v30OrganisationsCategoriesObjIdGet) | **GET** /v30/organisations/categories/{obj_id} | Retrieve Organisation category |
| [**v30OrganisationsCategoriesObjIdPut()**](OrganisationsApi.md#v30OrganisationsCategoriesObjIdPut) | **PUT** /v30/organisations/categories/{obj_id} | Update Organisation category |
| [**v30OrganisationsCategoriesPost()**](OrganisationsApi.md#v30OrganisationsCategoriesPost) | **POST** /v30/organisations/categories | Create Organisation category |
| [**v30OrganisationsGet()**](OrganisationsApi.md#v30OrganisationsGet) | **GET** /v30/organisations | List Organisations |
| [**v30OrganisationsMembershipsGet()**](OrganisationsApi.md#v30OrganisationsMembershipsGet) | **GET** /v30/organisations/memberships | List Organisation memberships |
| [**v30OrganisationsMembershipsObjIdDelete()**](OrganisationsApi.md#v30OrganisationsMembershipsObjIdDelete) | **DELETE** /v30/organisations/memberships/{obj_id} | Delete Organisation membership |
| [**v30OrganisationsMembershipsObjIdGet()**](OrganisationsApi.md#v30OrganisationsMembershipsObjIdGet) | **GET** /v30/organisations/memberships/{obj_id} | Retrieve Organisation membership |
| [**v30OrganisationsMembershipsObjIdPut()**](OrganisationsApi.md#v30OrganisationsMembershipsObjIdPut) | **PUT** /v30/organisations/memberships/{obj_id} | Update Organisation membership |
| [**v30OrganisationsMembershipsPost()**](OrganisationsApi.md#v30OrganisationsMembershipsPost) | **POST** /v30/organisations/memberships | Create Organisation membership |
| [**v30OrganisationsObjIdDelete()**](OrganisationsApi.md#v30OrganisationsObjIdDelete) | **DELETE** /v30/organisations/{obj_id} | Delete Organisation |
| [**v30OrganisationsObjIdGet()**](OrganisationsApi.md#v30OrganisationsObjIdGet) | **GET** /v30/organisations/{obj_id} | Retrieve Organisation |
| [**v30OrganisationsObjIdPut()**](OrganisationsApi.md#v30OrganisationsObjIdPut) | **PUT** /v30/organisations/{obj_id} | Update Organisation |
| [**v30OrganisationsPost()**](OrganisationsApi.md#v30OrganisationsPost) | **POST** /v30/organisations | Create Organisation |


## `v30OrganisationsCategoriesGet()`

```php
v30OrganisationsCategoriesGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryPagination
```

List Organisation categories



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30OrganisationsCategoriesGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsCategoriesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryPagination**](../Model/OrganisationCategoryPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsCategoriesObjIdDelete()`

```php
v30OrganisationsCategoriesObjIdDelete($obj_id)
```

Delete Organisation category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30OrganisationsCategoriesObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsCategoriesObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30OrganisationsCategoriesObjIdGet()`

```php
v30OrganisationsCategoriesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryWithCustomFieldMetadata
```

Retrieve Organisation category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30OrganisationsCategoriesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsCategoriesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryWithCustomFieldMetadata**](../Model/OrganisationCategoryWithCustomFieldMetadata.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsCategoriesObjIdPut()`

```php
v30OrganisationsCategoriesObjIdPut($obj_id, $organisation_category_with_custom_field_metadata): \NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryWithCustomFieldMetadata
```

Update Organisation category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$organisation_category_with_custom_field_metadata = new \NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryWithCustomFieldMetadata(); // \NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryWithCustomFieldMetadata

try {
    $result = $apiInstance->v30OrganisationsCategoriesObjIdPut($obj_id, $organisation_category_with_custom_field_metadata);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsCategoriesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **organisation_category_with_custom_field_metadata** | [**\NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryWithCustomFieldMetadata**](../Model/OrganisationCategoryWithCustomFieldMetadata.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationCategoryWithCustomFieldMetadata**](../Model/OrganisationCategoryWithCustomFieldMetadata.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsCategoriesPost()`

```php
v30OrganisationsCategoriesPost($organisation_category): \NathanEmanuel\Congressus\Rest\Model\OrganisationCategory
```

Create Organisation category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$organisation_category = new \NathanEmanuel\Congressus\Rest\Model\OrganisationCategory(); // \NathanEmanuel\Congressus\Rest\Model\OrganisationCategory

try {
    $result = $apiInstance->v30OrganisationsCategoriesPost($organisation_category);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsCategoriesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **organisation_category** | [**\NathanEmanuel\Congressus\Rest\Model\OrganisationCategory**](../Model/OrganisationCategory.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationCategory**](../Model/OrganisationCategory.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsGet()`

```php
v30OrganisationsGet($category_id, $sbi_code, $legal_form, $member_id, $publication, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\OrganisationPagination
```

List Organisations



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$category_id = array('category_id_example'); // string[] | Filter by Category
$sbi_code = array('sbi_code_example'); // string[] | Filter by SBI code
$legal_form = array('legal_form_example'); // string[] | Filter by Legal form
$member_id = array('member_id_example'); // string[] | Filter by Member
$publication = 'publication_example'; // string | Filter on `publication`
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30OrganisationsGet($category_id, $sbi_code, $legal_form, $member_id, $publication, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **category_id** | [**string[]**](../Model/string.md)| Filter by Category | [optional] |
| **sbi_code** | [**string[]**](../Model/string.md)| Filter by SBI code | [optional] |
| **legal_form** | [**string[]**](../Model/string.md)| Filter by Legal form | [optional] |
| **member_id** | [**string[]**](../Model/string.md)| Filter by Member | [optional] |
| **publication** | **string**| Filter on &#x60;publication&#x60; | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationPagination**](../Model/OrganisationPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsMembershipsGet()`

```php
v30OrganisationsMembershipsGet($organisation_id, $member_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\OrganisationMembershipPagination
```

List Organisation memberships



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$organisation_id = array('organisation_id_example'); // string[] | Filter by Organisation
$member_id = array('member_id_example'); // string[] | Filter by Member
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30OrganisationsMembershipsGet($organisation_id, $member_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsMembershipsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **organisation_id** | [**string[]**](../Model/string.md)| Filter by Organisation | [optional] |
| **member_id** | [**string[]**](../Model/string.md)| Filter by Member | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationMembershipPagination**](../Model/OrganisationMembershipPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsMembershipsObjIdDelete()`

```php
v30OrganisationsMembershipsObjIdDelete($obj_id)
```

Delete Organisation membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30OrganisationsMembershipsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsMembershipsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30OrganisationsMembershipsObjIdGet()`

```php
v30OrganisationsMembershipsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\OrganisationMembership
```

Retrieve Organisation membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30OrganisationsMembershipsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsMembershipsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationMembership**](../Model/OrganisationMembership.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsMembershipsObjIdPut()`

```php
v30OrganisationsMembershipsObjIdPut($obj_id, $organisation_membership): \NathanEmanuel\Congressus\Rest\Model\OrganisationMembership
```

Update Organisation membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$organisation_membership = new \NathanEmanuel\Congressus\Rest\Model\OrganisationMembership(); // \NathanEmanuel\Congressus\Rest\Model\OrganisationMembership

try {
    $result = $apiInstance->v30OrganisationsMembershipsObjIdPut($obj_id, $organisation_membership);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsMembershipsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **organisation_membership** | [**\NathanEmanuel\Congressus\Rest\Model\OrganisationMembership**](../Model/OrganisationMembership.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationMembership**](../Model/OrganisationMembership.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsMembershipsPost()`

```php
v30OrganisationsMembershipsPost($organisation_membership): \NathanEmanuel\Congressus\Rest\Model\OrganisationMembership
```

Create Organisation membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$organisation_membership = new \NathanEmanuel\Congressus\Rest\Model\OrganisationMembership(); // \NathanEmanuel\Congressus\Rest\Model\OrganisationMembership

try {
    $result = $apiInstance->v30OrganisationsMembershipsPost($organisation_membership);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsMembershipsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **organisation_membership** | [**\NathanEmanuel\Congressus\Rest\Model\OrganisationMembership**](../Model/OrganisationMembership.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationMembership**](../Model/OrganisationMembership.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsObjIdDelete()`

```php
v30OrganisationsObjIdDelete($obj_id)
```

Delete Organisation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30OrganisationsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30OrganisationsObjIdGet()`

```php
v30OrganisationsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\OrganisationWithCustomFields
```

Retrieve Organisation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30OrganisationsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationWithCustomFields**](../Model/OrganisationWithCustomFields.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsObjIdPut()`

```php
v30OrganisationsObjIdPut($obj_id, $organisation_with_custom_fields): \NathanEmanuel\Congressus\Rest\Model\OrganisationWithCustomFields
```

Update Organisation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$organisation_with_custom_fields = new \NathanEmanuel\Congressus\Rest\Model\OrganisationWithCustomFields(); // \NathanEmanuel\Congressus\Rest\Model\OrganisationWithCustomFields

try {
    $result = $apiInstance->v30OrganisationsObjIdPut($obj_id, $organisation_with_custom_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **organisation_with_custom_fields** | [**\NathanEmanuel\Congressus\Rest\Model\OrganisationWithCustomFields**](../Model/OrganisationWithCustomFields.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\OrganisationWithCustomFields**](../Model/OrganisationWithCustomFields.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30OrganisationsPost()`

```php
v30OrganisationsPost($organisation): \NathanEmanuel\Congressus\Rest\Model\Organisation
```

Create Organisation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\OrganisationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$organisation = new \NathanEmanuel\Congressus\Rest\Model\Organisation(); // \NathanEmanuel\Congressus\Rest\Model\Organisation

try {
    $result = $apiInstance->v30OrganisationsPost($organisation);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrganisationsApi->v30OrganisationsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **organisation** | [**\NathanEmanuel\Congressus\Rest\Model\Organisation**](../Model/Organisation.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Organisation**](../Model/Organisation.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
