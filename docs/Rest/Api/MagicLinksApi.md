# NathanEmanuel\Congressus\Rest\MagicLinksApi



All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30MagicLinksPost()**](MagicLinksApi.md#v30MagicLinksPost) | **POST** /v30/magic-links | Create MagicLink |


## `v30MagicLinksPost()`

```php
v30MagicLinksPost($magic_link): \NathanEmanuel\Congressus\Rest\Model\MagicLink
```

Create MagicLink



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MagicLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$magic_link = new \NathanEmanuel\Congressus\Rest\Model\MagicLink(); // \NathanEmanuel\Congressus\Rest\Model\MagicLink

try {
    $result = $apiInstance->v30MagicLinksPost($magic_link);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MagicLinksApi->v30MagicLinksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **magic_link** | [**\NathanEmanuel\Congressus\Rest\Model\MagicLink**](../Model/MagicLink.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MagicLink**](../Model/MagicLink.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
