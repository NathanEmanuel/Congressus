# NathanEmanuel\Congressus\Rest\FormsApi

Forms can be used standalone on a webpage or to collect additional information for other resources e.g. event participations.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30FormsFormIdEntriesGet()**](FormsApi.md#v30FormsFormIdEntriesGet) | **GET** /v30/forms/{form_id}/entries | List Form entries |
| [**v30FormsFormIdEntriesObjIdGet()**](FormsApi.md#v30FormsFormIdEntriesObjIdGet) | **GET** /v30/forms/{form_id}/entries/{obj_id} | Retrieve Form entry |
| [**v30FormsFormIdFieldsGet()**](FormsApi.md#v30FormsFormIdFieldsGet) | **GET** /v30/forms/{form_id}/fields | List Form fields |
| [**v30FormsFormIdFieldsObjIdGet()**](FormsApi.md#v30FormsFormIdFieldsObjIdGet) | **GET** /v30/forms/{form_id}/fields/{obj_id} | Retrieve field by ID |
| [**v30FormsFormIdFieldsRefGet()**](FormsApi.md#v30FormsFormIdFieldsRefGet) | **GET** /v30/forms/{form_id}/fields/{ref} | Retrieve field by ref |
| [**v30FormsGet()**](FormsApi.md#v30FormsGet) | **GET** /v30/forms | List Forms |
| [**v30FormsObjIdGet()**](FormsApi.md#v30FormsObjIdGet) | **GET** /v30/forms/{obj_id} | Retrieve Form |
| [**v30FormsObjIdPut()**](FormsApi.md#v30FormsObjIdPut) | **PUT** /v30/forms/{obj_id} | Update Form |
| [**v30FormsPost()**](FormsApi.md#v30FormsPost) | **POST** /v30/forms | Create Form |


## `v30FormsFormIdEntriesGet()`

```php
v30FormsFormIdEntriesGet($form_id, $period, $status, $is_archived, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\FormEntryPagination
```

List Form entries



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$form_id = 56; // int
$period = 'period_example'; // string | Filter period on `created`
$status = 'status_example'; // string | Filter on `status`
$is_archived = 'is_archived_example'; // string | Filter on `is_archived`
$page = 1; // int
$page_size = 25; // int
$order = 'created:desc'; // string

try {
    $result = $apiInstance->v30FormsFormIdEntriesGet($form_id, $period, $status, $is_archived, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsFormIdEntriesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **form_id** | **int**|  | |
| **period** | **string**| Filter period on &#x60;created&#x60; | [optional] |
| **status** | **string**| Filter on &#x60;status&#x60; | [optional] |
| **is_archived** | **string**| Filter on &#x60;is_archived&#x60; | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;created:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\FormEntryPagination**](../Model/FormEntryPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsFormIdEntriesObjIdGet()`

```php
v30FormsFormIdEntriesObjIdGet($form_id, $obj_id): \NathanEmanuel\Congressus\Rest\Model\FormEntry
```

Retrieve Form entry



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$form_id = 56; // int
$obj_id = 56; // int

try {
    $result = $apiInstance->v30FormsFormIdEntriesObjIdGet($form_id, $obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsFormIdEntriesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **form_id** | **int**|  | |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\FormEntry**](../Model/FormEntry.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsFormIdFieldsGet()`

```php
v30FormsFormIdFieldsGet($form_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\FormFieldPagination
```

List Form fields



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$form_id = 56; // int
$page = 1; // int
$page_size = 25; // int
$order = 'ref'; // string

try {
    $result = $apiInstance->v30FormsFormIdFieldsGet($form_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsFormIdFieldsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **form_id** | **int**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;ref&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\FormFieldPagination**](../Model/FormFieldPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsFormIdFieldsObjIdGet()`

```php
v30FormsFormIdFieldsObjIdGet($form_id, $obj_id): \NathanEmanuel\Congressus\Rest\Model\FormField
```

Retrieve field by ID



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$form_id = 56; // int
$obj_id = 56; // int

try {
    $result = $apiInstance->v30FormsFormIdFieldsObjIdGet($form_id, $obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsFormIdFieldsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **form_id** | **int**|  | |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\FormField**](../Model/FormField.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsFormIdFieldsRefGet()`

```php
v30FormsFormIdFieldsRefGet($form_id, $ref): \NathanEmanuel\Congressus\Rest\Model\FormField
```

Retrieve field by ref



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$form_id = 56; // int
$ref = 'ref_example'; // string

try {
    $result = $apiInstance->v30FormsFormIdFieldsRefGet($form_id, $ref);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsFormIdFieldsRefGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **form_id** | **int**|  | |
| **ref** | **string**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\FormField**](../Model/FormField.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsGet()`

```php
v30FormsGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\FormPagination
```

List Forms



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'title_sortable'; // string

try {
    $result = $apiInstance->v30FormsGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;title_sortable&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\FormPagination**](../Model/FormPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsObjIdGet()`

```php
v30FormsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\Form
```

Retrieve Form



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30FormsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Form**](../Model/Form.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsObjIdPut()`

```php
v30FormsObjIdPut($obj_id, $form): \NathanEmanuel\Congressus\Rest\Model\Form
```

Update Form



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$form = new \NathanEmanuel\Congressus\Rest\Model\Form(); // \NathanEmanuel\Congressus\Rest\Model\Form

try {
    $result = $apiInstance->v30FormsObjIdPut($obj_id, $form);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **form** | [**\NathanEmanuel\Congressus\Rest\Model\Form**](../Model/Form.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Form**](../Model/Form.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30FormsPost()`

```php
v30FormsPost($base_form): \NathanEmanuel\Congressus\Rest\Model\BaseForm
```

Create Form



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\FormsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$base_form = new \NathanEmanuel\Congressus\Rest\Model\BaseForm(); // \NathanEmanuel\Congressus\Rest\Model\BaseForm

try {
    $result = $apiInstance->v30FormsPost($base_form);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FormsApi->v30FormsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **base_form** | [**\NathanEmanuel\Congressus\Rest\Model\BaseForm**](../Model/BaseForm.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BaseForm**](../Model/BaseForm.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
