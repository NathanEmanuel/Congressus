# NathanEmanuel\Congressus\Rest\GroupsApi

Groups are a collection of Members e.g. a Board, Committee, etc.  ## Data model - **Group**. - **GroupFolder** - Organize Groups in a folder-like structure. - **GroupMembership** - Relate members to a group.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30GroupsFoldersGet()**](GroupsApi.md#v30GroupsFoldersGet) | **GET** /v30/groups/folders | List Group folders |
| [**v30GroupsFoldersObjIdDelete()**](GroupsApi.md#v30GroupsFoldersObjIdDelete) | **DELETE** /v30/groups/folders/{obj_id} | Delete Group folder |
| [**v30GroupsFoldersObjIdGet()**](GroupsApi.md#v30GroupsFoldersObjIdGet) | **GET** /v30/groups/folders/{obj_id} | Retrieve Group folder |
| [**v30GroupsFoldersObjIdPut()**](GroupsApi.md#v30GroupsFoldersObjIdPut) | **PUT** /v30/groups/folders/{obj_id} | Update Group folder |
| [**v30GroupsFoldersPost()**](GroupsApi.md#v30GroupsFoldersPost) | **POST** /v30/groups/folders | Create Group folder |
| [**v30GroupsFoldersRecursiveGet()**](GroupsApi.md#v30GroupsFoldersRecursiveGet) | **GET** /v30/groups/folders/recursive | List Group folders - recursive |
| [**v30GroupsGet()**](GroupsApi.md#v30GroupsGet) | **GET** /v30/groups | List Groups |
| [**v30GroupsMembershipsGet()**](GroupsApi.md#v30GroupsMembershipsGet) | **GET** /v30/groups/memberships | List Group memberships |
| [**v30GroupsMembershipsObjIdDelete()**](GroupsApi.md#v30GroupsMembershipsObjIdDelete) | **DELETE** /v30/groups/memberships/{obj_id} | Delete Group membership |
| [**v30GroupsMembershipsObjIdGet()**](GroupsApi.md#v30GroupsMembershipsObjIdGet) | **GET** /v30/groups/memberships/{obj_id} | Retrieve Group membership |
| [**v30GroupsMembershipsObjIdPut()**](GroupsApi.md#v30GroupsMembershipsObjIdPut) | **PUT** /v30/groups/memberships/{obj_id} | Update Group membership |
| [**v30GroupsMembershipsPost()**](GroupsApi.md#v30GroupsMembershipsPost) | **POST** /v30/groups/memberships | Create Group membership |
| [**v30GroupsObjIdDelete()**](GroupsApi.md#v30GroupsObjIdDelete) | **DELETE** /v30/groups/{obj_id} | Delete Group |
| [**v30GroupsObjIdGet()**](GroupsApi.md#v30GroupsObjIdGet) | **GET** /v30/groups/{obj_id} | Retrieve Group |
| [**v30GroupsObjIdPut()**](GroupsApi.md#v30GroupsObjIdPut) | **PUT** /v30/groups/{obj_id} | Update Group |


## `v30GroupsFoldersGet()`

```php
v30GroupsFoldersGet($published, $parent_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GroupFolderPagination
```

List Group folders

Use /group-folders endpoint instead

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$parent_id = 'parent_id_example'; // string
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30GroupsFoldersGet($published, $parent_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsFoldersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **parent_id** | **string**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolderPagination**](../Model/GroupFolderPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsFoldersObjIdDelete()`

```php
v30GroupsFoldersObjIdDelete($obj_id)
```

Delete Group folder

Use /group-folders/{obj_id} endpoint instead

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30GroupsFoldersObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsFoldersObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30GroupsFoldersObjIdGet()`

```php
v30GroupsFoldersObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\GroupFolder
```

Retrieve Group folder

Use /group-folders/{obj_id} endpoint instead

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30GroupsFoldersObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsFoldersObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsFoldersObjIdPut()`

```php
v30GroupsFoldersObjIdPut($obj_id, $group_folder): \NathanEmanuel\Congressus\Rest\Model\GroupFolder
```

Update Group folder

Use /group-folders/{obj_id} endpoint instead

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$group_folder = new \NathanEmanuel\Congressus\Rest\Model\GroupFolder(); // \NathanEmanuel\Congressus\Rest\Model\GroupFolder

try {
    $result = $apiInstance->v30GroupsFoldersObjIdPut($obj_id, $group_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsFoldersObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **group_folder** | [**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsFoldersPost()`

```php
v30GroupsFoldersPost($group_folder): \NathanEmanuel\Congressus\Rest\Model\GroupFolder
```

Create Group folder

Use /group-folders endpoint instead

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_folder = new \NathanEmanuel\Congressus\Rest\Model\GroupFolder(); // \NathanEmanuel\Congressus\Rest\Model\GroupFolder

try {
    $result = $apiInstance->v30GroupsFoldersPost($group_folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsFoldersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_folder** | [**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolder**](../Model/GroupFolder.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsFoldersRecursiveGet()`

```php
v30GroupsFoldersRecursiveGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GroupFolderListRecursivePagination
```

List Group folders - recursive

Use /group-folders/recursive endpoint instead

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30GroupsFoldersRecursiveGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsFoldersRecursiveGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupFolderListRecursivePagination**](../Model/GroupFolderListRecursivePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsGet()`

```php
v30GroupsGet($published, $folder_id, $member_id, $socie_app_id, $term, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GroupPagination
```

List Groups



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$published = 'published_example'; // string | Filter on `published`
$folder_id = array('folder_id_example'); // string[] | Filter by Folder
$member_id = array('member_id_example'); // string[] | Filter by Member
$socie_app_id = array('socie_app_id_example'); // string[] | Filter by None
$term = 'term_example'; // string
$page = 1; // int
$page_size = 25; // int
$order = 'name'; // string

try {
    $result = $apiInstance->v30GroupsGet($published, $folder_id, $member_id, $socie_app_id, $term, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **published** | **string**| Filter on &#x60;published&#x60; | [optional] |
| **folder_id** | [**string[]**](../Model/string.md)| Filter by Folder | [optional] |
| **member_id** | [**string[]**](../Model/string.md)| Filter by Member | [optional] |
| **socie_app_id** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **term** | **string**|  | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;name&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupPagination**](../Model/GroupPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsMembershipsGet()`

```php
v30GroupsMembershipsGet($group_id, $member_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\GroupMembershipPagination
```

List Group memberships



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = array('group_id_example'); // string[] | Filter by Group
$member_id = array('member_id_example'); // string[] | Filter by Member
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30GroupsMembershipsGet($group_id, $member_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsMembershipsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | [**string[]**](../Model/string.md)| Filter by Group | [optional] |
| **member_id** | [**string[]**](../Model/string.md)| Filter by Member | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupMembershipPagination**](../Model/GroupMembershipPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsMembershipsObjIdDelete()`

```php
v30GroupsMembershipsObjIdDelete($obj_id)
```

Delete Group membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30GroupsMembershipsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsMembershipsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30GroupsMembershipsObjIdGet()`

```php
v30GroupsMembershipsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\GroupMembership
```

Retrieve Group membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30GroupsMembershipsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsMembershipsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupMembership**](../Model/GroupMembership.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsMembershipsObjIdPut()`

```php
v30GroupsMembershipsObjIdPut($obj_id, $group_membership): \NathanEmanuel\Congressus\Rest\Model\GroupMembership
```

Update Group membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$group_membership = new \NathanEmanuel\Congressus\Rest\Model\GroupMembership(); // \NathanEmanuel\Congressus\Rest\Model\GroupMembership

try {
    $result = $apiInstance->v30GroupsMembershipsObjIdPut($obj_id, $group_membership);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsMembershipsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **group_membership** | [**\NathanEmanuel\Congressus\Rest\Model\GroupMembership**](../Model/GroupMembership.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupMembership**](../Model/GroupMembership.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsMembershipsPost()`

```php
v30GroupsMembershipsPost($group_membership): \NathanEmanuel\Congressus\Rest\Model\GroupMembership
```

Create Group membership



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_membership = new \NathanEmanuel\Congressus\Rest\Model\GroupMembership(); // \NathanEmanuel\Congressus\Rest\Model\GroupMembership

try {
    $result = $apiInstance->v30GroupsMembershipsPost($group_membership);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsMembershipsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_membership** | [**\NathanEmanuel\Congressus\Rest\Model\GroupMembership**](../Model/GroupMembership.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupMembership**](../Model/GroupMembership.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsObjIdDelete()`

```php
v30GroupsObjIdDelete($obj_id)
```

Delete Group



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30GroupsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30GroupsObjIdGet()`

```php
v30GroupsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\GroupWithMemberships
```

Retrieve Group



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30GroupsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupWithMemberships**](../Model/GroupWithMemberships.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30GroupsObjIdPut()`

```php
v30GroupsObjIdPut($obj_id, $group_with_memberships): \NathanEmanuel\Congressus\Rest\Model\GroupWithMemberships
```

Update Group



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\GroupsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$group_with_memberships = new \NathanEmanuel\Congressus\Rest\Model\GroupWithMemberships(); // \NathanEmanuel\Congressus\Rest\Model\GroupWithMemberships

try {
    $result = $apiInstance->v30GroupsObjIdPut($obj_id, $group_with_memberships);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupsApi->v30GroupsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **group_with_memberships** | [**\NathanEmanuel\Congressus\Rest\Model\GroupWithMemberships**](../Model/GroupWithMemberships.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\GroupWithMemberships**](../Model/GroupWithMemberships.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
