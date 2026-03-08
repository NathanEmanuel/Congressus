# NathanEmanuel\Congressus\Rest\ToolsApi

Tooling for our software

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30IbanValidatorGet()**](ToolsApi.md#v30IbanValidatorGet) | **GET** /v30/iban-validator | Return a JSON file with the status of the IBAN |


## `v30IbanValidatorGet()`

```php
v30IbanValidatorGet($iban): \NathanEmanuel\Congressus\Rest\Model\IBANValidatorResponse
```

Return a JSON file with the status of the IBAN

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ToolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$iban = 'iban_example'; // string

try {
    $result = $apiInstance->v30IbanValidatorGet($iban);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ToolsApi->v30IbanValidatorGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **iban** | **string**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\IBANValidatorResponse**](../Model/IBANValidatorResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
