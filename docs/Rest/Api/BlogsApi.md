# NathanEmanuel\Congressus\Rest\BlogsApi

Blogs are used for a the publication of articles on the website(s) of an association.  ## Data model - **Blog** - Base model for blogs, which functions as a container for BlogParagraph objects. - **BlogParagraph** - Content of a Blog. A blog consists of one or more BlogParagraphs.   - BlogTextParagraph   - BlogImageParagraph - **BlogCategory** - Defines category and basic publication settings for the associated blogs. Each blog has exactly  one category. - **BlogIssue** - Defines an issue to which a Blog is linked. Optional. - **BlogAuthor** - Defines the author of a Blog. Optional.  &gt; Keep published set to False as long you do not want to share your blog with the outside world.  After the creation of the Blog object you can start filling the blog with either text (BlogTextParagraph) or  images (BlogImageParagraph).  &gt; The content of an blog (list of BlogParagraphs) is returned withing the get blogs/&lt;obj_id&gt; endpoint.  The /blogs list view does not contain them.  ## Uploading images Images are saved in the form of a StorageObject. Create a StorageObject first before you create a BlogImageParagraph.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30BlogsAuthorsGet()**](BlogsApi.md#v30BlogsAuthorsGet) | **GET** /v30/blogs/authors | List Blog authors |
| [**v30BlogsAuthorsObjIdDelete()**](BlogsApi.md#v30BlogsAuthorsObjIdDelete) | **DELETE** /v30/blogs/authors/{obj_id} | Delete BlogAuthor |
| [**v30BlogsAuthorsObjIdGet()**](BlogsApi.md#v30BlogsAuthorsObjIdGet) | **GET** /v30/blogs/authors/{obj_id} | Retrieve BlogAuthor |
| [**v30BlogsAuthorsObjIdPut()**](BlogsApi.md#v30BlogsAuthorsObjIdPut) | **PUT** /v30/blogs/authors/{obj_id} | Update BlogAuthor |
| [**v30BlogsAuthorsPost()**](BlogsApi.md#v30BlogsAuthorsPost) | **POST** /v30/blogs/authors | Create BlogAuthor |
| [**v30BlogsCategoriesGet()**](BlogsApi.md#v30BlogsCategoriesGet) | **GET** /v30/blogs/categories | List Blog categories |
| [**v30BlogsCategoriesObjIdDelete()**](BlogsApi.md#v30BlogsCategoriesObjIdDelete) | **DELETE** /v30/blogs/categories/{obj_id} | Delete Blog category |
| [**v30BlogsCategoriesObjIdGet()**](BlogsApi.md#v30BlogsCategoriesObjIdGet) | **GET** /v30/blogs/categories/{obj_id} | Retrieve Blog category |
| [**v30BlogsCategoriesObjIdPut()**](BlogsApi.md#v30BlogsCategoriesObjIdPut) | **PUT** /v30/blogs/categories/{obj_id} | Update Blog category |
| [**v30BlogsCategoriesPost()**](BlogsApi.md#v30BlogsCategoriesPost) | **POST** /v30/blogs/categories | Create Blog category |
| [**v30BlogsGet()**](BlogsApi.md#v30BlogsGet) | **GET** /v30/blogs | List Blogs |
| [**v30BlogsIssuesGet()**](BlogsApi.md#v30BlogsIssuesGet) | **GET** /v30/blogs/issues | List Blog issues |
| [**v30BlogsIssuesObjIdDelete()**](BlogsApi.md#v30BlogsIssuesObjIdDelete) | **DELETE** /v30/blogs/issues/{obj_id} | Delete BlogIssue |
| [**v30BlogsIssuesObjIdGet()**](BlogsApi.md#v30BlogsIssuesObjIdGet) | **GET** /v30/blogs/issues/{obj_id} | Retrieve BlogIssue |
| [**v30BlogsIssuesObjIdPut()**](BlogsApi.md#v30BlogsIssuesObjIdPut) | **PUT** /v30/blogs/issues/{obj_id} | Update BlogIssue |
| [**v30BlogsIssuesPost()**](BlogsApi.md#v30BlogsIssuesPost) | **POST** /v30/blogs/issues | Create BlogIssue |
| [**v30BlogsObjIdDelete()**](BlogsApi.md#v30BlogsObjIdDelete) | **DELETE** /v30/blogs/{obj_id} | Delete Blog |
| [**v30BlogsObjIdGet()**](BlogsApi.md#v30BlogsObjIdGet) | **GET** /v30/blogs/{obj_id} | Retrieve Blog |
| [**v30BlogsObjIdParagraphsImagePost()**](BlogsApi.md#v30BlogsObjIdParagraphsImagePost) | **POST** /v30/blogs/{obj_id}/paragraphs/image | Create BlogImageParagraph |
| [**v30BlogsObjIdParagraphsTextPost()**](BlogsApi.md#v30BlogsObjIdParagraphsTextPost) | **POST** /v30/blogs/{obj_id}/paragraphs/text | Create BlogTextParagraph |
| [**v30BlogsObjIdPut()**](BlogsApi.md#v30BlogsObjIdPut) | **PUT** /v30/blogs/{obj_id} | Update Blog |
| [**v30BlogsParagraphsImageObjIdDelete()**](BlogsApi.md#v30BlogsParagraphsImageObjIdDelete) | **DELETE** /v30/blogs/paragraphs/image/{obj_id} | Delete BlogImageParagraph |
| [**v30BlogsParagraphsImageObjIdGet()**](BlogsApi.md#v30BlogsParagraphsImageObjIdGet) | **GET** /v30/blogs/paragraphs/image/{obj_id} | Retrieve BlogImageParagraph |
| [**v30BlogsParagraphsImageObjIdPut()**](BlogsApi.md#v30BlogsParagraphsImageObjIdPut) | **PUT** /v30/blogs/paragraphs/image/{obj_id} | Update BlogImageParagraph |
| [**v30BlogsParagraphsTextObjIdDelete()**](BlogsApi.md#v30BlogsParagraphsTextObjIdDelete) | **DELETE** /v30/blogs/paragraphs/text/{obj_id} | Delete BlogTextParagraph |
| [**v30BlogsParagraphsTextObjIdGet()**](BlogsApi.md#v30BlogsParagraphsTextObjIdGet) | **GET** /v30/blogs/paragraphs/text/{obj_id} | Retrieve BlogTextParagraph |
| [**v30BlogsParagraphsTextObjIdPut()**](BlogsApi.md#v30BlogsParagraphsTextObjIdPut) | **PUT** /v30/blogs/paragraphs/text/{obj_id} | Update BlogTextParagraph |
| [**v30BlogsPost()**](BlogsApi.md#v30BlogsPost) | **POST** /v30/blogs | Create Blog |


## `v30BlogsAuthorsGet()`

```php
v30BlogsAuthorsGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination
```

List Blog authors



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30BlogsAuthorsGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsAuthorsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination**](../Model/BlogAuthorPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsAuthorsObjIdDelete()`

```php
v30BlogsAuthorsObjIdDelete($obj_id)
```

Delete BlogAuthor



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30BlogsAuthorsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsAuthorsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30BlogsAuthorsObjIdGet()`

```php
v30BlogsAuthorsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BlogAuthor
```

Retrieve BlogAuthor



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BlogsAuthorsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsAuthorsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogAuthor**](../Model/BlogAuthor.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsAuthorsObjIdPut()`

```php
v30BlogsAuthorsObjIdPut($obj_id, $blog_author): \NathanEmanuel\Congressus\Rest\Model\BlogAuthor
```

Update BlogAuthor



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_author = new \NathanEmanuel\Congressus\Rest\Model\BlogAuthor(); // \NathanEmanuel\Congressus\Rest\Model\BlogAuthor

try {
    $result = $apiInstance->v30BlogsAuthorsObjIdPut($obj_id, $blog_author);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsAuthorsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_author** | [**\NathanEmanuel\Congressus\Rest\Model\BlogAuthor**](../Model/BlogAuthor.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogAuthor**](../Model/BlogAuthor.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsAuthorsPost()`

```php
v30BlogsAuthorsPost($blog_author): \NathanEmanuel\Congressus\Rest\Model\BlogAuthor
```

Create BlogAuthor



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$blog_author = new \NathanEmanuel\Congressus\Rest\Model\BlogAuthor(); // \NathanEmanuel\Congressus\Rest\Model\BlogAuthor

try {
    $result = $apiInstance->v30BlogsAuthorsPost($blog_author);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsAuthorsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **blog_author** | [**\NathanEmanuel\Congressus\Rest\Model\BlogAuthor**](../Model/BlogAuthor.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogAuthor**](../Model/BlogAuthor.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsCategoriesGet()`

```php
v30BlogsCategoriesGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination
```

List Blog categories



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30BlogsCategoriesGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsCategoriesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination**](../Model/BlogCategoryPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsCategoriesObjIdDelete()`

```php
v30BlogsCategoriesObjIdDelete($obj_id)
```

Delete Blog category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30BlogsCategoriesObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsCategoriesObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30BlogsCategoriesObjIdGet()`

```php
v30BlogsCategoriesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BlogCategory
```

Retrieve Blog category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BlogsCategoriesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsCategoriesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogCategory**](../Model/BlogCategory.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsCategoriesObjIdPut()`

```php
v30BlogsCategoriesObjIdPut($obj_id, $blog_category): \NathanEmanuel\Congressus\Rest\Model\BlogCategory
```

Update Blog category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_category = new \NathanEmanuel\Congressus\Rest\Model\BlogCategory(); // \NathanEmanuel\Congressus\Rest\Model\BlogCategory

try {
    $result = $apiInstance->v30BlogsCategoriesObjIdPut($obj_id, $blog_category);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsCategoriesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_category** | [**\NathanEmanuel\Congressus\Rest\Model\BlogCategory**](../Model/BlogCategory.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogCategory**](../Model/BlogCategory.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsCategoriesPost()`

```php
v30BlogsCategoriesPost($blog_category): \NathanEmanuel\Congressus\Rest\Model\BlogCategory
```

Create Blog category



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$blog_category = new \NathanEmanuel\Congressus\Rest\Model\BlogCategory(); // \NathanEmanuel\Congressus\Rest\Model\BlogCategory

try {
    $result = $apiInstance->v30BlogsCategoriesPost($blog_category);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsCategoriesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **blog_category** | [**\NathanEmanuel\Congressus\Rest\Model\BlogCategory**](../Model/BlogCategory.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogCategory**](../Model/BlogCategory.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsGet()`

```php
v30BlogsGet($period_filter, $author_id, $issue_id, $category_id, $published, $visibility, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\BlogPagination
```

List Blogs



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$period_filter = 'period_filter_example'; // string | Filter period on `published_from`
$author_id = array(56); // int[] | Filter by Author
$issue_id = array(56); // int[] | Filter by Issue
$category_id = array(56); // int[] | Filter by Category
$published = 56; // int | Filter on `published`
$visibility = array('visibility_example'); // string[] | Filter by Visibility
$page = 1; // int
$page_size = 25; // int
$order = 'published_from:desc'; // string

try {
    $result = $apiInstance->v30BlogsGet($period_filter, $author_id, $issue_id, $category_id, $published, $visibility, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **period_filter** | **string**| Filter period on &#x60;published_from&#x60; | [optional] |
| **author_id** | [**int[]**](../Model/int.md)| Filter by Author | [optional] |
| **issue_id** | [**int[]**](../Model/int.md)| Filter by Issue | [optional] |
| **category_id** | [**int[]**](../Model/int.md)| Filter by Category | [optional] |
| **published** | **int**| Filter on &#x60;published&#x60; | [optional] |
| **visibility** | [**string[]**](../Model/string.md)| Filter by Visibility | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;published_from:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogPagination**](../Model/BlogPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsIssuesGet()`

```php
v30BlogsIssuesGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination
```

List Blog issues



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30BlogsIssuesGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsIssuesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination**](../Model/BlogIssuePagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsIssuesObjIdDelete()`

```php
v30BlogsIssuesObjIdDelete($obj_id)
```

Delete BlogIssue



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30BlogsIssuesObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsIssuesObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30BlogsIssuesObjIdGet()`

```php
v30BlogsIssuesObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BlogIssue
```

Retrieve BlogIssue



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BlogsIssuesObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsIssuesObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogIssue**](../Model/BlogIssue.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsIssuesObjIdPut()`

```php
v30BlogsIssuesObjIdPut($obj_id, $blog_issue): \NathanEmanuel\Congressus\Rest\Model\BlogIssue
```

Update BlogIssue



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_issue = new \NathanEmanuel\Congressus\Rest\Model\BlogIssue(); // \NathanEmanuel\Congressus\Rest\Model\BlogIssue

try {
    $result = $apiInstance->v30BlogsIssuesObjIdPut($obj_id, $blog_issue);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsIssuesObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_issue** | [**\NathanEmanuel\Congressus\Rest\Model\BlogIssue**](../Model/BlogIssue.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogIssue**](../Model/BlogIssue.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsIssuesPost()`

```php
v30BlogsIssuesPost($blog_issue): \NathanEmanuel\Congressus\Rest\Model\BlogIssue
```

Create BlogIssue



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$blog_issue = new \NathanEmanuel\Congressus\Rest\Model\BlogIssue(); // \NathanEmanuel\Congressus\Rest\Model\BlogIssue

try {
    $result = $apiInstance->v30BlogsIssuesPost($blog_issue);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsIssuesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **blog_issue** | [**\NathanEmanuel\Congressus\Rest\Model\BlogIssue**](../Model/BlogIssue.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogIssue**](../Model/BlogIssue.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsObjIdDelete()`

```php
v30BlogsObjIdDelete($obj_id)
```

Delete Blog



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30BlogsObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30BlogsObjIdGet()`

```php
v30BlogsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph
```

Retrieve Blog



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BlogsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph**](../Model/BlogWithParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsObjIdParagraphsImagePost()`

```php
v30BlogsObjIdParagraphsImagePost($obj_id, $blog_image_paragraph): \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph
```

Create BlogImageParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_image_paragraph = new \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph(); // \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph

try {
    $result = $apiInstance->v30BlogsObjIdParagraphsImagePost($obj_id, $blog_image_paragraph);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsObjIdParagraphsImagePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_image_paragraph** | [**\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph**](../Model/BlogImageParagraph.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph**](../Model/BlogImageParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsObjIdParagraphsTextPost()`

```php
v30BlogsObjIdParagraphsTextPost($obj_id, $blog_text_paragraph): \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph
```

Create BlogTextParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_text_paragraph = new \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph(); // \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph

try {
    $result = $apiInstance->v30BlogsObjIdParagraphsTextPost($obj_id, $blog_text_paragraph);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsObjIdParagraphsTextPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_text_paragraph** | [**\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph**](../Model/BlogTextParagraph.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph**](../Model/BlogTextParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsObjIdPut()`

```php
v30BlogsObjIdPut($obj_id, $blog_with_paragraph): \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph
```

Update Blog



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_with_paragraph = new \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph(); // \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph

try {
    $result = $apiInstance->v30BlogsObjIdPut($obj_id, $blog_with_paragraph);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_with_paragraph** | [**\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph**](../Model/BlogWithParagraph.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph**](../Model/BlogWithParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsParagraphsImageObjIdDelete()`

```php
v30BlogsParagraphsImageObjIdDelete($obj_id)
```

Delete BlogImageParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30BlogsParagraphsImageObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsParagraphsImageObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30BlogsParagraphsImageObjIdGet()`

```php
v30BlogsParagraphsImageObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph
```

Retrieve BlogImageParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BlogsParagraphsImageObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsParagraphsImageObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph**](../Model/BlogImageParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsParagraphsImageObjIdPut()`

```php
v30BlogsParagraphsImageObjIdPut($obj_id, $blog_image_paragraph): \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph
```

Update BlogImageParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_image_paragraph = new \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph(); // \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph

try {
    $result = $apiInstance->v30BlogsParagraphsImageObjIdPut($obj_id, $blog_image_paragraph);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsParagraphsImageObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_image_paragraph** | [**\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph**](../Model/BlogImageParagraph.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph**](../Model/BlogImageParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsParagraphsTextObjIdDelete()`

```php
v30BlogsParagraphsTextObjIdDelete($obj_id)
```

Delete BlogTextParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30BlogsParagraphsTextObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsParagraphsTextObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30BlogsParagraphsTextObjIdGet()`

```php
v30BlogsParagraphsTextObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph
```

Retrieve BlogTextParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30BlogsParagraphsTextObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsParagraphsTextObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph**](../Model/BlogTextParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsParagraphsTextObjIdPut()`

```php
v30BlogsParagraphsTextObjIdPut($obj_id, $blog_text_paragraph): \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph
```

Update BlogTextParagraph



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$blog_text_paragraph = new \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph(); // \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph

try {
    $result = $apiInstance->v30BlogsParagraphsTextObjIdPut($obj_id, $blog_text_paragraph);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsParagraphsTextObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **blog_text_paragraph** | [**\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph**](../Model/BlogTextParagraph.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph**](../Model/BlogTextParagraph.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30BlogsPost()`

```php
v30BlogsPost($blog): \NathanEmanuel\Congressus\Rest\Model\Blog
```

Create Blog



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\BlogsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$blog = new \NathanEmanuel\Congressus\Rest\Model\Blog(); // \NathanEmanuel\Congressus\Rest\Model\Blog

try {
    $result = $apiInstance->v30BlogsPost($blog);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlogsApi->v30BlogsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **blog** | [**\NathanEmanuel\Congressus\Rest\Model\Blog**](../Model/Blog.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Blog**](../Model/Blog.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
