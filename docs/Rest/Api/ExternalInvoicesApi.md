# NathanEmanuel\Congressus\Rest\ExternalInvoicesApi



All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30ExternalInvoicesImportsPost()**](ExternalInvoicesApi.md#v30ExternalInvoicesImportsPost) | **POST** /v30/external-invoices/imports | Add a new external invoice import |


## `v30ExternalInvoicesImportsPost()`

```php
v30ExternalInvoicesImportsPost()
```

Add a new external invoice import

**Note:** this endpoint is part of the external invoices module and is only available if the module is enabled.  To import external invoices, you need to send a `multipart/form-data` POST request to this endpoint. The following fields are required:  - `file`: The file to import; - `source`: The source of the file (e.g. \"creo\"), this value can be defined by the client but should be consistent; - `format`: The format of the file (e.g. \"eExact\"), this value is used to validate and parse the file.  ### Example  Below is a raw HTTP request that can be used to import an external invoice file:  ```http POST http://api.congressus.nl/v30/external-invoices/imports Authorization: Bearer [your bearer token] Content-Type: multipart/form-data; boundary=WebAppBoundary  --WebAppBoundary Content-Disposition: form-data; name=\"source\" Content-Type: text/plain  creo --WebAppBoundary Content-Disposition: form-data; name=\"format\" Content-Type: text/plain  eExact --WebAppBoundary Content-Disposition: form-data; name=\"file\"; filename=\"export_01-02-2023.xml\"  < /path/to/export_01-02-2023.xml --WebAppBoundary-- ```  You can perform the same request using `curl`:  ```bash curl -X POST --location \"http://api.congressus.nl/v30/external-invoices/imports\" \\     -H \"Authorization: Bearer [your bearer token]\" \\     -H \"Content-Type: multipart/form-data; boundary=WebAppBoundary\" \\     -F \"source=creo;type=text/plain\" \\     -F \"format=eExact;type=text/plain\" \\     -F \"file=@/path/to/export_01-02-2023.xml;filename=export_01-02-2023.xml;type=*_/_*\" ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\ExternalInvoicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->v30ExternalInvoicesImportsPost();
} catch (Exception $e) {
    echo 'Exception when calling ExternalInvoicesApi->v30ExternalInvoicesImportsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
