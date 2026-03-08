# NathanEmanuel\Congressus\Rest\MembersApi

## Data model - **Member** - Main object, representing the member - **MembershipStatus** - Represents the status of a Member at a given period defined by &#x60;member_from&#x60; and optional &#x60;member_to&#x60; dates.   ## Membership statuses Congressus tracks the MemberStatus of a member over time. Each member has exactly one MemberStatus at each given moment in time. The current MemberStatus is derived from the MembershipStatus model, which has a &#x60;member_from&#x60; and an optional &#x60;member_to&#x60; date.  All operations on the status of the membership are done through the &#x60;/member/&lt;obj_id&gt;/statuses&#x60; resources. These resources make sure that MembershipStatuses do not overlap. **~~These resources are currently not implemented.~~ These resources are available as of June 28th, 2022.**  ### Member statuses We do provide a list with all Member statuses. These statuses have different types: - Active member status - contains members that have the ability to log in at the website(s) of the association - Archived member status - contains archived members. Complete profiles are available within Congressus Manager, but archived members are not able te log in at any website.  Special cases: - Hidden member status - former member statuses, not currently in use in the administration. These are hidden from many places, but history is preserved. - Deceased member status - contains archived members who have passed away. This feature is only available for our Enterprise plan.   ## Name of a member The name of a person is quite an extensive part within the Member-object. Congressus registers a list with name-attributes. Depending on the choices of the assocation, not all attributes are used. Based on the attributes, we also render a list of derived name properties.  Attributes of a name - can be set using the API: - &#x60;initials&#x60; - Initials of the member - &#x60;given_name&#x60; - Given name of the member - &#x60;first_name&#x60; - Full list of first names - &#x60;primary_last_name_main&#x60; - Main part of the last name - &#x60;primary_last_name_prefix&#x60; - Additional part of the last name (e.g. &#39;van der&#39;, &#39;von&#39;, etc.) - &#x60;secondary_last_name_main&#x60;- Main part of an additional last name (e.g. maiden name) - &#x60;secondary_last_name_prefix&#x60; - Additional part of the secondary last name (e.g. &#39;van der&#39;, &#39;von&#39;, etc.) - &#x60;last_name_display&#x60; - Sets which last names are used in day-to-day communication by the member. - &#x60;prefix&#x60; - e.g. &#39;Prof. dr.&#39; - &#x60;suffix&#x60; - e.g. &#39;MSc.&#39;  Properties - based on name attributes: - &#x60;last_name&#x60; - combination of all *_last_name_* fields, rendered according to the &#39;last_name_display&#39; attribute - &#x60;primary_last_name&#x60; - combination of all primary_last_name_* fields - &#x60;secondary_last_name&#x60; - combination of all secondary_last_name_* fields  ## Context for validation  Validation could be extended with a context. This context defines which fields are available, editable and required for a certain member. This context is set per MemberStatus from within Congressus Manager (settings &gt; member statuses).  Adding the context-parameter to a request ensures that only the fields within that context could be read and updated. There are six different contexts available: 1. &#x60;sign_up&#x60; - context for the online sign-up on the website of the association 2. &#x60;profile_activate&#x60; - context for activating the personal account on the website of the association 3. &#x60;profile_edit&#x60; - context for editing the personal profile via the website of the association 4. &#x60;almanac&#x60; - context for showing data in the member list / almanac on the website. This context has no editable fields. 5. &#x60;manager_add&#x60; - context used when adding new members via Congressus Manager 5. &#x60;manager_edit&#x60; - context used when editing members via Congressus Manager   ## Custom fields Within Congressus, custom fields could be added to the member profiles. These custom fields are added as a list attribute of the Member-object.  Custom field properties are available in the &#x60;/members/custom-fields&#x60; resource. This includes available choices/options that could be used to render a dropdown list or radio buttons when appropriate.  Custom fields could handle a large amount of different data types, which makes validation tricky. Invalid values are returned as a 400 Bad Request response, including the field name and a message.  Custom field types currently supported:  - &#x60;text_long&#x60; - String, single line with a max length of 255 characters   - &#x60;email&#x60; - String, valid email addresses only   - &#x60;url&#x60; - String, valid URL&#39;s only - &#x60;text_multi&#x60; - Multi line text field  - &#x60;datetime&#x60; - Date and time. In UTC. - &#x60;date&#x60; - Date only  - &#x60;number&#x60; - Integer value - &#x60;decimal&#x60; - Decimal value   - &#x60;euro&#x60; - Decimal value, rendered with two decimal places  - &#x60;checkbox&#x60; - Boolean value, rendered as a checkbox, null is interpreted as False - &#x60;yes_no&#x60; - Boolean value, rendered as a yes / no field, null is interpreted as No  - &#x60;option&#x60; - Dropdown list, only one option could be selected   - &#x60;option_radio&#x60; - Same as option, but presented in the web interface as radio fields  - &#x60;option_multiple&#x60; - Dropdown list in which multiple options could be selected   - &#x60;option_multiple_checkbox&#x60; - Same as option_multiple, but presented in the web interface as checkboxes  - &#x60;address&#x60; - Address with separate fields for address, zip, city and country. - &#x60;phonenumber&#x60; - Phone number with separate fields for number and country (calling code).  - &#x60;education_study_duo&#x60; - Option field with an opinionated list of studies in The Netherlands.  - &#x60;storage_object&#x60; - Relation with a storage object, see the Storage objects documentation for more information.

All URIs are relative to https://api.congressus.nl, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**v30MembersCustomFieldsGet()**](MembersApi.md#v30MembersCustomFieldsGet) | **GET** /v30/members/custom-fields | List Custom fields |
| [**v30MembersCustomFieldsObjIdGet()**](MembersApi.md#v30MembersCustomFieldsObjIdGet) | **GET** /v30/members/custom-fields/{obj_id} | Retrieve Custom field by ID |
| [**v30MembersCustomFieldsRefGet()**](MembersApi.md#v30MembersCustomFieldsRefGet) | **GET** /v30/members/custom-fields/{ref} | Retrieve Custom field by ref |
| [**v30MembersGet()**](MembersApi.md#v30MembersGet) | **GET** /v30/members | List Members |
| [**v30MembersMemberIdLogsGet()**](MembersApi.md#v30MembersMemberIdLogsGet) | **GET** /v30/members/{member_id}/logs | List LogEntries |
| [**v30MembersMemberIdLogsLogEntryIdDelete()**](MembersApi.md#v30MembersMemberIdLogsLogEntryIdDelete) | **DELETE** /v30/members/{member_id}/logs/{log_entry_id} | Delete LogEntry |
| [**v30MembersMemberIdLogsLogEntryIdGet()**](MembersApi.md#v30MembersMemberIdLogsLogEntryIdGet) | **GET** /v30/members/{member_id}/logs/{log_entry_id} | Retrieve LogEntry |
| [**v30MembersMemberIdLogsLogEntryIdPut()**](MembersApi.md#v30MembersMemberIdLogsLogEntryIdPut) | **PUT** /v30/members/{member_id}/logs/{log_entry_id} | Update LogEntry |
| [**v30MembersMemberIdLogsPost()**](MembersApi.md#v30MembersMemberIdLogsPost) | **POST** /v30/members/{member_id}/logs | Create LogEntry |
| [**v30MembersObjIdDelete()**](MembersApi.md#v30MembersObjIdDelete) | **DELETE** /v30/members/{obj_id} | Delete Member |
| [**v30MembersObjIdGet()**](MembersApi.md#v30MembersObjIdGet) | **GET** /v30/members/{obj_id} | Retrieve Member |
| [**v30MembersObjIdPut()**](MembersApi.md#v30MembersObjIdPut) | **PUT** /v30/members/{obj_id} | Update Member |
| [**v30MembersObjIdStatusesGet()**](MembersApi.md#v30MembersObjIdStatusesGet) | **GET** /v30/members/{obj_id}/statuses | List Membership statuses |
| [**v30MembersObjIdStatusesMembershipStatusIdDelete()**](MembersApi.md#v30MembersObjIdStatusesMembershipStatusIdDelete) | **DELETE** /v30/members/{obj_id}/statuses/{membership_status_id} | Delete Membership status |
| [**v30MembersObjIdStatusesMembershipStatusIdGet()**](MembersApi.md#v30MembersObjIdStatusesMembershipStatusIdGet) | **GET** /v30/members/{obj_id}/statuses/{membership_status_id} | Retrieve Membership status |
| [**v30MembersObjIdStatusesMembershipStatusIdPut()**](MembersApi.md#v30MembersObjIdStatusesMembershipStatusIdPut) | **PUT** /v30/members/{obj_id}/statuses/{membership_status_id} | Update Membership status |
| [**v30MembersObjIdStatusesPost()**](MembersApi.md#v30MembersObjIdStatusesPost) | **POST** /v30/members/{obj_id}/statuses | Create Membership status |
| [**v30MembersPost()**](MembersApi.md#v30MembersPost) | **POST** /v30/members | Create Member |
| [**v30MembersSearchGet()**](MembersApi.md#v30MembersSearchGet) | **GET** /v30/members/search | Search members |


## `v30MembersCustomFieldsGet()`

```php
v30MembersCustomFieldsGet($page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\CustomFieldPagination
```

List Custom fields



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$page_size = 25; // int
$order = 'ref'; // string

try {
    $result = $apiInstance->v30MembersCustomFieldsGet($page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersCustomFieldsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;ref&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\CustomFieldPagination**](../Model/CustomFieldPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersCustomFieldsObjIdGet()`

```php
v30MembersCustomFieldsObjIdGet($obj_id): \NathanEmanuel\Congressus\Rest\Model\MemberField
```

Retrieve Custom field by ID



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $result = $apiInstance->v30MembersCustomFieldsObjIdGet($obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersCustomFieldsObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberField**](../Model/MemberField.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersCustomFieldsRefGet()`

```php
v30MembersCustomFieldsRefGet($ref): \NathanEmanuel\Congressus\Rest\Model\MemberField
```

Retrieve Custom field by ref



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ref = 'ref_example'; // string

try {
    $result = $apiInstance->v30MembersCustomFieldsRefGet($ref);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersCustomFieldsRefGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ref** | **string**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberField**](../Model/MemberField.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersGet()`

```php
v30MembersGet($username, $status_id, $socie_app_id, $page, $page_size, $order, $context): \NathanEmanuel\Congressus\Rest\Model\MemberPagination
```

List Members

By passing the `context` query filter each row is filtered according to the context derived by there status. This means that each row will only contain the fields that are set to visible or higher. The settings for each context can be found in the manager: https://manager.congressus.nl/settings/statuses

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$username = array('username_example'); // string[] | Filter by Username
$status_id = array('status_id_example'); // string[] | Filter by None
$socie_app_id = array('socie_app_id_example'); // string[] | Filter by None
$page = 1; // int
$page_size = 25; // int
$order = 'id'; // string
$context = array('context_example'); // string[] | Filter by None

try {
    $result = $apiInstance->v30MembersGet($username, $status_id, $socie_app_id, $page, $page_size, $order, $context);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **username** | [**string[]**](../Model/string.md)| Filter by Username | [optional] |
| **status_id** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **socie_app_id** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;id&#39;] |
| **context** | [**string[]**](../Model/string.md)| Filter by None | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberPagination**](../Model/MemberPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersMemberIdLogsGet()`

```php
v30MembersMemberIdLogsGet($member_id, $author_id, $type, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\LogEntryPagination
```

List LogEntries

List log entries. Log entries can be of type `note`, `task`, `action` or `change`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_id = 56; // int
$author_id = array(56); // int[] | Filter by None
$type = array('type_example'); // string[] | Filter by None
$page = 1; // int
$page_size = 25; // int
$order = 'created:desc'; // string

try {
    $result = $apiInstance->v30MembersMemberIdLogsGet($member_id, $author_id, $type, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersMemberIdLogsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **member_id** | **int**|  | |
| **author_id** | [**int[]**](../Model/int.md)| Filter by None | [optional] |
| **type** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;created:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntryPagination**](../Model/LogEntryPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersMemberIdLogsLogEntryIdDelete()`

```php
v30MembersMemberIdLogsLogEntryIdDelete($member_id, $log_entry_id)
```

Delete LogEntry

Delete a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_id = 56; // int
$log_entry_id = 56; // int

try {
    $apiInstance->v30MembersMemberIdLogsLogEntryIdDelete($member_id, $log_entry_id);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersMemberIdLogsLogEntryIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **member_id** | **int**|  | |
| **log_entry_id** | **int**|  | |

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

## `v30MembersMemberIdLogsLogEntryIdGet()`

```php
v30MembersMemberIdLogsLogEntryIdGet($member_id, $log_entry_id): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Retrieve LogEntry



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_id = 56; // int
$log_entry_id = 56; // int

try {
    $result = $apiInstance->v30MembersMemberIdLogsLogEntryIdGet($member_id, $log_entry_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersMemberIdLogsLogEntryIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **member_id** | **int**|  | |
| **log_entry_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntry**](../Model/LogEntry.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersMemberIdLogsLogEntryIdPut()`

```php
v30MembersMemberIdLogsLogEntryIdPut($member_id, $log_entry_id, $update_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Update LogEntry

## Update a log entry  ### Limitations: This is only possible for log entries of type `note` or `task`.  ### Updating simple fields: For notes, only the `text` field can be updated. For tasks, it's also possible to update the assignee through the `assignee_type` and `assignee_id` fields.  ### Marking tasks as completed: Tasks can also be marked as complete by setting `is_completed` to true and optionally setting `completed_by_id` to the ID of the user that completed the task. If `completed_by_id` is not set, the current user will be used.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_id = 56; // int
$log_entry_id = 56; // int
$update_log_entry = new \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry

try {
    $result = $apiInstance->v30MembersMemberIdLogsLogEntryIdPut($member_id, $log_entry_id, $update_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersMemberIdLogsLogEntryIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **member_id** | **int**|  | |
| **log_entry_id** | **int**|  | |
| **update_log_entry** | [**\NathanEmanuel\Congressus\Rest\Model\UpdateLogEntry**](../Model/UpdateLogEntry.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntry**](../Model/LogEntry.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersMemberIdLogsPost()`

```php
v30MembersMemberIdLogsPost($member_id, $create_log_entry): \NathanEmanuel\Congressus\Rest\Model\LogEntry
```

Create LogEntry

Create a log entry. This is only possible for log entries of type `note` or `task`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$member_id = 56; // int
$create_log_entry = new \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry(); // \NathanEmanuel\Congressus\Rest\Model\CreateLogEntry

try {
    $result = $apiInstance->v30MembersMemberIdLogsPost($member_id, $create_log_entry);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersMemberIdLogsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **member_id** | **int**|  | |
| **create_log_entry** | [**\NathanEmanuel\Congressus\Rest\Model\CreateLogEntry**](../Model/CreateLogEntry.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\LogEntry**](../Model/LogEntry.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersObjIdDelete()`

```php
v30MembersObjIdDelete($obj_id)
```

Delete Member



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int

try {
    $apiInstance->v30MembersObjIdDelete($obj_id);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `v30MembersObjIdGet()`

```php
v30MembersObjIdGet($obj_id, $context): \NathanEmanuel\Congressus\Rest\Model\MemberWithCustomFields
```

Retrieve Member



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$context = array('context_example'); // string[] | Filter by None

try {
    $result = $apiInstance->v30MembersObjIdGet($obj_id, $context);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **context** | [**string[]**](../Model/string.md)| Filter by None | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberWithCustomFields**](../Model/MemberWithCustomFields.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersObjIdPut()`

```php
v30MembersObjIdPut($obj_id, $context, $member_with_custom_fields): \NathanEmanuel\Congressus\Rest\Model\MemberWithCustomFields
```

Update Member



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$context = array('context_example'); // string[] | Filter by None
$member_with_custom_fields = new \NathanEmanuel\Congressus\Rest\Model\MemberWithCustomFields(); // \NathanEmanuel\Congressus\Rest\Model\MemberWithCustomFields

try {
    $result = $apiInstance->v30MembersObjIdPut($obj_id, $context, $member_with_custom_fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **context** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **member_with_custom_fields** | [**\NathanEmanuel\Congressus\Rest\Model\MemberWithCustomFields**](../Model/MemberWithCustomFields.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberWithCustomFields**](../Model/MemberWithCustomFields.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersObjIdStatusesGet()`

```php
v30MembersObjIdStatusesGet($obj_id, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\MembershipStatusPagination
```

List Membership statuses



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$page = 1; // int
$page_size = 25; // int
$order = 'member_from:desc'; // string

try {
    $result = $apiInstance->v30MembersObjIdStatusesGet($obj_id, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdStatusesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] [default to &#39;member_from:desc&#39;] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MembershipStatusPagination**](../Model/MembershipStatusPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersObjIdStatusesMembershipStatusIdDelete()`

```php
v30MembersObjIdStatusesMembershipStatusIdDelete($membership_status_id, $obj_id)
```

Delete Membership status



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$membership_status_id = 56; // int
$obj_id = 56; // int

try {
    $apiInstance->v30MembersObjIdStatusesMembershipStatusIdDelete($membership_status_id, $obj_id);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdStatusesMembershipStatusIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **membership_status_id** | **int**|  | |
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

## `v30MembersObjIdStatusesMembershipStatusIdGet()`

```php
v30MembersObjIdStatusesMembershipStatusIdGet($membership_status_id, $obj_id): \NathanEmanuel\Congressus\Rest\Model\MembershipStatus
```

Retrieve Membership status



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$membership_status_id = 56; // int
$obj_id = 56; // int

try {
    $result = $apiInstance->v30MembersObjIdStatusesMembershipStatusIdGet($membership_status_id, $obj_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdStatusesMembershipStatusIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **membership_status_id** | **int**|  | |
| **obj_id** | **int**|  | |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MembershipStatus**](../Model/MembershipStatus.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersObjIdStatusesMembershipStatusIdPut()`

```php
v30MembersObjIdStatusesMembershipStatusIdPut($membership_status_id, $obj_id, $membership_status): \NathanEmanuel\Congressus\Rest\Model\MembershipStatus
```

Update Membership status



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$membership_status_id = 56; // int
$obj_id = 56; // int
$membership_status = new \NathanEmanuel\Congressus\Rest\Model\MembershipStatus(); // \NathanEmanuel\Congressus\Rest\Model\MembershipStatus

try {
    $result = $apiInstance->v30MembersObjIdStatusesMembershipStatusIdPut($membership_status_id, $obj_id, $membership_status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdStatusesMembershipStatusIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **membership_status_id** | **int**|  | |
| **obj_id** | **int**|  | |
| **membership_status** | [**\NathanEmanuel\Congressus\Rest\Model\MembershipStatus**](../Model/MembershipStatus.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MembershipStatus**](../Model/MembershipStatus.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersObjIdStatusesPost()`

```php
v30MembersObjIdStatusesPost($obj_id, $membership_status): \NathanEmanuel\Congressus\Rest\Model\MembershipStatus
```

Create Membership status



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$obj_id = 56; // int
$membership_status = new \NathanEmanuel\Congressus\Rest\Model\MembershipStatus(); // \NathanEmanuel\Congressus\Rest\Model\MembershipStatus

try {
    $result = $apiInstance->v30MembersObjIdStatusesPost($obj_id, $membership_status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersObjIdStatusesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **obj_id** | **int**|  | |
| **membership_status** | [**\NathanEmanuel\Congressus\Rest\Model\MembershipStatus**](../Model/MembershipStatus.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MembershipStatus**](../Model/MembershipStatus.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersPost()`

```php
v30MembersPost($context, $create_member): \NathanEmanuel\Congressus\Rest\Model\Member
```

Create Member



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$context = array('context_example'); // string[] | Filter by None
$create_member = new \NathanEmanuel\Congressus\Rest\Model\CreateMember(); // \NathanEmanuel\Congressus\Rest\Model\CreateMember

try {
    $result = $apiInstance->v30MembersPost($context, $create_member);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **context** | [**string[]**](../Model/string.md)| Filter by None | [optional] |
| **create_member** | [**\NathanEmanuel\Congressus\Rest\Model\CreateMember**](../Model/CreateMember.md)|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\Member**](../Model/Member.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `v30MembersSearchGet()`

```php
v30MembersSearchGet($term, $page, $page_size, $order): \NathanEmanuel\Congressus\Rest\Model\MemberSearchPagination
```

Search members



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = NathanEmanuel\Congressus\Rest\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new NathanEmanuel\Congressus\Rest\Api\MembersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$term = 'term_example'; // string
$page = 1; // int
$page_size = 25; // int
$order = 'order_example'; // string

try {
    $result = $apiInstance->v30MembersSearchGet($term, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MembersApi->v30MembersSearchGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **term** | **string**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **page_size** | **int**|  | [optional] [default to 25] |
| **order** | **string**|  | [optional] |

### Return type

[**\NathanEmanuel\Congressus\Rest\Model\MemberSearchPagination**](../Model/MemberSearchPagination.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
