# NathanEmanuel\Congressus\Rest\BankMutationsApi



All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30BankGet()**](BankMutationsApi.md#v30BankGet) | **GET** /v30/bank | List bank mutations |
| [**v30BankObjIdDelete()**](BankMutationsApi.md#v30BankObjIdDelete) | **DELETE** /v30/bank/{obj_id} | Delete bank mutation |
| [**v30BankObjIdGet()**](BankMutationsApi.md#v30BankObjIdGet) | **GET** /v30/bank/{obj_id} | Retrieve bank mutation |
| [**v30BankObjIdMatchPost()**](BankMutationsApi.md#v30BankObjIdMatchPost) | **POST** /v30/bank/{obj_id}/match | Match mutation with a sale invoice |
| [**v30BankObjIdUnmatchPost()**](BankMutationsApi.md#v30BankObjIdUnmatchPost) | **POST** /v30/bank/{obj_id}/unmatch | Remove match with a sale invoice |


## `v30BankGet()`

```php
v30BankGet($period_filter, $status, $mutation_type, $bank_import_id, $bank_statement_id, $bank_mutation_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\BankMutationPagination
```

List bank mutations



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BankMutationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period_filter = 'period_filter_example'; // string | Filter period on `mutation_date`
$status = 'status_example'; // string | Filter on `status`
$mutation_type = 'mutation_type_example'; // string | Filter on `mutation_type`
$bank_import_id = array('bank_import_id_example'); // string[] | Filter by Bank import
$bank_statement_id = array('bank_statement_id_example'); // string[] | Filter by Bank statement
$bank_mutation_id = array('bank_mutation_id_example'); // string[] | Filter by Bank mutation
$page = 1; // int
$page_size = 25; // int
$order = 'mutation_date:desc,id:desc'; // string

try {
    $result = $apiInstance->v30BankGet($period_filter, $status, $mutation_type, $bank_import_id, $bank_statement_id, $bank_mutation_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankMutationsApi->v30BankGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period_filter** | **string**| Filter period on &#x60;mutation_date&#x60; | [optional] |
| **status** | **string**| Filter on &#x60;status&#x60; | [optional] |
| **mutation_type** | **string**| Filter on &#x60;mutation_type&#x60; | [optional] |
| **bank_import_id** | [**string[]**](../Model/string.md)| Filter by Bank import | [optional] |
| **bank_statement_id** | [**string[]**](../Model/string.md)| Filter by Bank statement | [optional] |
| **bank_mutation_id** | [**string[]**](../Model/string.md)| Filter by Bank mutation | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;mutation_date:desc,id:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BankMutationPagination**](../Model/BankMutationPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BankObjIdDelete()`

```php
v30BankObjIdDelete($obj_id)
```

Delete bank mutation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BankMutationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30BankObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling BankMutationsApi->v30BankObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30BankObjIdGet()`

```php
v30BankObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BankMutation
```

Retrieve bank mutation



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BankMutationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BankObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankMutationsApi->v30BankObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BankMutation**](../Model/BankMutation.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BankObjIdMatchPost()`

```php
v30BankObjIdMatchPost($obj_id, $sale_invoice_bank_mutation_match)
```

Match mutation with a sale invoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BankMutationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$sale_invoice_bank_mutation_match = new \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceBankMutationMatch(); // \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceBankMutationMatch

try {
    $apiInstance->v30BankObjIdMatchPost($obj_id, $sale_invoice_bank_mutation_match);
} catch (Exception $e) {
    echo 'Exception when calling BankMutationsApi->v30BankObjIdMatchPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **sale_invoice_bank_mutation_match** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceBankMutationMatch**](../Model/SaleInvoiceBankMutationMatch.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BankObjIdUnmatchPost()`

```php
v30BankObjIdUnmatchPost($obj_id, $sale_invoice_bank_mutation_match)
```

Remove match with a sale invoice



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BankMutationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$sale_invoice_bank_mutation_match = new \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceBankMutationMatch(); // \NathanEmanuel\Congressus\Rest\Model\SaleInvoiceBankMutationMatch

try {
    $apiInstance->v30BankObjIdUnmatchPost($obj_id, $sale_invoice_bank_mutation_match);
} catch (Exception $e) {
    echo 'Exception when calling BankMutationsApi->v30BankObjIdUnmatchPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **sale_invoice_bank_mutation_match** | [**\NathanEmanuel\Congressus\Rest\Model\SaleInvoiceBankMutationMatch**](../Model/SaleInvoiceBankMutationMatch.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
