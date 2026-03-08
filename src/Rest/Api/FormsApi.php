<?php
/**
 * FormsApi
 * PHP version 8.1
 *
 * @category Class
 * @package  NathanEmanuel\Congressus\Rest
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Congressus API
 *
 * # Introduction The Congressus API allows you to interact with your Congressus administration. The API is RESTful and uses JSON to transport information.  This documentation aims to get you started with your first requests. Make sure to read this introduction completely to know all aspects of our API.  ## REST basics A REST API describes the resources you can access in a clearly defined path structure. This documentation contains a reference for each resource in the API. Before you can use these resources, you need to know the basics of accessing the Congressus REST API.  **Paths and versioning**  The Congressus API resides on the following paths:  https://api.congressus.nl/ `version` / `resource_path` ? `query_params`  - The `version` part of the path indicates the version of the API you want to use. At this moment version v30 is the   current version. By pointing to a specific version, we can make sure you always can expect equal behaviour from our   API. - The `resource_path` part indicates the path of the resource you want to access. Specific paths to resources can be   found in the API documentation. Examples of resource paths are: /members to retrieve all members or   /member/ `obj_id` /statuses to create new member status for a member. - The `query_params` contains all filtering, ordering and pagination information.   ## Authentication The current authentication flow present at Congressus API is by the use of the Bearer Token suggested by OAuth 2.0.  To interact with the Congressus API, you must authenticate by supplying the header `Authorization` with the value `Bearer {access_token}`.  **How do I get an API key?**  You can create new apps and API keys in Congressus Manager through [this link](https://manager.congressus.nl/settings/integrations/apps).  ## Requests There are different approaches for making requests to our API. The command line tool [curl](https://curl.se/) is easy and fast for testing our API. When you want to integrate the API into your own software, you can choose to use a general purpose REST library or to [create your own API client library](https://github.com/OpenAPITools/openapi-generator) based on our OpenAPI specs.  ## Responses Congressus uses conventional HTTP response codes to indicate success or failure of an API request. In general, codes in the 2xx range indicate success, codes in the 4xx range indicate an error that resulted from the provided information (e.g. a required parameter was missing or input data was invalid), and codes in the 5xx range indicate an error with the Congressus API.  ## Pagination Endpoints returning a list of entities, are paginated to prevent large responses. To control the pagination, you can use the `page` and `page_size` parameters. page determines which page to return (default: 1), page_size controls the amount of entities to return (default: 25, maximum: 100).  Each paginated response contains the following information:  - `has_prev` bool - `prev_num` int with previous page number - `has next` bool - `next_num` int with next page number - `data` list with results on current page - `total` int with total number of results  ## Filtering Most list endpoints support filtering to get a subset of the available information. Filtering is done using the query. For some filter attributes, filtering for multiple options is supported by adding the `<filter_attribute>=<value>` multiple times. E.g. `category_id=1&category_id=2`.  ### Filtering on period  For some resources, a period filter is available. This filter is used to get a subset of the available information within a certain period. The period filter is used by adding the `period_filter` query parameter to the endpoint.  **Absolute periods**  Absolute periods are defined by exact dates. The format is `YYYY(MM(DD))`. E.g. `2024` or `202402` or `20240227`. A different end date can be given by adding `..` and the end date. E.g. `202402..202403` for the period February 2024 to March 2024.  **Relative periods**  Relative periods are defined by a period in the past or future. Multiple formats are supported:  - `today` - today's date - `yesterday` - yesterday's date - `tomorrow` - tomorrow's date - `(last/this/next)_(day/month/quarter/half_year/year)` - e.g. `last_month` or `next_year` or `this_quarter` - `last_x_days` - e.g. `last_7_days` or `last_14_days`  ## Ordering Most list endpoints support ordering on one or more attributes. The order is defined using the `order=` parameter in the query part of the endpoint.  Multiple columns can be used for ordering, delimited by a comma. E.g. `order=lastname,initials,first_name`.  Each attribute used in the order parameter could be extended with a sort property `:<sort_property>`. E.g. `order=lastname:desc`.  The following properties are supported throughout our API:  - ```:asc``` ASC NULLS LAST (default)  [comment]: <> (- ```:asc_nulls_last``` ASC NULLS LAST)  [comment]: <> (- ```:asc_nulls_first``` ASC NULLS FIRST) - ```:desc``` DESC NULLS FIRST  [comment]: <> (- ```:desc_nulls_last``` DESC NULLS LAST)  [comment]: <> (- ```:desc_nulls_first``` DESC NULLS FIRST)  ## Searching and location filtering For some resources a dedicated /search endpoint is available, which is optimized for searching large datasets. We use an Elasticsearch database to deliver these results. The schema for these resources is often a concise version of the schema used for regular endpoints, but always contains the primary key (obj_id). If you need the full schema for a resource found through /search, you can perform an additional call to the GET /<obj_id> endpoint.  In most cases, searching has the following query parameters: - `term` - generic term used for the search - `city` or `zip` - a city name or postal code (only Dutch postal codes allowed) - `distance` - distance from the center of the given city or zip (default *5km*)  Results from /search endpoints do not support custom ordering, but are ordered based on relevance (i.e. *score* for term queries and *distance* for all location bound search queries).  ## Rate limiting Usage of the Congressus API is unlimited within the plan and permissions of the account you are using. To prevent fraud and abuse, requests to the API are throttled. You can request the API 60 times each minute and 1000 times per hour.  The API will respond with a **429 Too many requests** response. This response contains the following fields in the headers:  - `X-RateLimit-Limit` The total number of requests allowed for the active window - `X-RateLimit-Remaining` The number of requests remaining in the active window. - `X-RateLimit-Reset` UTC seconds since epoch when the window will be reset. - `Retry-After` Seconds to retry after when the Rate Limit will be reset.  ## Cross-Origin Resource Sharing This API features Cross-Origin Resource Sharing (CORS) implemented in compliance with W3C spec. This allows cross-domain communication from the browser. All responses have a wildcard same-origin, which allows to use our API from any domain or server.   # Webhooks Information in a Congressus administration is constantly changing. If you want to perform actions based on these changes, webhooks help you to achieve this. Instead of querying the API at a certain interval, Congressus will notify you about changes to information in the administration.  ## Usage Webhooks are useful in a broad range of situations. When the state of an resource changes, Congressus will perform a HTTP request to the URL you provide. Based on the payload of the request, you can determine which action you need to perform.  How it works:  - You need a URL that Congressus can call to deliver the payload. The Congressus servers must be able to access this   URL. - You can add HTTP basic authentication or other token authentication in the URL, as long as the URL stays valid. - Your URL always needs to respond with a 200 HTTP status. Upon registration this is checked. - When your URL responds with another HTTP status code, Congressus will retry to deliver the call 10 times. The time   interval between retries is gradually extended. - After each call, Congressus will store the last HTTP status code and HTTP body. Using the webhooks API, you can   retrieve this information for debugging purposes. - You can register as many webhooks as required in an administration. Registration is done by sending a POST request   to the webhooks API.  > **We strongly recommend that you use a secure HTTPS endpoint for receiving payload from Congressus. If you use > unencrypted HTTP, anyone on the network may be able to listen in on sensitive information like members and invoices.**  ## Webhook events Each webhook subscribes to an event. When an event occurs, Congressus will call the webhook using an HTTP request to the provided URL. The following events are available:  **Members** - member - All member related events - member_added - Member added to the administration - member_updated - Existing Member is updated - member_deleted - Member is removed from the administration - member_birthday - Triggered once on the birthday of a member  **Events** - event - All event related events - event_added - Event added - event_updated - Event updated - event_deleted - Event deleted from the administration  **Event participations** - event_participation - All event participation related events - event_participation_added - Event participation added - event_participation_updated - Event participation updated - event_participation_deleted - Event participation deleted from the administration  **Form entries** - form_entry - All form entry related events - form_entry_added - Form entry added - form_entry_updated - Form entry updated - form_entry_deleted - Form entry deleted from the administration  **Sale invoices** - sale_invoices - All sale invoice related events - sale_invoices_added - Sale invoice added - sale_invoices_updated - Sale invoice updated - sale_invoices_deleted - Sale invoice deleted from the administration   ## Payload Each webhook call has a payload based on the category of the event that triggered the webhook. E.g. events in the category **Members** get a payload based on the schema for Members, filled with the data for the resource that triggered the webhook.  Each webhook call contains the following information:  - `webhook_id`-  The id of the webhook that triggered the call - `webhook_event` - The category of events for the webhook - `webhook_event_trigger` -  The trigger that caused the webhook call - `created` - Date and time at which the webhook was triggered - `data` - List which contains the payload(s) in the form of the complete resource that triggered the event  # Changelog  This is version 3.0 of the Congressus API. In this chapter we describe all changes in v3.0.  ## 2025-09-30 Endpoint for Filters added - A new endpoint `/filters` is added to retrieve available filters for Members, Events and Organisations.  ## 2025-08-13 Filter on folder_id added to Storage - The `folder_id` parameter is added to the `storage` endpoint. This allows you to filter storage resources by folder.  ## 2025-07-11 Website added to Magic link endpoint - The `website_id` parameter is added to the `magic-links` endpoint. This allows you to create magic links for a specific   website.  ## 2025-05-24 Organisation resource improvements - `Organisation` resources now also have the 'published' attribute. - `Organisation` resources now also include custom field data in the `custom_field_data` attribute.   - Custom fields are defined per organisation category, so the custom fields available for an organisation     depend on the category of the organisation. - `Organisation category` resources now also include metadata for the custom fields available for that category in the   `custom_fields` attribute.  ## 2025-05-04 Magic links added - `Magic links` are added to the API. These links can be used to authenticate a website visitor without the need for a password.  ## 2024-11-25 Form and Form entry resources added - `Form` and `Form entry` resources are added to the API. - `Form` resources can be created and updated through the API. It is currently not possible to delete a form or manage fields and fieldsets. - `forms/<form_id>/entries` endpoint is available to retrieve form entries. - `forms/<form_id>/fields` endpoint is available to retrieve form fields.  ## 2024-04-23 Custom fields for Members available in PUT/POST requests  - Custom fields for Members can now be added or updated through the API. The custom fields are available in the   `custom_field_data` attribute of the Member resource. - The old `custom_fields` attribute is deprecated and will be removed in a future version. - The `members/custom-fields` resource shows the available custom fields for Members, including meta information.  ## 2024-02-27 Action endpoints for EventParticipation added  - `EventParticipation` status can now be changed through the API, including fines when unsubscribing or declining a   participation. - API upgrade guide from v20 to v30 removed from docs, as it is no longer relevant. The v20 API is unavailable since mid   2023.  ## 2022-12-09 Event ticket types endpoints - `EventTicketType` resources can now be created, updated and deleted through the API - The context is now applied at row level according to the status of the Member for the `v30/members` endpoint  ## 2022-06-28 Events updated, MembershipStatus resources added - `Event` resources are now fully operational, including the possibility to add participants / sell tickets through the API. - `MembershipStatus` is now available for Member resources.  ## 2022-06-22 Minor updates and fixes - Feat: /members can be filtered against multiples statuses with the status_id query parameter (i.e: /members?status_id=2&status_id=3). - Feat: the News model now contains a list of websites where the news item is published on - Fix: add the default website to POST /news on create - Fix: sale_invoice_id is now honored when given by the creation of a sale invoice /sale-invoices/<int:obj_id>/send  ## 2022-06-03 Minor updates and fixes - Feat: Additional filtering for /sale-invoices endpoint added (invoice_type 'debit', 'is_credited' and 'is_not_credited'). - Feat: Renamed /groups/folders endpoints to /group-folders for more consistency. Deprecated old endpoints. - Feat: Added member status resources through /member-statuses. - Feat: Added profile_picture and formal_picture to Member resources. - Fix: we incorrectly used 'per_page' as parameter in the Pagination-section of these docs. The correct parameter is **'page_size'**. - Fix: all non-recursive endpoints for Group folders and Product folders returned children, this is resolved.  ## 2022-05-03 Member validation through context added - Added extended validation options for Member-resources by setting a `context` parameter. This context ensures validation according to the field settings as set in Congressus Manager for the member status. - Description for Context validation added to the Member-resources. - Introduction on Context validation added to the [upgrade guide](#section/Upgrading-from-v20-to-v30)  ## 2022-04-22 Upgrade guide from v20 to v30 added - First version for the [upgrade guide](#section/Upgrading-from-v20-to-v30) added  ## 2022-03-23 Additional filtering for Group and Organisation resources - `Group` and `Group membership` resources can use a filter on member_id - `Organisation` and `Organisation membership` resources can use a filter on member_id  ## 2022-03-21 Group and GroupFolder resources added - Group, GroupFolder and GroupMembership resources are added to the API. - `Group folders` are added and use a tree-like structure. - `Organisation` resources have create, update and delete views added. - `Organisation membership` resources are added - Fix: SDD mandates returned and empty list for Member resources.  ## 2021-10-14 Organisation resources added - Both Organisation and Organisation category resources are added to the API.  ## 2021-10-02 Additional filters added for Event participations - `Event participations` have additional filter functionality  ## 2021-09-22 Added resources for Product folders and Sale invoice workflows - `Product folders` are added, using a tree-like structure. - `Sale invoice workflows` are added as resource. Read-only for this moment. - Updated descriptions for Sale invoice attributes.  ## 2021-08-09 additional filters for events and products - Events can now be filtered on published true/false - Products can now be filtered on published and folder_id. More than one folder_id can be given by supplying it more   than once as query param, e.g. `products?folder_id=123&folder_id=456`  ## 2021-08-04 custom fields and descriptions added, publication options added to events and blogs - The retrieve member resource now also shows the custom field information for a member - Many attributes have an additional description added - Publication attributes are added to Event and Blog resources  ## 2021-06-09 website related resources added - Website and Webpage resources added (list and get only) - News resources added - Default order is added for Websites, Webpages, Events and News list endpoints. You can overwrite the default order   with the `order` query param - Improved descriptions for several resources, removed some typo's in the documentation  ## 2021-04-06 initial release - This initial release contains a minor set of resources to work with.
 *
 * The version of the OpenAPI document: 3.0
 * Contact: support@congressus.nl
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.20.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace NathanEmanuel\Congressus\Rest\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use NathanEmanuel\Congressus\Rest\ApiException;
use NathanEmanuel\Congressus\Rest\Configuration;
use NathanEmanuel\Congressus\Rest\FormDataProcessor;
use NathanEmanuel\Congressus\Rest\HeaderSelector;
use NathanEmanuel\Congressus\Rest\ObjectSerializer;

/**
 * FormsApi Class Doc Comment
 *
 * @category Class
 * @package  NathanEmanuel\Congressus\Rest
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class FormsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'v30FormsFormIdEntriesGet' => [
            'application/json',
        ],
        'v30FormsFormIdEntriesObjIdGet' => [
            'application/json',
        ],
        'v30FormsFormIdFieldsGet' => [
            'application/json',
        ],
        'v30FormsFormIdFieldsObjIdGet' => [
            'application/json',
        ],
        'v30FormsFormIdFieldsRefGet' => [
            'application/json',
        ],
        'v30FormsGet' => [
            'application/json',
        ],
        'v30FormsObjIdGet' => [
            'application/json',
        ],
        'v30FormsObjIdPut' => [
            'application/json',
        ],
        'v30FormsPost' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation v30FormsFormIdEntriesGet
     *
     * List Form entries
     *
     * @param  int $form_id form_id (required)
     * @param  string|null $period Filter period on &#x60;created&#x60; (optional)
     * @param  string|null $status Filter on &#x60;status&#x60; (optional)
     * @param  string|null $is_archived Filter on &#x60;is_archived&#x60; (optional)
     * @param  int|null $page page (optional, default to 1)
     * @param  int|null $page_size page_size (optional, default to 25)
     * @param  string|null $order order (optional, default to 'created:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormEntryPagination
     */
    public function v30FormsFormIdEntriesGet($form_id, $period = null, $status = null, $is_archived = null, $page = 1, $page_size = 25, $order = 'created:desc', string $contentType = self::contentTypes['v30FormsFormIdEntriesGet'][0])
    {
        list($response) = $this->v30FormsFormIdEntriesGetWithHttpInfo($form_id, $period, $status, $is_archived, $page, $page_size, $order, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsFormIdEntriesGetWithHttpInfo
     *
     * List Form entries
     *
     * @param  int $form_id (required)
     * @param  string|null $period Filter period on &#x60;created&#x60; (optional)
     * @param  string|null $status Filter on &#x60;status&#x60; (optional)
     * @param  string|null $is_archived Filter on &#x60;is_archived&#x60; (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'created:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormEntryPagination, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsFormIdEntriesGetWithHttpInfo($form_id, $period = null, $status = null, $is_archived = null, $page = 1, $page_size = 25, $order = 'created:desc', string $contentType = self::contentTypes['v30FormsFormIdEntriesGet'][0])
    {
        $request = $this->v30FormsFormIdEntriesGetRequest($form_id, $period, $status, $is_archived, $page, $page_size, $order, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\FormEntryPagination',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\FormEntryPagination',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\FormEntryPagination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsFormIdEntriesGetAsync
     *
     * List Form entries
     *
     * @param  int $form_id (required)
     * @param  string|null $period Filter period on &#x60;created&#x60; (optional)
     * @param  string|null $status Filter on &#x60;status&#x60; (optional)
     * @param  string|null $is_archived Filter on &#x60;is_archived&#x60; (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'created:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdEntriesGetAsync($form_id, $period = null, $status = null, $is_archived = null, $page = 1, $page_size = 25, $order = 'created:desc', string $contentType = self::contentTypes['v30FormsFormIdEntriesGet'][0])
    {
        return $this->v30FormsFormIdEntriesGetAsyncWithHttpInfo($form_id, $period, $status, $is_archived, $page, $page_size, $order, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsFormIdEntriesGetAsyncWithHttpInfo
     *
     * List Form entries
     *
     * @param  int $form_id (required)
     * @param  string|null $period Filter period on &#x60;created&#x60; (optional)
     * @param  string|null $status Filter on &#x60;status&#x60; (optional)
     * @param  string|null $is_archived Filter on &#x60;is_archived&#x60; (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'created:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdEntriesGetAsyncWithHttpInfo($form_id, $period = null, $status = null, $is_archived = null, $page = 1, $page_size = 25, $order = 'created:desc', string $contentType = self::contentTypes['v30FormsFormIdEntriesGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\FormEntryPagination';
        $request = $this->v30FormsFormIdEntriesGetRequest($form_id, $period, $status, $is_archived, $page, $page_size, $order, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsFormIdEntriesGet'
     *
     * @param  int $form_id (required)
     * @param  string|null $period Filter period on &#x60;created&#x60; (optional)
     * @param  string|null $status Filter on &#x60;status&#x60; (optional)
     * @param  string|null $is_archived Filter on &#x60;is_archived&#x60; (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'created:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsFormIdEntriesGetRequest($form_id, $period = null, $status = null, $is_archived = null, $page = 1, $page_size = 25, $order = 'created:desc', string $contentType = self::contentTypes['v30FormsFormIdEntriesGet'][0])
    {

        // verify the required parameter 'form_id' is set
        if ($form_id === null || (is_array($form_id) && count($form_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $form_id when calling v30FormsFormIdEntriesGet'
            );
        }
        if ($form_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$form_id" when calling FormsApi.v30FormsFormIdEntriesGet, must be bigger than or equal to 0.');
        }
        



        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling FormsApi.v30FormsFormIdEntriesGet, must be bigger than or equal to 1.');
        }
        
        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling FormsApi.v30FormsFormIdEntriesGet, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling FormsApi.v30FormsFormIdEntriesGet, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v30/forms/{form_id}/entries';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $period,
            'period', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $status,
            'status', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $is_archived,
            'is_archived', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'page_size', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $order,
            'order', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($form_id !== null) {
            $resourcePath = str_replace(
                '{' . 'form_id' . '}',
                ObjectSerializer::toPathValue($form_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsFormIdEntriesObjIdGet
     *
     * Retrieve Form entry
     *
     * @param  int $form_id form_id (required)
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormEntry
     */
    public function v30FormsFormIdEntriesObjIdGet($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdEntriesObjIdGet'][0])
    {
        list($response) = $this->v30FormsFormIdEntriesObjIdGetWithHttpInfo($form_id, $obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsFormIdEntriesObjIdGetWithHttpInfo
     *
     * Retrieve Form entry
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormEntry, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsFormIdEntriesObjIdGetWithHttpInfo($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdEntriesObjIdGet'][0])
    {
        $request = $this->v30FormsFormIdEntriesObjIdGetRequest($form_id, $obj_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\FormEntry',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\FormEntry',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\FormEntry',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsFormIdEntriesObjIdGetAsync
     *
     * Retrieve Form entry
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdEntriesObjIdGetAsync($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdEntriesObjIdGet'][0])
    {
        return $this->v30FormsFormIdEntriesObjIdGetAsyncWithHttpInfo($form_id, $obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsFormIdEntriesObjIdGetAsyncWithHttpInfo
     *
     * Retrieve Form entry
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdEntriesObjIdGetAsyncWithHttpInfo($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdEntriesObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\FormEntry';
        $request = $this->v30FormsFormIdEntriesObjIdGetRequest($form_id, $obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsFormIdEntriesObjIdGet'
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdEntriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsFormIdEntriesObjIdGetRequest($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdEntriesObjIdGet'][0])
    {

        // verify the required parameter 'form_id' is set
        if ($form_id === null || (is_array($form_id) && count($form_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $form_id when calling v30FormsFormIdEntriesObjIdGet'
            );
        }
        if ($form_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$form_id" when calling FormsApi.v30FormsFormIdEntriesObjIdGet, must be bigger than or equal to 0.');
        }
        
        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30FormsFormIdEntriesObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling FormsApi.v30FormsFormIdEntriesObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/forms/{form_id}/entries/{obj_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($form_id !== null) {
            $resourcePath = str_replace(
                '{' . 'form_id' . '}',
                ObjectSerializer::toPathValue($form_id),
                $resourcePath
            );
        }
        // path params
        if ($obj_id !== null) {
            $resourcePath = str_replace(
                '{' . 'obj_id' . '}',
                ObjectSerializer::toPathValue($obj_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsFormIdFieldsGet
     *
     * List Form fields
     *
     * @param  int $form_id form_id (required)
     * @param  int|null $page page (optional, default to 1)
     * @param  int|null $page_size page_size (optional, default to 25)
     * @param  string|null $order order (optional, default to 'ref')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormFieldPagination
     */
    public function v30FormsFormIdFieldsGet($form_id, $page = 1, $page_size = 25, $order = 'ref', string $contentType = self::contentTypes['v30FormsFormIdFieldsGet'][0])
    {
        list($response) = $this->v30FormsFormIdFieldsGetWithHttpInfo($form_id, $page, $page_size, $order, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsFormIdFieldsGetWithHttpInfo
     *
     * List Form fields
     *
     * @param  int $form_id (required)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'ref')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormFieldPagination, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsFormIdFieldsGetWithHttpInfo($form_id, $page = 1, $page_size = 25, $order = 'ref', string $contentType = self::contentTypes['v30FormsFormIdFieldsGet'][0])
    {
        $request = $this->v30FormsFormIdFieldsGetRequest($form_id, $page, $page_size, $order, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\FormFieldPagination',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\FormFieldPagination',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\FormFieldPagination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsFormIdFieldsGetAsync
     *
     * List Form fields
     *
     * @param  int $form_id (required)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'ref')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdFieldsGetAsync($form_id, $page = 1, $page_size = 25, $order = 'ref', string $contentType = self::contentTypes['v30FormsFormIdFieldsGet'][0])
    {
        return $this->v30FormsFormIdFieldsGetAsyncWithHttpInfo($form_id, $page, $page_size, $order, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsFormIdFieldsGetAsyncWithHttpInfo
     *
     * List Form fields
     *
     * @param  int $form_id (required)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'ref')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdFieldsGetAsyncWithHttpInfo($form_id, $page = 1, $page_size = 25, $order = 'ref', string $contentType = self::contentTypes['v30FormsFormIdFieldsGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\FormFieldPagination';
        $request = $this->v30FormsFormIdFieldsGetRequest($form_id, $page, $page_size, $order, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsFormIdFieldsGet'
     *
     * @param  int $form_id (required)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'ref')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsFormIdFieldsGetRequest($form_id, $page = 1, $page_size = 25, $order = 'ref', string $contentType = self::contentTypes['v30FormsFormIdFieldsGet'][0])
    {

        // verify the required parameter 'form_id' is set
        if ($form_id === null || (is_array($form_id) && count($form_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $form_id when calling v30FormsFormIdFieldsGet'
            );
        }
        if ($form_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$form_id" when calling FormsApi.v30FormsFormIdFieldsGet, must be bigger than or equal to 0.');
        }
        
        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling FormsApi.v30FormsFormIdFieldsGet, must be bigger than or equal to 1.');
        }
        
        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling FormsApi.v30FormsFormIdFieldsGet, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling FormsApi.v30FormsFormIdFieldsGet, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v30/forms/{form_id}/fields';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'page_size', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $order,
            'order', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($form_id !== null) {
            $resourcePath = str_replace(
                '{' . 'form_id' . '}',
                ObjectSerializer::toPathValue($form_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsFormIdFieldsObjIdGet
     *
     * Retrieve field by ID
     *
     * @param  int $form_id form_id (required)
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormField
     */
    public function v30FormsFormIdFieldsObjIdGet($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdFieldsObjIdGet'][0])
    {
        list($response) = $this->v30FormsFormIdFieldsObjIdGetWithHttpInfo($form_id, $obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsFormIdFieldsObjIdGetWithHttpInfo
     *
     * Retrieve field by ID
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormField, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsFormIdFieldsObjIdGetWithHttpInfo($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdFieldsObjIdGet'][0])
    {
        $request = $this->v30FormsFormIdFieldsObjIdGetRequest($form_id, $obj_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\FormField',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\FormField',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\FormField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsFormIdFieldsObjIdGetAsync
     *
     * Retrieve field by ID
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdFieldsObjIdGetAsync($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdFieldsObjIdGet'][0])
    {
        return $this->v30FormsFormIdFieldsObjIdGetAsyncWithHttpInfo($form_id, $obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsFormIdFieldsObjIdGetAsyncWithHttpInfo
     *
     * Retrieve field by ID
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdFieldsObjIdGetAsyncWithHttpInfo($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdFieldsObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\FormField';
        $request = $this->v30FormsFormIdFieldsObjIdGetRequest($form_id, $obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsFormIdFieldsObjIdGet'
     *
     * @param  int $form_id (required)
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsFormIdFieldsObjIdGetRequest($form_id, $obj_id, string $contentType = self::contentTypes['v30FormsFormIdFieldsObjIdGet'][0])
    {

        // verify the required parameter 'form_id' is set
        if ($form_id === null || (is_array($form_id) && count($form_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $form_id when calling v30FormsFormIdFieldsObjIdGet'
            );
        }
        if ($form_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$form_id" when calling FormsApi.v30FormsFormIdFieldsObjIdGet, must be bigger than or equal to 0.');
        }
        
        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30FormsFormIdFieldsObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling FormsApi.v30FormsFormIdFieldsObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/forms/{form_id}/fields/{obj_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($form_id !== null) {
            $resourcePath = str_replace(
                '{' . 'form_id' . '}',
                ObjectSerializer::toPathValue($form_id),
                $resourcePath
            );
        }
        // path params
        if ($obj_id !== null) {
            $resourcePath = str_replace(
                '{' . 'obj_id' . '}',
                ObjectSerializer::toPathValue($obj_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsFormIdFieldsRefGet
     *
     * Retrieve field by ref
     *
     * @param  int $form_id form_id (required)
     * @param  string $ref ref (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsRefGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormField
     */
    public function v30FormsFormIdFieldsRefGet($form_id, $ref, string $contentType = self::contentTypes['v30FormsFormIdFieldsRefGet'][0])
    {
        list($response) = $this->v30FormsFormIdFieldsRefGetWithHttpInfo($form_id, $ref, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsFormIdFieldsRefGetWithHttpInfo
     *
     * Retrieve field by ref
     *
     * @param  int $form_id (required)
     * @param  string $ref (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsRefGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormField, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsFormIdFieldsRefGetWithHttpInfo($form_id, $ref, string $contentType = self::contentTypes['v30FormsFormIdFieldsRefGet'][0])
    {
        $request = $this->v30FormsFormIdFieldsRefGetRequest($form_id, $ref, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\FormField',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\FormField',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\FormField',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsFormIdFieldsRefGetAsync
     *
     * Retrieve field by ref
     *
     * @param  int $form_id (required)
     * @param  string $ref (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsRefGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdFieldsRefGetAsync($form_id, $ref, string $contentType = self::contentTypes['v30FormsFormIdFieldsRefGet'][0])
    {
        return $this->v30FormsFormIdFieldsRefGetAsyncWithHttpInfo($form_id, $ref, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsFormIdFieldsRefGetAsyncWithHttpInfo
     *
     * Retrieve field by ref
     *
     * @param  int $form_id (required)
     * @param  string $ref (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsRefGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsFormIdFieldsRefGetAsyncWithHttpInfo($form_id, $ref, string $contentType = self::contentTypes['v30FormsFormIdFieldsRefGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\FormField';
        $request = $this->v30FormsFormIdFieldsRefGetRequest($form_id, $ref, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsFormIdFieldsRefGet'
     *
     * @param  int $form_id (required)
     * @param  string $ref (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsFormIdFieldsRefGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsFormIdFieldsRefGetRequest($form_id, $ref, string $contentType = self::contentTypes['v30FormsFormIdFieldsRefGet'][0])
    {

        // verify the required parameter 'form_id' is set
        if ($form_id === null || (is_array($form_id) && count($form_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $form_id when calling v30FormsFormIdFieldsRefGet'
            );
        }
        if ($form_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$form_id" when calling FormsApi.v30FormsFormIdFieldsRefGet, must be bigger than or equal to 0.');
        }
        
        // verify the required parameter 'ref' is set
        if ($ref === null || (is_array($ref) && count($ref) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ref when calling v30FormsFormIdFieldsRefGet'
            );
        }
        if (strlen($ref) < 1) {
            throw new \InvalidArgumentException('invalid length for "$ref" when calling FormsApi.v30FormsFormIdFieldsRefGet, must be bigger than or equal to 1.');
        }
        

        $resourcePath = '/v30/forms/{form_id}/fields/{ref}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($form_id !== null) {
            $resourcePath = str_replace(
                '{' . 'form_id' . '}',
                ObjectSerializer::toPathValue($form_id),
                $resourcePath
            );
        }
        // path params
        if ($ref !== null) {
            $resourcePath = str_replace(
                '{' . 'ref' . '}',
                ObjectSerializer::toPathValue($ref),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsGet
     *
     * List Forms
     *
     * @param  int|null $page page (optional, default to 1)
     * @param  int|null $page_size page_size (optional, default to 25)
     * @param  string|null $order order (optional, default to 'title_sortable')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormPagination
     */
    public function v30FormsGet($page = 1, $page_size = 25, $order = 'title_sortable', string $contentType = self::contentTypes['v30FormsGet'][0])
    {
        list($response) = $this->v30FormsGetWithHttpInfo($page, $page_size, $order, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsGetWithHttpInfo
     *
     * List Forms
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'title_sortable')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\FormPagination, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsGetWithHttpInfo($page = 1, $page_size = 25, $order = 'title_sortable', string $contentType = self::contentTypes['v30FormsGet'][0])
    {
        $request = $this->v30FormsGetRequest($page, $page_size, $order, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\FormPagination',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\FormPagination',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\FormPagination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsGetAsync
     *
     * List Forms
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'title_sortable')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsGetAsync($page = 1, $page_size = 25, $order = 'title_sortable', string $contentType = self::contentTypes['v30FormsGet'][0])
    {
        return $this->v30FormsGetAsyncWithHttpInfo($page, $page_size, $order, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsGetAsyncWithHttpInfo
     *
     * List Forms
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'title_sortable')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsGetAsyncWithHttpInfo($page = 1, $page_size = 25, $order = 'title_sortable', string $contentType = self::contentTypes['v30FormsGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\FormPagination';
        $request = $this->v30FormsGetRequest($page, $page_size, $order, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsGet'
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'title_sortable')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsGetRequest($page = 1, $page_size = 25, $order = 'title_sortable', string $contentType = self::contentTypes['v30FormsGet'][0])
    {

        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling FormsApi.v30FormsGet, must be bigger than or equal to 1.');
        }
        
        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling FormsApi.v30FormsGet, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling FormsApi.v30FormsGet, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v30/forms';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page_size,
            'page_size', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $order,
            'order', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsObjIdGet
     *
     * Retrieve Form
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Form
     */
    public function v30FormsObjIdGet($obj_id, string $contentType = self::contentTypes['v30FormsObjIdGet'][0])
    {
        list($response) = $this->v30FormsObjIdGetWithHttpInfo($obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsObjIdGetWithHttpInfo
     *
     * Retrieve Form
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Form, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsObjIdGetWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30FormsObjIdGet'][0])
    {
        $request = $this->v30FormsObjIdGetRequest($obj_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 200:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Form',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\Form',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Form',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsObjIdGetAsync
     *
     * Retrieve Form
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsObjIdGetAsync($obj_id, string $contentType = self::contentTypes['v30FormsObjIdGet'][0])
    {
        return $this->v30FormsObjIdGetAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsObjIdGetAsyncWithHttpInfo
     *
     * Retrieve Form
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsObjIdGetAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30FormsObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\Form';
        $request = $this->v30FormsObjIdGetRequest($obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsObjIdGet'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsObjIdGetRequest($obj_id, string $contentType = self::contentTypes['v30FormsObjIdGet'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30FormsObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling FormsApi.v30FormsObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/forms/{obj_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($obj_id !== null) {
            $resourcePath = str_replace(
                '{' . 'obj_id' . '}',
                ObjectSerializer::toPathValue($obj_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsObjIdPut
     *
     * Update Form
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\Form|null $form form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Form
     */
    public function v30FormsObjIdPut($obj_id, $form = null, string $contentType = self::contentTypes['v30FormsObjIdPut'][0])
    {
        list($response) = $this->v30FormsObjIdPutWithHttpInfo($obj_id, $form, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsObjIdPutWithHttpInfo
     *
     * Update Form
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\Form|null $form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Form, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsObjIdPutWithHttpInfo($obj_id, $form = null, string $contentType = self::contentTypes['v30FormsObjIdPut'][0])
    {
        $request = $this->v30FormsObjIdPutRequest($obj_id, $form, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 202:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Form',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\Form',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 202:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Form',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsObjIdPutAsync
     *
     * Update Form
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\Form|null $form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsObjIdPutAsync($obj_id, $form = null, string $contentType = self::contentTypes['v30FormsObjIdPut'][0])
    {
        return $this->v30FormsObjIdPutAsyncWithHttpInfo($obj_id, $form, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsObjIdPutAsyncWithHttpInfo
     *
     * Update Form
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\Form|null $form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsObjIdPutAsyncWithHttpInfo($obj_id, $form = null, string $contentType = self::contentTypes['v30FormsObjIdPut'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\Form';
        $request = $this->v30FormsObjIdPutRequest($obj_id, $form, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsObjIdPut'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\Form|null $form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsObjIdPutRequest($obj_id, $form = null, string $contentType = self::contentTypes['v30FormsObjIdPut'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30FormsObjIdPut'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling FormsApi.v30FormsObjIdPut, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/forms/{obj_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($obj_id !== null) {
            $resourcePath = str_replace(
                '{' . 'obj_id' . '}',
                ObjectSerializer::toPathValue($obj_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($form)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($form));
            } else {
                $httpBody = $form;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PUT',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30FormsPost
     *
     * Create Form
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BaseForm|null $base_form base_form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BaseForm
     */
    public function v30FormsPost($base_form = null, string $contentType = self::contentTypes['v30FormsPost'][0])
    {
        list($response) = $this->v30FormsPostWithHttpInfo($base_form, $contentType);
        return $response;
    }

    /**
     * Operation v30FormsPostWithHttpInfo
     *
     * Create Form
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BaseForm|null $base_form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BaseForm, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30FormsPostWithHttpInfo($base_form = null, string $contentType = self::contentTypes['v30FormsPost'][0])
    {
        $request = $this->v30FormsPostRequest($base_form, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 400:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 500:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $request,
                        $response,
                    );
                case 201:
                    return $this->handleResponseWithDataType(
                        '\NathanEmanuel\Congressus\Rest\Model\BaseForm',
                        $request,
                        $response,
                    );
            }

            

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return $this->handleResponseWithDataType(
                '\NathanEmanuel\Congressus\Rest\Model\BaseForm',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\NathanEmanuel\Congressus\Rest\Model\BaseForm',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30FormsPostAsync
     *
     * Create Form
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BaseForm|null $base_form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsPostAsync($base_form = null, string $contentType = self::contentTypes['v30FormsPost'][0])
    {
        return $this->v30FormsPostAsyncWithHttpInfo($base_form, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30FormsPostAsyncWithHttpInfo
     *
     * Create Form
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BaseForm|null $base_form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30FormsPostAsyncWithHttpInfo($base_form = null, string $contentType = self::contentTypes['v30FormsPost'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BaseForm';
        $request = $this->v30FormsPostRequest($base_form, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'v30FormsPost'
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BaseForm|null $base_form (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30FormsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30FormsPostRequest($base_form = null, string $contentType = self::contentTypes['v30FormsPost'][0])
    {



        $resourcePath = '/v30/forms';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($base_form)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($base_form));
            } else {
                $httpBody = $base_form;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        if ($this->config->getCertFile()) {
            $options[RequestOptions::CERT] = $this->config->getCertFile();
        }

        if ($this->config->getKeyFile()) {
            $options[RequestOptions::SSL_KEY] = $this->config->getKeyFile();
        }

        return $options;
    }

    private function handleResponseWithDataType(
        string $dataType,
        RequestInterface $request,
        ResponseInterface $response
    ): array {
        if ($dataType === '\SplFileObject') {
            $content = $response->getBody(); //stream goes to serializer
        } else {
            $content = (string) $response->getBody();
            if ($dataType !== 'string') {
                try {
                    $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                } catch (\JsonException $exception) {
                    throw new ApiException(
                        sprintf(
                            'Error JSON decoding server response (%s)',
                            $request->getUri()
                        ),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                        $content
                    );
                }
            }
        }

        return [
            ObjectSerializer::deserialize($content, $dataType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    private function responseWithinRangeCode(
        string $rangeCode,
        int $statusCode
    ): bool {
        $left = (int) ($rangeCode[0].'00');
        $right = (int) ($rangeCode[0].'99');

        return $statusCode >= $left && $statusCode <= $right;
    }
}
