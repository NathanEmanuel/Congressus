<?php
/**
 * BlogsApi
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
 * BlogsApi Class Doc Comment
 *
 * @category Class
 * @package  NathanEmanuel\Congressus\Rest
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BlogsApi
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
        'v30BlogsAuthorsGet' => [
            'application/json',
        ],
        'v30BlogsAuthorsObjIdDelete' => [
            'application/json',
        ],
        'v30BlogsAuthorsObjIdGet' => [
            'application/json',
        ],
        'v30BlogsAuthorsObjIdPut' => [
            'application/json',
        ],
        'v30BlogsAuthorsPost' => [
            'application/json',
        ],
        'v30BlogsCategoriesGet' => [
            'application/json',
        ],
        'v30BlogsCategoriesObjIdDelete' => [
            'application/json',
        ],
        'v30BlogsCategoriesObjIdGet' => [
            'application/json',
        ],
        'v30BlogsCategoriesObjIdPut' => [
            'application/json',
        ],
        'v30BlogsCategoriesPost' => [
            'application/json',
        ],
        'v30BlogsGet' => [
            'application/json',
        ],
        'v30BlogsIssuesGet' => [
            'application/json',
        ],
        'v30BlogsIssuesObjIdDelete' => [
            'application/json',
        ],
        'v30BlogsIssuesObjIdGet' => [
            'application/json',
        ],
        'v30BlogsIssuesObjIdPut' => [
            'application/json',
        ],
        'v30BlogsIssuesPost' => [
            'application/json',
        ],
        'v30BlogsObjIdDelete' => [
            'application/json',
        ],
        'v30BlogsObjIdGet' => [
            'application/json',
        ],
        'v30BlogsObjIdParagraphsImagePost' => [
            'application/json',
        ],
        'v30BlogsObjIdParagraphsTextPost' => [
            'application/json',
        ],
        'v30BlogsObjIdPut' => [
            'application/json',
        ],
        'v30BlogsParagraphsImageObjIdDelete' => [
            'application/json',
        ],
        'v30BlogsParagraphsImageObjIdGet' => [
            'application/json',
        ],
        'v30BlogsParagraphsImageObjIdPut' => [
            'application/json',
        ],
        'v30BlogsParagraphsTextObjIdDelete' => [
            'application/json',
        ],
        'v30BlogsParagraphsTextObjIdGet' => [
            'application/json',
        ],
        'v30BlogsParagraphsTextObjIdPut' => [
            'application/json',
        ],
        'v30BlogsPost' => [
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
     * Operation v30BlogsAuthorsGet
     *
     * List Blog authors
     *
     * @param  int|null $page page (optional, default to 1)
     * @param  int|null $page_size page_size (optional, default to 25)
     * @param  string|null $order order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination
     */
    public function v30BlogsAuthorsGet($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsAuthorsGet'][0])
    {
        list($response) = $this->v30BlogsAuthorsGetWithHttpInfo($page, $page_size, $order, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsAuthorsGetWithHttpInfo
     *
     * List Blog authors
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsAuthorsGetWithHttpInfo($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsAuthorsGet'][0])
    {
        $request = $this->v30BlogsAuthorsGetRequest($page, $page_size, $order, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsAuthorsGetAsync
     *
     * List Blog authors
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsGetAsync($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsAuthorsGet'][0])
    {
        return $this->v30BlogsAuthorsGetAsyncWithHttpInfo($page, $page_size, $order, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsAuthorsGetAsyncWithHttpInfo
     *
     * List Blog authors
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsGetAsyncWithHttpInfo($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsAuthorsGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogAuthorPagination';
        $request = $this->v30BlogsAuthorsGetRequest($page, $page_size, $order, $contentType);

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
     * Create request for operation 'v30BlogsAuthorsGet'
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsAuthorsGetRequest($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsAuthorsGet'][0])
    {

        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling BlogsApi.v30BlogsAuthorsGet, must be bigger than or equal to 1.');
        }
        
        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsAuthorsGet, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsAuthorsGet, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v30/blogs/authors';
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
     * Operation v30BlogsAuthorsObjIdDelete
     *
     * Delete BlogAuthor
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function v30BlogsAuthorsObjIdDelete($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdDelete'][0])
    {
        $this->v30BlogsAuthorsObjIdDeleteWithHttpInfo($obj_id, $contentType);
    }

    /**
     * Operation v30BlogsAuthorsObjIdDeleteWithHttpInfo
     *
     * Delete BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsAuthorsObjIdDeleteWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdDelete'][0])
    {
        $request = $this->v30BlogsAuthorsObjIdDeleteRequest($obj_id, $contentType);

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


            return [null, $statusCode, $response->getHeaders()];
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
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsAuthorsObjIdDeleteAsync
     *
     * Delete BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsObjIdDeleteAsync($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdDelete'][0])
    {
        return $this->v30BlogsAuthorsObjIdDeleteAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsAuthorsObjIdDeleteAsyncWithHttpInfo
     *
     * Delete BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsObjIdDeleteAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdDelete'][0])
    {
        $returnType = '';
        $request = $this->v30BlogsAuthorsObjIdDeleteRequest($obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'v30BlogsAuthorsObjIdDelete'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsAuthorsObjIdDeleteRequest($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdDelete'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsAuthorsObjIdDelete'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsAuthorsObjIdDelete, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/authors/{obj_id}';
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30BlogsAuthorsObjIdGet
     *
     * Retrieve BlogAuthor
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthor
     */
    public function v30BlogsAuthorsObjIdGet($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdGet'][0])
    {
        list($response) = $this->v30BlogsAuthorsObjIdGetWithHttpInfo($obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsAuthorsObjIdGetWithHttpInfo
     *
     * Retrieve BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthor, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsAuthorsObjIdGetWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdGet'][0])
    {
        $request = $this->v30BlogsAuthorsObjIdGetRequest($obj_id, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsAuthorsObjIdGetAsync
     *
     * Retrieve BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsObjIdGetAsync($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdGet'][0])
    {
        return $this->v30BlogsAuthorsObjIdGetAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsAuthorsObjIdGetAsyncWithHttpInfo
     *
     * Retrieve BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsObjIdGetAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor';
        $request = $this->v30BlogsAuthorsObjIdGetRequest($obj_id, $contentType);

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
     * Create request for operation 'v30BlogsAuthorsObjIdGet'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsAuthorsObjIdGetRequest($obj_id, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdGet'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsAuthorsObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsAuthorsObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/authors/{obj_id}';
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
     * Operation v30BlogsAuthorsObjIdPut
     *
     * Update BlogAuthor
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthor
     */
    public function v30BlogsAuthorsObjIdPut($obj_id, $blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdPut'][0])
    {
        list($response) = $this->v30BlogsAuthorsObjIdPutWithHttpInfo($obj_id, $blog_author, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsAuthorsObjIdPutWithHttpInfo
     *
     * Update BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthor, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsAuthorsObjIdPutWithHttpInfo($obj_id, $blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdPut'][0])
    {
        $request = $this->v30BlogsAuthorsObjIdPutRequest($obj_id, $blog_author, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsAuthorsObjIdPutAsync
     *
     * Update BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsObjIdPutAsync($obj_id, $blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdPut'][0])
    {
        return $this->v30BlogsAuthorsObjIdPutAsyncWithHttpInfo($obj_id, $blog_author, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsAuthorsObjIdPutAsyncWithHttpInfo
     *
     * Update BlogAuthor
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsObjIdPutAsyncWithHttpInfo($obj_id, $blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdPut'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor';
        $request = $this->v30BlogsAuthorsObjIdPutRequest($obj_id, $blog_author, $contentType);

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
     * Create request for operation 'v30BlogsAuthorsObjIdPut'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsAuthorsObjIdPutRequest($obj_id, $blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsObjIdPut'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsAuthorsObjIdPut'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsAuthorsObjIdPut, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/authors/{obj_id}';
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
        if (isset($blog_author)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_author));
            } else {
                $httpBody = $blog_author;
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
     * Operation v30BlogsAuthorsPost
     *
     * Create BlogAuthor
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthor
     */
    public function v30BlogsAuthorsPost($blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsPost'][0])
    {
        list($response) = $this->v30BlogsAuthorsPostWithHttpInfo($blog_author, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsAuthorsPostWithHttpInfo
     *
     * Create BlogAuthor
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogAuthor, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsAuthorsPostWithHttpInfo($blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsPost'][0])
    {
        $request = $this->v30BlogsAuthorsPostRequest($blog_author, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsAuthorsPostAsync
     *
     * Create BlogAuthor
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsPostAsync($blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsPost'][0])
    {
        return $this->v30BlogsAuthorsPostAsyncWithHttpInfo($blog_author, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsAuthorsPostAsyncWithHttpInfo
     *
     * Create BlogAuthor
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsAuthorsPostAsyncWithHttpInfo($blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsPost'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogAuthor';
        $request = $this->v30BlogsAuthorsPostRequest($blog_author, $contentType);

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
     * Create request for operation 'v30BlogsAuthorsPost'
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogAuthor|null $blog_author (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsAuthorsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsAuthorsPostRequest($blog_author = null, string $contentType = self::contentTypes['v30BlogsAuthorsPost'][0])
    {



        $resourcePath = '/v30/blogs/authors';
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
        if (isset($blog_author)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_author));
            } else {
                $httpBody = $blog_author;
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
     * Operation v30BlogsCategoriesGet
     *
     * List Blog categories
     *
     * @param  int|null $page page (optional, default to 1)
     * @param  int|null $page_size page_size (optional, default to 25)
     * @param  string|null $order order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination
     */
    public function v30BlogsCategoriesGet($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsCategoriesGet'][0])
    {
        list($response) = $this->v30BlogsCategoriesGetWithHttpInfo($page, $page_size, $order, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsCategoriesGetWithHttpInfo
     *
     * List Blog categories
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsCategoriesGetWithHttpInfo($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsCategoriesGet'][0])
    {
        $request = $this->v30BlogsCategoriesGetRequest($page, $page_size, $order, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsCategoriesGetAsync
     *
     * List Blog categories
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesGetAsync($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsCategoriesGet'][0])
    {
        return $this->v30BlogsCategoriesGetAsyncWithHttpInfo($page, $page_size, $order, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsCategoriesGetAsyncWithHttpInfo
     *
     * List Blog categories
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesGetAsyncWithHttpInfo($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsCategoriesGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogCategoryPagination';
        $request = $this->v30BlogsCategoriesGetRequest($page, $page_size, $order, $contentType);

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
     * Create request for operation 'v30BlogsCategoriesGet'
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsCategoriesGetRequest($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsCategoriesGet'][0])
    {

        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling BlogsApi.v30BlogsCategoriesGet, must be bigger than or equal to 1.');
        }
        
        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsCategoriesGet, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsCategoriesGet, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v30/blogs/categories';
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
     * Operation v30BlogsCategoriesObjIdDelete
     *
     * Delete Blog category
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function v30BlogsCategoriesObjIdDelete($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdDelete'][0])
    {
        $this->v30BlogsCategoriesObjIdDeleteWithHttpInfo($obj_id, $contentType);
    }

    /**
     * Operation v30BlogsCategoriesObjIdDeleteWithHttpInfo
     *
     * Delete Blog category
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsCategoriesObjIdDeleteWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdDelete'][0])
    {
        $request = $this->v30BlogsCategoriesObjIdDeleteRequest($obj_id, $contentType);

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


            return [null, $statusCode, $response->getHeaders()];
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
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsCategoriesObjIdDeleteAsync
     *
     * Delete Blog category
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesObjIdDeleteAsync($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdDelete'][0])
    {
        return $this->v30BlogsCategoriesObjIdDeleteAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsCategoriesObjIdDeleteAsyncWithHttpInfo
     *
     * Delete Blog category
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesObjIdDeleteAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdDelete'][0])
    {
        $returnType = '';
        $request = $this->v30BlogsCategoriesObjIdDeleteRequest($obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'v30BlogsCategoriesObjIdDelete'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsCategoriesObjIdDeleteRequest($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdDelete'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsCategoriesObjIdDelete'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsCategoriesObjIdDelete, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/categories/{obj_id}';
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30BlogsCategoriesObjIdGet
     *
     * Retrieve Blog category
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategory
     */
    public function v30BlogsCategoriesObjIdGet($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdGet'][0])
    {
        list($response) = $this->v30BlogsCategoriesObjIdGetWithHttpInfo($obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsCategoriesObjIdGetWithHttpInfo
     *
     * Retrieve Blog category
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategory, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsCategoriesObjIdGetWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdGet'][0])
    {
        $request = $this->v30BlogsCategoriesObjIdGetRequest($obj_id, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsCategoriesObjIdGetAsync
     *
     * Retrieve Blog category
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesObjIdGetAsync($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdGet'][0])
    {
        return $this->v30BlogsCategoriesObjIdGetAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsCategoriesObjIdGetAsyncWithHttpInfo
     *
     * Retrieve Blog category
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesObjIdGetAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogCategory';
        $request = $this->v30BlogsCategoriesObjIdGetRequest($obj_id, $contentType);

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
     * Create request for operation 'v30BlogsCategoriesObjIdGet'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsCategoriesObjIdGetRequest($obj_id, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdGet'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsCategoriesObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsCategoriesObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/categories/{obj_id}';
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
     * Operation v30BlogsCategoriesObjIdPut
     *
     * Update Blog category
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategory
     */
    public function v30BlogsCategoriesObjIdPut($obj_id, $blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdPut'][0])
    {
        list($response) = $this->v30BlogsCategoriesObjIdPutWithHttpInfo($obj_id, $blog_category, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsCategoriesObjIdPutWithHttpInfo
     *
     * Update Blog category
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategory, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsCategoriesObjIdPutWithHttpInfo($obj_id, $blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdPut'][0])
    {
        $request = $this->v30BlogsCategoriesObjIdPutRequest($obj_id, $blog_category, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsCategoriesObjIdPutAsync
     *
     * Update Blog category
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesObjIdPutAsync($obj_id, $blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdPut'][0])
    {
        return $this->v30BlogsCategoriesObjIdPutAsyncWithHttpInfo($obj_id, $blog_category, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsCategoriesObjIdPutAsyncWithHttpInfo
     *
     * Update Blog category
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesObjIdPutAsyncWithHttpInfo($obj_id, $blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdPut'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogCategory';
        $request = $this->v30BlogsCategoriesObjIdPutRequest($obj_id, $blog_category, $contentType);

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
     * Create request for operation 'v30BlogsCategoriesObjIdPut'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsCategoriesObjIdPutRequest($obj_id, $blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesObjIdPut'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsCategoriesObjIdPut'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsCategoriesObjIdPut, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/categories/{obj_id}';
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
        if (isset($blog_category)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_category));
            } else {
                $httpBody = $blog_category;
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
     * Operation v30BlogsCategoriesPost
     *
     * Create Blog category
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategory
     */
    public function v30BlogsCategoriesPost($blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesPost'][0])
    {
        list($response) = $this->v30BlogsCategoriesPostWithHttpInfo($blog_category, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsCategoriesPostWithHttpInfo
     *
     * Create Blog category
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogCategory, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsCategoriesPostWithHttpInfo($blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesPost'][0])
    {
        $request = $this->v30BlogsCategoriesPostRequest($blog_category, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogCategory',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsCategoriesPostAsync
     *
     * Create Blog category
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesPostAsync($blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesPost'][0])
    {
        return $this->v30BlogsCategoriesPostAsyncWithHttpInfo($blog_category, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsCategoriesPostAsyncWithHttpInfo
     *
     * Create Blog category
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsCategoriesPostAsyncWithHttpInfo($blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesPost'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogCategory';
        $request = $this->v30BlogsCategoriesPostRequest($blog_category, $contentType);

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
     * Create request for operation 'v30BlogsCategoriesPost'
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogCategory|null $blog_category (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsCategoriesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsCategoriesPostRequest($blog_category = null, string $contentType = self::contentTypes['v30BlogsCategoriesPost'][0])
    {



        $resourcePath = '/v30/blogs/categories';
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
        if (isset($blog_category)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_category));
            } else {
                $httpBody = $blog_category;
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
     * Operation v30BlogsGet
     *
     * List Blogs
     *
     * @param  string|null $period_filter Filter period on &#x60;published_from&#x60; (optional)
     * @param  int[]|null $author_id Filter by Author (optional)
     * @param  int[]|null $issue_id Filter by Issue (optional)
     * @param  int[]|null $category_id Filter by Category (optional)
     * @param  int|null $published Filter on &#x60;published&#x60; (optional)
     * @param  string[]|null $visibility Filter by Visibility (optional)
     * @param  int|null $page page (optional, default to 1)
     * @param  int|null $page_size page_size (optional, default to 25)
     * @param  string|null $order order (optional, default to 'published_from:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogPagination
     */
    public function v30BlogsGet($period_filter = null, $author_id = null, $issue_id = null, $category_id = null, $published = null, $visibility = null, $page = 1, $page_size = 25, $order = 'published_from:desc', string $contentType = self::contentTypes['v30BlogsGet'][0])
    {
        list($response) = $this->v30BlogsGetWithHttpInfo($period_filter, $author_id, $issue_id, $category_id, $published, $visibility, $page, $page_size, $order, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsGetWithHttpInfo
     *
     * List Blogs
     *
     * @param  string|null $period_filter Filter period on &#x60;published_from&#x60; (optional)
     * @param  int[]|null $author_id Filter by Author (optional)
     * @param  int[]|null $issue_id Filter by Issue (optional)
     * @param  int[]|null $category_id Filter by Category (optional)
     * @param  int|null $published Filter on &#x60;published&#x60; (optional)
     * @param  string[]|null $visibility Filter by Visibility (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'published_from:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogPagination, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsGetWithHttpInfo($period_filter = null, $author_id = null, $issue_id = null, $category_id = null, $published = null, $visibility = null, $page = 1, $page_size = 25, $order = 'published_from:desc', string $contentType = self::contentTypes['v30BlogsGet'][0])
    {
        $request = $this->v30BlogsGetRequest($period_filter, $author_id, $issue_id, $category_id, $published, $visibility, $page, $page_size, $order, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogPagination',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogPagination',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogPagination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsGetAsync
     *
     * List Blogs
     *
     * @param  string|null $period_filter Filter period on &#x60;published_from&#x60; (optional)
     * @param  int[]|null $author_id Filter by Author (optional)
     * @param  int[]|null $issue_id Filter by Issue (optional)
     * @param  int[]|null $category_id Filter by Category (optional)
     * @param  int|null $published Filter on &#x60;published&#x60; (optional)
     * @param  string[]|null $visibility Filter by Visibility (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'published_from:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsGetAsync($period_filter = null, $author_id = null, $issue_id = null, $category_id = null, $published = null, $visibility = null, $page = 1, $page_size = 25, $order = 'published_from:desc', string $contentType = self::contentTypes['v30BlogsGet'][0])
    {
        return $this->v30BlogsGetAsyncWithHttpInfo($period_filter, $author_id, $issue_id, $category_id, $published, $visibility, $page, $page_size, $order, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsGetAsyncWithHttpInfo
     *
     * List Blogs
     *
     * @param  string|null $period_filter Filter period on &#x60;published_from&#x60; (optional)
     * @param  int[]|null $author_id Filter by Author (optional)
     * @param  int[]|null $issue_id Filter by Issue (optional)
     * @param  int[]|null $category_id Filter by Category (optional)
     * @param  int|null $published Filter on &#x60;published&#x60; (optional)
     * @param  string[]|null $visibility Filter by Visibility (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'published_from:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsGetAsyncWithHttpInfo($period_filter = null, $author_id = null, $issue_id = null, $category_id = null, $published = null, $visibility = null, $page = 1, $page_size = 25, $order = 'published_from:desc', string $contentType = self::contentTypes['v30BlogsGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogPagination';
        $request = $this->v30BlogsGetRequest($period_filter, $author_id, $issue_id, $category_id, $published, $visibility, $page, $page_size, $order, $contentType);

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
     * Create request for operation 'v30BlogsGet'
     *
     * @param  string|null $period_filter Filter period on &#x60;published_from&#x60; (optional)
     * @param  int[]|null $author_id Filter by Author (optional)
     * @param  int[]|null $issue_id Filter by Issue (optional)
     * @param  int[]|null $category_id Filter by Category (optional)
     * @param  int|null $published Filter on &#x60;published&#x60; (optional)
     * @param  string[]|null $visibility Filter by Visibility (optional)
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional, default to 'published_from:desc')
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsGetRequest($period_filter = null, $author_id = null, $issue_id = null, $category_id = null, $published = null, $visibility = null, $page = 1, $page_size = 25, $order = 'published_from:desc', string $contentType = self::contentTypes['v30BlogsGet'][0])
    {







        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling BlogsApi.v30BlogsGet, must be bigger than or equal to 1.');
        }
        
        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsGet, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsGet, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v30/blogs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $period_filter,
            'period_filter', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $author_id,
            'author_id', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $issue_id,
            'issue_id', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $category_id,
            'category_id', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $published,
            'published', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $visibility,
            'visibility', // param base name
            'array', // openApiType
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
     * Operation v30BlogsIssuesGet
     *
     * List Blog issues
     *
     * @param  int|null $page page (optional, default to 1)
     * @param  int|null $page_size page_size (optional, default to 25)
     * @param  string|null $order order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination
     */
    public function v30BlogsIssuesGet($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsIssuesGet'][0])
    {
        list($response) = $this->v30BlogsIssuesGetWithHttpInfo($page, $page_size, $order, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsIssuesGetWithHttpInfo
     *
     * List Blog issues
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsIssuesGetWithHttpInfo($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsIssuesGet'][0])
    {
        $request = $this->v30BlogsIssuesGetRequest($page, $page_size, $order, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsIssuesGetAsync
     *
     * List Blog issues
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesGetAsync($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsIssuesGet'][0])
    {
        return $this->v30BlogsIssuesGetAsyncWithHttpInfo($page, $page_size, $order, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsIssuesGetAsyncWithHttpInfo
     *
     * List Blog issues
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesGetAsyncWithHttpInfo($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsIssuesGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogIssuePagination';
        $request = $this->v30BlogsIssuesGetRequest($page, $page_size, $order, $contentType);

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
     * Create request for operation 'v30BlogsIssuesGet'
     *
     * @param  int|null $page (optional, default to 1)
     * @param  int|null $page_size (optional, default to 25)
     * @param  string|null $order (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsIssuesGetRequest($page = 1, $page_size = 25, $order = null, string $contentType = self::contentTypes['v30BlogsIssuesGet'][0])
    {

        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling BlogsApi.v30BlogsIssuesGet, must be bigger than or equal to 1.');
        }
        
        if ($page_size !== null && $page_size > 100) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsIssuesGet, must be smaller than or equal to 100.');
        }
        if ($page_size !== null && $page_size < 1) {
            throw new \InvalidArgumentException('invalid value for "$page_size" when calling BlogsApi.v30BlogsIssuesGet, must be bigger than or equal to 1.');
        }
        


        $resourcePath = '/v30/blogs/issues';
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
     * Operation v30BlogsIssuesObjIdDelete
     *
     * Delete BlogIssue
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function v30BlogsIssuesObjIdDelete($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdDelete'][0])
    {
        $this->v30BlogsIssuesObjIdDeleteWithHttpInfo($obj_id, $contentType);
    }

    /**
     * Operation v30BlogsIssuesObjIdDeleteWithHttpInfo
     *
     * Delete BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsIssuesObjIdDeleteWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdDelete'][0])
    {
        $request = $this->v30BlogsIssuesObjIdDeleteRequest($obj_id, $contentType);

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


            return [null, $statusCode, $response->getHeaders()];
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
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsIssuesObjIdDeleteAsync
     *
     * Delete BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesObjIdDeleteAsync($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdDelete'][0])
    {
        return $this->v30BlogsIssuesObjIdDeleteAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsIssuesObjIdDeleteAsyncWithHttpInfo
     *
     * Delete BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesObjIdDeleteAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdDelete'][0])
    {
        $returnType = '';
        $request = $this->v30BlogsIssuesObjIdDeleteRequest($obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'v30BlogsIssuesObjIdDelete'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsIssuesObjIdDeleteRequest($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdDelete'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsIssuesObjIdDelete'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsIssuesObjIdDelete, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/issues/{obj_id}';
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30BlogsIssuesObjIdGet
     *
     * Retrieve BlogIssue
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssue
     */
    public function v30BlogsIssuesObjIdGet($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdGet'][0])
    {
        list($response) = $this->v30BlogsIssuesObjIdGetWithHttpInfo($obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsIssuesObjIdGetWithHttpInfo
     *
     * Retrieve BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssue, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsIssuesObjIdGetWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdGet'][0])
    {
        $request = $this->v30BlogsIssuesObjIdGetRequest($obj_id, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsIssuesObjIdGetAsync
     *
     * Retrieve BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesObjIdGetAsync($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdGet'][0])
    {
        return $this->v30BlogsIssuesObjIdGetAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsIssuesObjIdGetAsyncWithHttpInfo
     *
     * Retrieve BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesObjIdGetAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogIssue';
        $request = $this->v30BlogsIssuesObjIdGetRequest($obj_id, $contentType);

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
     * Create request for operation 'v30BlogsIssuesObjIdGet'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsIssuesObjIdGetRequest($obj_id, string $contentType = self::contentTypes['v30BlogsIssuesObjIdGet'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsIssuesObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsIssuesObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/issues/{obj_id}';
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
     * Operation v30BlogsIssuesObjIdPut
     *
     * Update BlogIssue
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssue
     */
    public function v30BlogsIssuesObjIdPut($obj_id, $blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesObjIdPut'][0])
    {
        list($response) = $this->v30BlogsIssuesObjIdPutWithHttpInfo($obj_id, $blog_issue, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsIssuesObjIdPutWithHttpInfo
     *
     * Update BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssue, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsIssuesObjIdPutWithHttpInfo($obj_id, $blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesObjIdPut'][0])
    {
        $request = $this->v30BlogsIssuesObjIdPutRequest($obj_id, $blog_issue, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsIssuesObjIdPutAsync
     *
     * Update BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesObjIdPutAsync($obj_id, $blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesObjIdPut'][0])
    {
        return $this->v30BlogsIssuesObjIdPutAsyncWithHttpInfo($obj_id, $blog_issue, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsIssuesObjIdPutAsyncWithHttpInfo
     *
     * Update BlogIssue
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesObjIdPutAsyncWithHttpInfo($obj_id, $blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesObjIdPut'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogIssue';
        $request = $this->v30BlogsIssuesObjIdPutRequest($obj_id, $blog_issue, $contentType);

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
     * Create request for operation 'v30BlogsIssuesObjIdPut'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsIssuesObjIdPutRequest($obj_id, $blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesObjIdPut'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsIssuesObjIdPut'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsIssuesObjIdPut, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/issues/{obj_id}';
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
        if (isset($blog_issue)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_issue));
            } else {
                $httpBody = $blog_issue;
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
     * Operation v30BlogsIssuesPost
     *
     * Create BlogIssue
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssue
     */
    public function v30BlogsIssuesPost($blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesPost'][0])
    {
        list($response) = $this->v30BlogsIssuesPostWithHttpInfo($blog_issue, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsIssuesPostWithHttpInfo
     *
     * Create BlogIssue
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogIssue, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsIssuesPostWithHttpInfo($blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesPost'][0])
    {
        $request = $this->v30BlogsIssuesPostRequest($blog_issue, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogIssue',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsIssuesPostAsync
     *
     * Create BlogIssue
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesPostAsync($blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesPost'][0])
    {
        return $this->v30BlogsIssuesPostAsyncWithHttpInfo($blog_issue, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsIssuesPostAsyncWithHttpInfo
     *
     * Create BlogIssue
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsIssuesPostAsyncWithHttpInfo($blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesPost'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogIssue';
        $request = $this->v30BlogsIssuesPostRequest($blog_issue, $contentType);

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
     * Create request for operation 'v30BlogsIssuesPost'
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogIssue|null $blog_issue (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsIssuesPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsIssuesPostRequest($blog_issue = null, string $contentType = self::contentTypes['v30BlogsIssuesPost'][0])
    {



        $resourcePath = '/v30/blogs/issues';
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
        if (isset($blog_issue)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_issue));
            } else {
                $httpBody = $blog_issue;
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
     * Operation v30BlogsObjIdDelete
     *
     * Delete Blog
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function v30BlogsObjIdDelete($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdDelete'][0])
    {
        $this->v30BlogsObjIdDeleteWithHttpInfo($obj_id, $contentType);
    }

    /**
     * Operation v30BlogsObjIdDeleteWithHttpInfo
     *
     * Delete Blog
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsObjIdDeleteWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdDelete'][0])
    {
        $request = $this->v30BlogsObjIdDeleteRequest($obj_id, $contentType);

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


            return [null, $statusCode, $response->getHeaders()];
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
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsObjIdDeleteAsync
     *
     * Delete Blog
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdDeleteAsync($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdDelete'][0])
    {
        return $this->v30BlogsObjIdDeleteAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsObjIdDeleteAsyncWithHttpInfo
     *
     * Delete Blog
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdDeleteAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdDelete'][0])
    {
        $returnType = '';
        $request = $this->v30BlogsObjIdDeleteRequest($obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'v30BlogsObjIdDelete'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsObjIdDeleteRequest($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdDelete'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsObjIdDelete'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsObjIdDelete, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/{obj_id}';
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30BlogsObjIdGet
     *
     * Retrieve Blog
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph
     */
    public function v30BlogsObjIdGet($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdGet'][0])
    {
        list($response) = $this->v30BlogsObjIdGetWithHttpInfo($obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsObjIdGetWithHttpInfo
     *
     * Retrieve Blog
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsObjIdGetWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdGet'][0])
    {
        $request = $this->v30BlogsObjIdGetRequest($obj_id, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsObjIdGetAsync
     *
     * Retrieve Blog
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdGetAsync($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdGet'][0])
    {
        return $this->v30BlogsObjIdGetAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsObjIdGetAsyncWithHttpInfo
     *
     * Retrieve Blog
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdGetAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph';
        $request = $this->v30BlogsObjIdGetRequest($obj_id, $contentType);

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
     * Create request for operation 'v30BlogsObjIdGet'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsObjIdGetRequest($obj_id, string $contentType = self::contentTypes['v30BlogsObjIdGet'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/{obj_id}';
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
     * Operation v30BlogsObjIdParagraphsImagePost
     *
     * Create BlogImageParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsImagePost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph
     */
    public function v30BlogsObjIdParagraphsImagePost($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsImagePost'][0])
    {
        list($response) = $this->v30BlogsObjIdParagraphsImagePostWithHttpInfo($obj_id, $blog_image_paragraph, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsObjIdParagraphsImagePostWithHttpInfo
     *
     * Create BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsImagePost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsObjIdParagraphsImagePostWithHttpInfo($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsImagePost'][0])
    {
        $request = $this->v30BlogsObjIdParagraphsImagePostRequest($obj_id, $blog_image_paragraph, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsObjIdParagraphsImagePostAsync
     *
     * Create BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsImagePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdParagraphsImagePostAsync($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsImagePost'][0])
    {
        return $this->v30BlogsObjIdParagraphsImagePostAsyncWithHttpInfo($obj_id, $blog_image_paragraph, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsObjIdParagraphsImagePostAsyncWithHttpInfo
     *
     * Create BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsImagePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdParagraphsImagePostAsyncWithHttpInfo($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsImagePost'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph';
        $request = $this->v30BlogsObjIdParagraphsImagePostRequest($obj_id, $blog_image_paragraph, $contentType);

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
     * Create request for operation 'v30BlogsObjIdParagraphsImagePost'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsImagePost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsObjIdParagraphsImagePostRequest($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsImagePost'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsObjIdParagraphsImagePost'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsObjIdParagraphsImagePost, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/{obj_id}/paragraphs/image';
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
        if (isset($blog_image_paragraph)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_image_paragraph));
            } else {
                $httpBody = $blog_image_paragraph;
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
     * Operation v30BlogsObjIdParagraphsTextPost
     *
     * Create BlogTextParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsTextPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph
     */
    public function v30BlogsObjIdParagraphsTextPost($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsTextPost'][0])
    {
        list($response) = $this->v30BlogsObjIdParagraphsTextPostWithHttpInfo($obj_id, $blog_text_paragraph, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsObjIdParagraphsTextPostWithHttpInfo
     *
     * Create BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsTextPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsObjIdParagraphsTextPostWithHttpInfo($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsTextPost'][0])
    {
        $request = $this->v30BlogsObjIdParagraphsTextPostRequest($obj_id, $blog_text_paragraph, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsObjIdParagraphsTextPostAsync
     *
     * Create BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsTextPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdParagraphsTextPostAsync($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsTextPost'][0])
    {
        return $this->v30BlogsObjIdParagraphsTextPostAsyncWithHttpInfo($obj_id, $blog_text_paragraph, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsObjIdParagraphsTextPostAsyncWithHttpInfo
     *
     * Create BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsTextPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdParagraphsTextPostAsyncWithHttpInfo($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsTextPost'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph';
        $request = $this->v30BlogsObjIdParagraphsTextPostRequest($obj_id, $blog_text_paragraph, $contentType);

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
     * Create request for operation 'v30BlogsObjIdParagraphsTextPost'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdParagraphsTextPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsObjIdParagraphsTextPostRequest($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdParagraphsTextPost'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsObjIdParagraphsTextPost'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsObjIdParagraphsTextPost, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/{obj_id}/paragraphs/text';
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
        if (isset($blog_text_paragraph)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_text_paragraph));
            } else {
                $httpBody = $blog_text_paragraph;
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
     * Operation v30BlogsObjIdPut
     *
     * Update Blog
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph|null $blog_with_paragraph blog_with_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph
     */
    public function v30BlogsObjIdPut($obj_id, $blog_with_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdPut'][0])
    {
        list($response) = $this->v30BlogsObjIdPutWithHttpInfo($obj_id, $blog_with_paragraph, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsObjIdPutWithHttpInfo
     *
     * Update Blog
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph|null $blog_with_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsObjIdPutWithHttpInfo($obj_id, $blog_with_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdPut'][0])
    {
        $request = $this->v30BlogsObjIdPutRequest($obj_id, $blog_with_paragraph, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsObjIdPutAsync
     *
     * Update Blog
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph|null $blog_with_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdPutAsync($obj_id, $blog_with_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdPut'][0])
    {
        return $this->v30BlogsObjIdPutAsyncWithHttpInfo($obj_id, $blog_with_paragraph, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsObjIdPutAsyncWithHttpInfo
     *
     * Update Blog
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph|null $blog_with_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsObjIdPutAsyncWithHttpInfo($obj_id, $blog_with_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdPut'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph';
        $request = $this->v30BlogsObjIdPutRequest($obj_id, $blog_with_paragraph, $contentType);

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
     * Create request for operation 'v30BlogsObjIdPut'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogWithParagraph|null $blog_with_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsObjIdPutRequest($obj_id, $blog_with_paragraph = null, string $contentType = self::contentTypes['v30BlogsObjIdPut'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsObjIdPut'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsObjIdPut, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/{obj_id}';
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
        if (isset($blog_with_paragraph)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_with_paragraph));
            } else {
                $httpBody = $blog_with_paragraph;
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
     * Operation v30BlogsParagraphsImageObjIdDelete
     *
     * Delete BlogImageParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function v30BlogsParagraphsImageObjIdDelete($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdDelete'][0])
    {
        $this->v30BlogsParagraphsImageObjIdDeleteWithHttpInfo($obj_id, $contentType);
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdDeleteWithHttpInfo
     *
     * Delete BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsParagraphsImageObjIdDeleteWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdDelete'][0])
    {
        $request = $this->v30BlogsParagraphsImageObjIdDeleteRequest($obj_id, $contentType);

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


            return [null, $statusCode, $response->getHeaders()];
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
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdDeleteAsync
     *
     * Delete BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsImageObjIdDeleteAsync($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdDelete'][0])
    {
        return $this->v30BlogsParagraphsImageObjIdDeleteAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdDeleteAsyncWithHttpInfo
     *
     * Delete BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsImageObjIdDeleteAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdDelete'][0])
    {
        $returnType = '';
        $request = $this->v30BlogsParagraphsImageObjIdDeleteRequest($obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'v30BlogsParagraphsImageObjIdDelete'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsParagraphsImageObjIdDeleteRequest($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdDelete'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsParagraphsImageObjIdDelete'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsParagraphsImageObjIdDelete, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/paragraphs/image/{obj_id}';
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdGet
     *
     * Retrieve BlogImageParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph
     */
    public function v30BlogsParagraphsImageObjIdGet($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdGet'][0])
    {
        list($response) = $this->v30BlogsParagraphsImageObjIdGetWithHttpInfo($obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdGetWithHttpInfo
     *
     * Retrieve BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsParagraphsImageObjIdGetWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdGet'][0])
    {
        $request = $this->v30BlogsParagraphsImageObjIdGetRequest($obj_id, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdGetAsync
     *
     * Retrieve BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsImageObjIdGetAsync($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdGet'][0])
    {
        return $this->v30BlogsParagraphsImageObjIdGetAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdGetAsyncWithHttpInfo
     *
     * Retrieve BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsImageObjIdGetAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph';
        $request = $this->v30BlogsParagraphsImageObjIdGetRequest($obj_id, $contentType);

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
     * Create request for operation 'v30BlogsParagraphsImageObjIdGet'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsParagraphsImageObjIdGetRequest($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdGet'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsParagraphsImageObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsParagraphsImageObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/paragraphs/image/{obj_id}';
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
     * Operation v30BlogsParagraphsImageObjIdPut
     *
     * Update BlogImageParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph
     */
    public function v30BlogsParagraphsImageObjIdPut($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdPut'][0])
    {
        list($response) = $this->v30BlogsParagraphsImageObjIdPutWithHttpInfo($obj_id, $blog_image_paragraph, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdPutWithHttpInfo
     *
     * Update BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsParagraphsImageObjIdPutWithHttpInfo($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdPut'][0])
    {
        $request = $this->v30BlogsParagraphsImageObjIdPutRequest($obj_id, $blog_image_paragraph, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdPutAsync
     *
     * Update BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsImageObjIdPutAsync($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdPut'][0])
    {
        return $this->v30BlogsParagraphsImageObjIdPutAsyncWithHttpInfo($obj_id, $blog_image_paragraph, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsParagraphsImageObjIdPutAsyncWithHttpInfo
     *
     * Update BlogImageParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsImageObjIdPutAsyncWithHttpInfo($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdPut'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph';
        $request = $this->v30BlogsParagraphsImageObjIdPutRequest($obj_id, $blog_image_paragraph, $contentType);

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
     * Create request for operation 'v30BlogsParagraphsImageObjIdPut'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogImageParagraph|null $blog_image_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsImageObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsParagraphsImageObjIdPutRequest($obj_id, $blog_image_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsImageObjIdPut'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsParagraphsImageObjIdPut'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsParagraphsImageObjIdPut, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/paragraphs/image/{obj_id}';
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
        if (isset($blog_image_paragraph)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_image_paragraph));
            } else {
                $httpBody = $blog_image_paragraph;
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
     * Operation v30BlogsParagraphsTextObjIdDelete
     *
     * Delete BlogTextParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function v30BlogsParagraphsTextObjIdDelete($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdDelete'][0])
    {
        $this->v30BlogsParagraphsTextObjIdDeleteWithHttpInfo($obj_id, $contentType);
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdDeleteWithHttpInfo
     *
     * Delete BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdDelete'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsParagraphsTextObjIdDeleteWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdDelete'][0])
    {
        $request = $this->v30BlogsParagraphsTextObjIdDeleteRequest($obj_id, $contentType);

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


            return [null, $statusCode, $response->getHeaders()];
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
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdDeleteAsync
     *
     * Delete BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsTextObjIdDeleteAsync($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdDelete'][0])
    {
        return $this->v30BlogsParagraphsTextObjIdDeleteAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdDeleteAsyncWithHttpInfo
     *
     * Delete BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsTextObjIdDeleteAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdDelete'][0])
    {
        $returnType = '';
        $request = $this->v30BlogsParagraphsTextObjIdDeleteRequest($obj_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'v30BlogsParagraphsTextObjIdDelete'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsParagraphsTextObjIdDeleteRequest($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdDelete'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsParagraphsTextObjIdDelete'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsParagraphsTextObjIdDelete, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/paragraphs/text/{obj_id}';
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdGet
     *
     * Retrieve BlogTextParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph
     */
    public function v30BlogsParagraphsTextObjIdGet($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdGet'][0])
    {
        list($response) = $this->v30BlogsParagraphsTextObjIdGetWithHttpInfo($obj_id, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdGetWithHttpInfo
     *
     * Retrieve BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdGet'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsParagraphsTextObjIdGetWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdGet'][0])
    {
        $request = $this->v30BlogsParagraphsTextObjIdGetRequest($obj_id, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdGetAsync
     *
     * Retrieve BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsTextObjIdGetAsync($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdGet'][0])
    {
        return $this->v30BlogsParagraphsTextObjIdGetAsyncWithHttpInfo($obj_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdGetAsyncWithHttpInfo
     *
     * Retrieve BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsTextObjIdGetAsyncWithHttpInfo($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdGet'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph';
        $request = $this->v30BlogsParagraphsTextObjIdGetRequest($obj_id, $contentType);

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
     * Create request for operation 'v30BlogsParagraphsTextObjIdGet'
     *
     * @param  int $obj_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsParagraphsTextObjIdGetRequest($obj_id, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdGet'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsParagraphsTextObjIdGet'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsParagraphsTextObjIdGet, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/v30/blogs/paragraphs/text/{obj_id}';
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
     * Operation v30BlogsParagraphsTextObjIdPut
     *
     * Update BlogTextParagraph
     *
     * @param  int $obj_id obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph
     */
    public function v30BlogsParagraphsTextObjIdPut($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdPut'][0])
    {
        list($response) = $this->v30BlogsParagraphsTextObjIdPutWithHttpInfo($obj_id, $blog_text_paragraph, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdPutWithHttpInfo
     *
     * Update BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdPut'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsParagraphsTextObjIdPutWithHttpInfo($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdPut'][0])
    {
        $request = $this->v30BlogsParagraphsTextObjIdPutRequest($obj_id, $blog_text_paragraph, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
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
                '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
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
                        '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdPutAsync
     *
     * Update BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsTextObjIdPutAsync($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdPut'][0])
    {
        return $this->v30BlogsParagraphsTextObjIdPutAsyncWithHttpInfo($obj_id, $blog_text_paragraph, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsParagraphsTextObjIdPutAsyncWithHttpInfo
     *
     * Update BlogTextParagraph
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsParagraphsTextObjIdPutAsyncWithHttpInfo($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdPut'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph';
        $request = $this->v30BlogsParagraphsTextObjIdPutRequest($obj_id, $blog_text_paragraph, $contentType);

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
     * Create request for operation 'v30BlogsParagraphsTextObjIdPut'
     *
     * @param  int $obj_id (required)
     * @param  \NathanEmanuel\Congressus\Rest\Model\BlogTextParagraph|null $blog_text_paragraph (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsParagraphsTextObjIdPut'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsParagraphsTextObjIdPutRequest($obj_id, $blog_text_paragraph = null, string $contentType = self::contentTypes['v30BlogsParagraphsTextObjIdPut'][0])
    {

        // verify the required parameter 'obj_id' is set
        if ($obj_id === null || (is_array($obj_id) && count($obj_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $obj_id when calling v30BlogsParagraphsTextObjIdPut'
            );
        }
        if ($obj_id < 0) {
            throw new \InvalidArgumentException('invalid value for "$obj_id" when calling BlogsApi.v30BlogsParagraphsTextObjIdPut, must be bigger than or equal to 0.');
        }
        


        $resourcePath = '/v30/blogs/paragraphs/text/{obj_id}';
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
        if (isset($blog_text_paragraph)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog_text_paragraph));
            } else {
                $httpBody = $blog_text_paragraph;
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
     * Operation v30BlogsPost
     *
     * Create Blog
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\Blog|null $blog blog (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Blog
     */
    public function v30BlogsPost($blog = null, string $contentType = self::contentTypes['v30BlogsPost'][0])
    {
        list($response) = $this->v30BlogsPostWithHttpInfo($blog, $contentType);
        return $response;
    }

    /**
     * Operation v30BlogsPostWithHttpInfo
     *
     * Create Blog
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\Blog|null $blog (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsPost'] to see the possible values for this operation
     *
     * @throws \NathanEmanuel\Congressus\Rest\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Error|\NathanEmanuel\Congressus\Rest\Model\Blog, HTTP status code, HTTP response headers (array of strings)
     */
    public function v30BlogsPostWithHttpInfo($blog = null, string $contentType = self::contentTypes['v30BlogsPost'][0])
    {
        $request = $this->v30BlogsPostRequest($blog, $contentType);

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
                        '\NathanEmanuel\Congressus\Rest\Model\Blog',
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
                '\NathanEmanuel\Congressus\Rest\Model\Blog',
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
                        '\NathanEmanuel\Congressus\Rest\Model\Blog',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation v30BlogsPostAsync
     *
     * Create Blog
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\Blog|null $blog (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsPostAsync($blog = null, string $contentType = self::contentTypes['v30BlogsPost'][0])
    {
        return $this->v30BlogsPostAsyncWithHttpInfo($blog, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation v30BlogsPostAsyncWithHttpInfo
     *
     * Create Blog
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\Blog|null $blog (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function v30BlogsPostAsyncWithHttpInfo($blog = null, string $contentType = self::contentTypes['v30BlogsPost'][0])
    {
        $returnType = '\NathanEmanuel\Congressus\Rest\Model\Blog';
        $request = $this->v30BlogsPostRequest($blog, $contentType);

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
     * Create request for operation 'v30BlogsPost'
     *
     * @param  \NathanEmanuel\Congressus\Rest\Model\Blog|null $blog (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['v30BlogsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function v30BlogsPostRequest($blog = null, string $contentType = self::contentTypes['v30BlogsPost'][0])
    {



        $resourcePath = '/v30/blogs';
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
        if (isset($blog)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($blog));
            } else {
                $httpBody = $blog;
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
