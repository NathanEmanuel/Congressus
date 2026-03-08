# NathanEmanuel\Congressus\Rest\LogsApi

Logs are used to track user activity within Congressus.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30TasksGet()**](LogsApi.md#v30TasksGet) | **GET** /v30/tasks | List Tasks |
| [**v30TasksObjIdPut()**](LogsApi.md#v30TasksObjIdPut) | **PUT** /v30/tasks/{obj_id} | Update Task |


## `v30TasksGet()`

```php
v30TasksGet($author_id, $assignee_id, $subject_type, $is_completed, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\TaskPagination
```

List Tasks



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\LogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$author_id = array(56); // int[] | Filter by None
$assignee_id = array(56); // int[] | Filter by None
$subject_type = array('subject_type_example'); // string[] | Filter by None
$is_completed = 'is_completed_example'; // string | Filter on `is_completed`
$page = 1; // int
$page_size = 25; // int
$order = 'id'; // string

try {
    $result = $apiInstance->v30TasksGet($author_id, $assignee_id, $subject_type, $is_completed, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LogsApi->v30TasksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **author_id** | [**int[]**](../Model/int.md)| Filter by None | [optional] |
| **assignee_id** | [**int[]**](../Model/int.md)| Filter by None | [optional] |
| **subject_type** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **is_completed** | **string**| Filter on &#x60;is_completed&#x60; | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;id&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\TaskPagination**](../Model/TaskPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30TasksObjIdPut()`

```php
v30TasksObjIdPut($obj_id, $update_task): \NathanEmanuel\Congressus\Rest\Model\Task
```

Update Task



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\LogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$update_task = new \NathanEmanuel\Congressus\Rest\Model\UpdateTask(); // \NathanEmanuel\Congressus\Rest\Model\UpdateTask

try {
    $result = $apiInstance->v30TasksObjIdPut($obj_id, $update_task);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LogsApi->v30TasksObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **update_task** | [**\NathanEmanuel\Congressus\Rest\Model\UpdateTask**](../Model/UpdateTask.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Task**](../Model/Task.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
