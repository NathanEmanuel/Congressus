<?php

namespace NathanEmanuel\Congressus\Rest;

use NathanEmanuel\Congressus\Rest\Api;
use NathanEmanuel\Congressus\Rest\Model;

readonly class RestClient
{
    private const DEFAULT_PAGE_SIZE = 25;

    public function __construct(string $token)
    {
        Configuration::getDefaultConfiguration()->setAccessToken($token);
    }

    private static function isRequestingAllowed($page, ?int $limit): bool
    {
        if (is_null($page)) {
            return true;
        }

        if (!$page->getHasNext()) {
            return false;
        }

        if (is_null($limit)) {
            return true;
        }

        if (($page->getPrevNum() + 1) * self::DEFAULT_PAGE_SIZE >= $limit) {
            return false;
        }

        return true;
    }

    private function depaginate(callable $apiMethod, int $limit, ...$args)
    {
        $pageNumber = 1;
        $page = null;
        $result = array();
        while (self::isRequestingAllowed($page, $limit)) {
            $args['page'] = $pageNumber;
            $page = $apiMethod(...$args);
            $result = array_merge($result, $page->getData());
            $pageNumber++;
        }
        return array_slice($result, 0, $limit);
    }


    /**
     * @generated
     * @param string[] $state Filter by State
     * @param string $created Filter period on `created`
     * @param string $modified Filter period on `modified`
     * @param string $order 
     * @return Model\BackgroundProcess[]
     * @throws ApiException
     */
    public function listBackgroundProcesses(int $limit, ?array $state = null, ?string $created = null, ?string $modified = null, ?string $order = null): array
    {
        $api = new Api\BackgroundProcessesApi;
        $callback = [$api, 'v30BackgroundProcessesGet'];
        return $this->depaginate($callback, $limit, $state, $created, $modified, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BackgroundProcess
     * @throws ApiException
     */
    public function retrieveBackgroundProcess(int $obj_id): Model\BackgroundProcess
    {
        $api = new Api\BackgroundProcessesApi;
        return $api->v30BackgroundProcessesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param string $obj_id 
     * @return Model\BackgroundProcessResult
     * @throws ApiException
     */
    public function retrieveBackgroundProcessResult(string $obj_id): Model\BackgroundProcessResult
    {
        $api = new Api\BackgroundProcessesApi;
        return $api->v30BackgroundProcessesResultsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param string $period_filter Filter period on `mutation_date`
     * @param string $status Filter on `status`
     * @param string $mutation_type Filter on `mutation_type`
     * @param string[] $bank_import_id Filter by Bank import
     * @param string[] $bank_statement_id Filter by Bank statement
     * @param string[] $bank_mutation_id Filter by Bank mutation
     * @param string $order 
     * @return Model\BankMutation[]
     * @throws ApiException
     */
    public function listBankMutations(int $limit, ?string $period_filter = null, ?string $status = null, ?string $mutation_type = null, ?array $bank_import_id = null, ?array $bank_statement_id = null, ?array $bank_mutation_id = null, ?string $order = null): array
    {
        $api = new Api\BankMutationsApi;
        $callback = [$api, 'v30BankGet'];
        return $this->depaginate($callback, $limit, $period_filter, $status, $mutation_type, $bank_import_id, $bank_statement_id, $bank_mutation_id, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BankMutation
     * @throws ApiException
     */
    public function retrieveBankMutation(int $obj_id): Model\BankMutation
    {
        $api = new Api\BankMutationsApi;
        return $api->v30BankObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteBankMutation(int $obj_id): null
    {
        $api = new Api\BankMutationsApi;
        return $api->v30BankObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function matchMutationWithASaleInvoice(int $obj_id, Model\SaleInvoiceBankMutationMatch $obj): null
    {
        $api = new Api\BankMutationsApi;
        return $api->v30BankObjIdMatchPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function removeMatchWithASaleInvoice(int $obj_id, Model\SaleInvoiceBankMutationMatch $obj): null
    {
        $api = new Api\BankMutationsApi;
        return $api->v30BankObjIdUnmatchPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\BlogAuthor[]
     * @throws ApiException
     */
    public function listBlogAuthors(int $limit, ?string $order = null): array
    {
        $api = new Api\BlogsApi;
        $callback = [$api, 'v30BlogsAuthorsGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\BlogAuthor
     * @throws ApiException
     */
    public function createBlogAuthor(Model\BlogAuthor $obj): Model\BlogAuthor
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsAuthorsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogAuthor
     * @throws ApiException
     */
    public function retrieveBlogAuthor(int $obj_id): Model\BlogAuthor
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsAuthorsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogAuthor
     * @throws ApiException
     */
    public function updateBlogAuthor(int $obj_id, Model\BlogAuthor $obj): Model\BlogAuthor
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsAuthorsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteBlogAuthor(int $obj_id): null
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsAuthorsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $period_filter Filter period on `published_from`
     * @param int[] $author_id Filter by Author
     * @param int[] $issue_id Filter by Issue
     * @param int[] $category_id Filter by Category
     * @param int $published Filter on `published`
     * @param string[] $visibility Filter by Visibility
     * @param string $order 
     * @return Model\Blog[]
     * @throws ApiException
     */
    public function listBlogs(int $limit, ?string $period_filter = null, ?array $author_id = null, ?array $issue_id = null, ?array $category_id = null, ?int $published = null, ?array $visibility = null, ?string $order = null): array
    {
        $api = new Api\BlogsApi;
        $callback = [$api, 'v30BlogsGet'];
        return $this->depaginate($callback, $limit, $period_filter, $author_id, $issue_id, $category_id, $published, $visibility, $order);
    }

    /**
     * @generated
    
     * @return Model\Blog
     * @throws ApiException
     */
    public function createBlog(Model\Blog $obj): Model\Blog
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogWithParagraph
     * @throws ApiException
     */
    public function retrieveBlog(int $obj_id): Model\BlogWithParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogWithParagraph
     * @throws ApiException
     */
    public function updateBlog(int $obj_id, Model\BlogWithParagraph $obj): Model\BlogWithParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteBlog(int $obj_id): null
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogTextParagraph
     * @throws ApiException
     */
    public function createBlogTextParagraph(int $obj_id, Model\BlogTextParagraph $obj): Model\BlogTextParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsObjIdParagraphsTextPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogImageParagraph
     * @throws ApiException
     */
    public function createBlogImageParagraph(int $obj_id, Model\BlogImageParagraph $obj): Model\BlogImageParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsObjIdParagraphsImagePost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogTextParagraph
     * @throws ApiException
     */
    public function retrieveBlogTextParagraph(int $obj_id): Model\BlogTextParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsParagraphsTextObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogTextParagraph
     * @throws ApiException
     */
    public function updateBlogTextParagraph(int $obj_id, Model\BlogTextParagraph $obj): Model\BlogTextParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsParagraphsTextObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteBlogTextParagraph(int $obj_id): null
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsParagraphsTextObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogImageParagraph
     * @throws ApiException
     */
    public function retrieveBlogImageParagraph(int $obj_id): Model\BlogImageParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsParagraphsImageObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogImageParagraph
     * @throws ApiException
     */
    public function updateBlogImageParagraph(int $obj_id, Model\BlogImageParagraph $obj): Model\BlogImageParagraph
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsParagraphsImageObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteBlogImageParagraph(int $obj_id): null
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsParagraphsImageObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\BlogCategory[]
     * @throws ApiException
     */
    public function listBlogCategories(int $limit, ?string $order = null): array
    {
        $api = new Api\BlogsApi;
        $callback = [$api, 'v30BlogsCategoriesGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\BlogCategory
     * @throws ApiException
     */
    public function createBlogCategory(Model\BlogCategory $obj): Model\BlogCategory
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsCategoriesPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogCategory
     * @throws ApiException
     */
    public function retrieveBlogCategory(int $obj_id): Model\BlogCategory
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsCategoriesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogCategory
     * @throws ApiException
     */
    public function updateBlogCategory(int $obj_id, Model\BlogCategory $obj): Model\BlogCategory
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsCategoriesObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteBlogCategory(int $obj_id): null
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsCategoriesObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\BlogIssue[]
     * @throws ApiException
     */
    public function listBlogIssues(int $limit, ?string $order = null): array
    {
        $api = new Api\BlogsApi;
        $callback = [$api, 'v30BlogsIssuesGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\BlogIssue
     * @throws ApiException
     */
    public function createBlogIssue(Model\BlogIssue $obj): Model\BlogIssue
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsIssuesPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogIssue
     * @throws ApiException
     */
    public function retrieveBlogIssue(int $obj_id): Model\BlogIssue
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsIssuesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\BlogIssue
     * @throws ApiException
     */
    public function updateBlogIssue(int $obj_id, Model\BlogIssue $obj): Model\BlogIssue
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsIssuesObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteBlogIssue(int $obj_id): null
    {
        $api = new Api\BlogsApi;
        return $api->v30BlogsIssuesObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\CareerPartnerCategory[]
     * @throws ApiException
     */
    public function listCareerPartnerCategories(int $limit, ?string $order = null): array
    {
        $api = new Api\CareerPartnersApi;
        $callback = [$api, 'v30CareerPartnersCategoriesGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\CareerPartnerCategory
     * @throws ApiException
     */
    public function createCareerPartnerCategory(Model\CareerPartnerCategory $obj): Model\CareerPartnerCategory
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersCategoriesPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\CareerPartnerCategory
     * @throws ApiException
     */
    public function retrieveCareerPartnerCategory(int $obj_id): Model\CareerPartnerCategory
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersCategoriesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\CareerPartnerCategory
     * @throws ApiException
     */
    public function updateCareerPartnerCategory(int $obj_id, Model\CareerPartnerCategory $obj): Model\CareerPartnerCategory
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersCategoriesObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteCareerPartnerCategory(int $obj_id): null
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersCategoriesObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string[] $career_partner_category_id Filter by Category
     * @param string $order 
     * @return Model\CareerPartner[]
     * @throws ApiException
     */
    public function listCareerPartners(int $limit, ?array $career_partner_category_id = null, ?string $order = null): array
    {
        $api = new Api\CareerPartnersApi;
        $callback = [$api, 'v30CareerPartnersGet'];
        return $this->depaginate($callback, $limit, $career_partner_category_id, $order);
    }

    /**
     * @generated
    
     * @return Model\CareerPartner
     * @throws ApiException
     */
    public function createCareerPartner(Model\CareerPartner $obj): Model\CareerPartner
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\CareerPartner
     * @throws ApiException
     */
    public function retrieveCareerPartner(int $obj_id): Model\CareerPartner
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\CareerPartner
     * @throws ApiException
     */
    public function updateCareerPartner(int $obj_id, Model\CareerPartner $obj): Model\CareerPartner
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteCareerPartner(int $obj_id): null
    {
        $api = new Api\CareerPartnersApi;
        return $api->v30CareerPartnersObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\SavedReply[]
     * @throws ApiException
     */
    public function listSavedReplies(int $limit, ?string $order = null): array
    {
        $api = new Api\CommunicationApi;
        $callback = [$api, 'v30CommunicationSavedRepliesGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\SavedReply
     * @throws ApiException
     */
    public function createSavedReply(Model\SavedReply $obj): Model\SavedReply
    {
        $api = new Api\CommunicationApi;
        return $api->v30CommunicationSavedRepliesPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\SavedReply
     * @throws ApiException
     */
    public function retrieveSavedReply(int $obj_id): Model\SavedReply
    {
        $api = new Api\CommunicationApi;
        return $api->v30CommunicationSavedRepliesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\SavedReply
     * @throws ApiException
     */
    public function updateSavedReply(int $obj_id, Model\SavedReply $obj): Model\SavedReply
    {
        $api = new Api\CommunicationApi;
        return $api->v30CommunicationSavedRepliesObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteSavedReply(int $obj_id): null
    {
        $api = new Api\CommunicationApi;
        return $api->v30CommunicationSavedRepliesObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\Country[]
     * @throws ApiException
     */
    public function listCountries(int $limit, ?string $order = null): array
    {
        $api = new Api\CountriesApi;
        $callback = [$api, 'v30CountriesGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Country
     * @throws ApiException
     */
    public function retrieveCountry(int $obj_id): Model\Country
    {
        $api = new Api\CountriesApi;
        return $api->v30CountriesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\EventCategory[]
     * @throws ApiException
     */
    public function listEventCategories(int $limit, ?string $order = null): array
    {
        $api = new Api\EventCategoriesApi;
        $callback = [$api, 'v30EventCategoriesGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
     * @param int[] $category_id Filter by Category
     * @param string $period_filter Filter period on `start`, `end`
     * @param string $published Filter on `published`
     * @param string[] $participation_billing_enabled Filter by Billing type
     * @param string[] $participating_member_id Filter by Participant
     * @param string $socie_app_id 
     * @param string[] $member_id Filter by Published for member
     * @param string $order 
     * @return Model\Event[]
     * @throws ApiException
     */
    public function listEvents(int $limit, ?array $category_id = null, ?string $period_filter = null, ?string $published = null, ?array $participation_billing_enabled = null, ?array $participating_member_id = null, ?string $socie_app_id = null, ?array $member_id = null, ?string $order = null): array
    {
        $api = new Api\EventsApi;
        $callback = [$api, 'v30EventsGet'];
        return $this->depaginate($callback, $limit, category_id: $category_id, period_filter: $period_filter, published: $published, participation_billing_enabled: $participation_billing_enabled, participating_member_id: $participating_member_id, socie_app_id: $socie_app_id, member_id: $member_id, order: $order);
    }

    /**
     * @generated
    
     * @return Model\Event
     * @throws ApiException
     */
    public function createEvent(Model\Event $obj): Model\Event
    {
        $api = new Api\EventsApi;
        return $api->v30EventsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Event
     * @throws ApiException
     */
    public function retrieveEvent(int $obj_id): Model\Event
    {
        $api = new Api\EventsApi;
        return $api->v30EventsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Event
     * @throws ApiException
     */
    public function updateEvent(int $obj_id, Model\Event $obj): Model\Event
    {
        $api = new Api\EventsApi;
        return $api->v30EventsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteEvent(int $obj_id): null
    {
        $api = new Api\EventsApi;
        return $api->v30EventsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string[] $event_id Filter by Event
     * @param string[] $status Filter by Status
     * @param string $has_invoice Filter on `has_invoice`
     * @param string[] $sale_invoice_status Filter by Invoice status
     * @param int[] $member_id Filter by member_id
     * @param string $order 
     * @return Model\EventParticipation[]
     * @throws ApiException
     */
    public function listEventParticipations(int $limit, int $obj_id, ?array $event_id = null, ?array $status = null, ?string $has_invoice = null, ?array $sale_invoice_status = null, ?array $member_id = null, ?string $order = null): array
    {
        $api = new Api\EventsApi;
        $callback = [$api, 'v30EventsObjIdParticipationsGet'];
        return $this->depaginate($callback, $limit, $obj_id, $event_id, $status, $has_invoice, $sale_invoice_status, $member_id, $order);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return Model\EventParticipationWithRelations
     * @throws ApiException
     */
    public function retrieveEventParticipation(int $event_id, int $obj_id): Model\EventParticipationWithRelations
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdParticipationsObjIdGet($event_id, $obj_id);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return Model\EventParticipationWithRelations
     * @throws ApiException
     */
    public function updateEventParticipation(int $event_id, int $obj_id, Model\EventParticipationWithRelations $obj): Model\EventParticipationWithRelations
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdParticipationsObjIdPut($event_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function setPresenceOnAllTicketsWithinParticipation(int $event_id, int $obj_id, Model\EventParticipationPresence $obj): null
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdParticipationsObjIdSetPresencePost($event_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function approveParticipation(int $event_id, int $obj_id, Model\EventParticipationConditional $obj): null
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdParticipationsObjIdApprovePost($event_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function moveParticipationToWaitingList(int $event_id, int $obj_id, Model\EventParticipationConditional $obj): null
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdParticipationsObjIdWaitPost($event_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function unsubscribeParticipation(int $event_id, int $obj_id, Model\EventParticipationFine $obj): null
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdParticipationsObjIdUnsubscribePost($event_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function declineParticipation(int $event_id, int $obj_id, Model\EventParticipationFine $obj): null
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdParticipationsObjIdDeclinePost($event_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\EventParticipationBuilder
     * @throws ApiException
     */
    public function createEventParticipation(int $obj_id, Model\EventParticipationBuilder $obj): Model\EventParticipationBuilder
    {
        $api = new Api\EventsApi;
        return $api->v30EventsObjIdSignUpPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string $is_available_for_members Filter on `is_available_for_members`
     * @param string $is_available_for_external Filter on `is_available_for_external`
     * @param string[] $availability_status Filter by Availability
     * @param string $order 
     * @return Model\TicketType[]
     * @throws ApiException
     */
    public function listTicketTypes(int $limit, int $obj_id, ?string $is_available_for_members = null, ?string $is_available_for_external = null, ?array $availability_status = null, ?string $order = null): array
    {
        $api = new Api\EventsApi;
        $callback = [$api, 'v30EventsObjIdTicketTypesGet'];
        return $this->depaginate($callback, $limit, $obj_id, $is_available_for_members, $is_available_for_external, $availability_status, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\EventTicketType
     * @throws ApiException
     */
    public function createTicketType(int $obj_id, Model\EventTicketType $obj): Model\EventTicketType
    {
        $api = new Api\EventsApi;
        return $api->v30EventsObjIdTicketTypesPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return Model\EventTicketType
     * @throws ApiException
     */
    public function retrieveTicketType(int $event_id, int $obj_id): Model\EventTicketType
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdTicketTypesObjIdGet($event_id, $obj_id);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return Model\EventTicketType
     * @throws ApiException
     */
    public function updateTicketType(int $event_id, int $obj_id, Model\EventTicketType $obj): Model\EventTicketType
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdTicketTypesObjIdPut($event_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $event_id 
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteTicketType(int $event_id, int $obj_id): null
    {
        $api = new Api\EventsApi;
        return $api->v30EventsEventIdTicketTypesObjIdDelete($event_id, $obj_id);
    }

    /**
     * @generated
    
     * @return null
     * @throws ApiException
     */
    public function addANewExternalInvoiceImport(): null
    {
        $api = new Api\ExternalInvoicesApi;
        return $api->v30ExternalInvoicesImportsPost();
    }

    /**
     * @generated
     * @param string $type Filter on `type`
     * @param string $order 
     * @return Model\Filter[]
     * @throws ApiException
     */
    public function listFilters(int $limit, ?string $type = null, ?string $order = null): array
    {
        $api = new Api\FiltersApi;
        $callback = [$api, 'v30FiltersGet'];
        return $this->depaginate($callback, $limit, $type, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Filter
     * @throws ApiException
     */
    public function retrieveFilter(int $obj_id): Model\Filter
    {
        $api = new Api\FiltersApi;
        return $api->v30FiltersObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $form_id 
     * @param string $period Filter period on `created`
     * @param string $status Filter on `status`
     * @param string $is_archived Filter on `is_archived`
     * @param string $order 
     * @return Model\FormEntry[]
     * @throws ApiException
     */
    public function listFormEntries(int $limit, int $form_id, ?string $period = null, ?string $status = null, ?string $is_archived = null, ?string $order = null): array
    {
        $api = new Api\FormsApi;
        $callback = [$api, 'v30FormsFormIdEntriesGet'];
        return $this->depaginate($callback, $limit, $form_id, $period, $status, $is_archived, $order);
    }

    /**
     * @generated
     * @param int $form_id 
     * @param int $obj_id 
     * @return Model\FormEntry
     * @throws ApiException
     */
    public function retrieveFormEntry(int $form_id, int $obj_id): Model\FormEntry
    {
        $api = new Api\FormsApi;
        return $api->v30FormsFormIdEntriesObjIdGet($form_id, $obj_id);
    }

    /**
     * @generated
     * @param int $form_id 
     * @param string $order 
     * @return Model\FormField[]
     * @throws ApiException
     */
    public function listFormFields(int $limit, int $form_id, ?string $order = null): array
    {
        $api = new Api\FormsApi;
        $callback = [$api, 'v30FormsFormIdFieldsGet'];
        return $this->depaginate($callback, $limit, $form_id, $order);
    }

    /**
     * @generated
     * @param int $form_id 
     * @param int $obj_id 
     * @return Model\FormField
     * @throws ApiException
     */
    public function retrieveFieldByID(int $form_id, int $obj_id): Model\FormField
    {
        $api = new Api\FormsApi;
        return $api->v30FormsFormIdFieldsObjIdGet($form_id, $obj_id);
    }

    /**
     * @generated
     * @param int $form_id 
     * @param string $ref 
     * @return Model\FormField
     * @throws ApiException
     */
    public function retrieveFieldByRef(int $form_id, string $ref): Model\FormField
    {
        $api = new Api\FormsApi;
        return $api->v30FormsFormIdFieldsRefGet($form_id, $ref);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\Form[]
     * @throws ApiException
     */
    public function listForms(int $limit, ?string $order = null): array
    {
        $api = new Api\FormsApi;
        $callback = [$api, 'v30FormsGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\BaseForm
     * @throws ApiException
     */
    public function createForm(Model\BaseForm $obj): Model\BaseForm
    {
        $api = new Api\FormsApi;
        return $api->v30FormsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Form
     * @throws ApiException
     */
    public function retrieveForm(int $obj_id): Model\Form
    {
        $api = new Api\FormsApi;
        return $api->v30FormsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Form
     * @throws ApiException
     */
    public function updateForm(int $obj_id, Model\Form $obj): Model\Form
    {
        $api = new Api\FormsApi;
        return $api->v30FormsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param string $socie_app Filter on `filter_id`, `published`
     * @param string $order 
     * @return Model\GalleryAlbum[]
     * @throws ApiException
     */
    public function listGalleryAlbums(int $limit, ?string $socie_app = null, ?string $order = null): array
    {
        $api = new Api\GalleriesApi;
        $callback = [$api, 'v30GalleriesAlbumsGet'];
        return $this->depaginate($callback, $limit, $socie_app, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\GalleryAlbum
     * @throws ApiException
     */
    public function retrieveGalleryAlbum(int $obj_id): Model\GalleryAlbum
    {
        $api = new Api\GalleriesApi;
        return $api->v30GalleriesAlbumsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $album_id 
     * @param string $order 
     * @return Model\GalleryPhoto[]
     * @throws ApiException
     */
    public function listGalleryPhotos(int $limit, int $album_id, ?string $order = null): array
    {
        $api = new Api\GalleriesApi;
        $callback = [$api, 'v30GalleriesAlbumsAlbumIdPhotosGet'];
        return $this->depaginate($callback, $limit, $album_id, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $album_id 
     * @return Model\GalleryPhoto
     * @throws ApiException
     */
    public function retrieveGalleryPhoto(int $obj_id, int $album_id): Model\GalleryPhoto
    {
        $api = new Api\GalleriesApi;
        return $api->v30GalleriesAlbumsAlbumIdPhotosObjIdGet($obj_id, $album_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\GroupFolderListRecursive[]
     * @throws ApiException
     */
    public function listGroupFoldersRecursive(int $limit, ?string $order = null): array
    {
        $api = new Api\GroupFoldersApi;
        $callback = [$api, 'v30GroupFoldersRecursiveGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string $parent_id 
     * @param string $order 
     * @return Model\GroupFolder[]
     * @throws ApiException
     */
    public function listGroupFolders(int $limit, ?string $published = null, ?string $parent_id = null, ?string $order = null): array
    {
        $api = new Api\GroupFoldersApi;
        $callback = [$api, 'v30GroupFoldersGet'];
        return $this->depaginate($callback, $limit, $published, $parent_id, $order);
    }

    /**
     * @generated
    
     * @return Model\GroupFolder
     * @throws ApiException
     */
    public function createGroupFolder(Model\GroupFolder $obj): Model\GroupFolder
    {
        $api = new Api\GroupFoldersApi;
        return $api->v30GroupFoldersPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\GroupFolder
     * @throws ApiException
     */
    public function retrieveGroupFolder(int $obj_id): Model\GroupFolder
    {
        $api = new Api\GroupFoldersApi;
        return $api->v30GroupFoldersObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\GroupFolder
     * @throws ApiException
     */
    public function updateGroupFolder(int $obj_id, Model\GroupFolder $obj): Model\GroupFolder
    {
        $api = new Api\GroupFoldersApi;
        return $api->v30GroupFoldersObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteGroupFolder(int $obj_id): null
    {
        $api = new Api\GroupFoldersApi;
        return $api->v30GroupFoldersObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string[] $folder_id Filter by Folder
     * @param string[] $member_id Filter by Member
     * @param string[] $socie_app_id Filter by None
     * @param string $term 
     * @param string $order 
     * @return Model\Group[]
     * @throws ApiException
     */
    public function listGroups(int $limit, ?string $published = null, ?array $folder_id = null, ?array $member_id = null, ?array $socie_app_id = null, ?string $term = null, ?string $order = null): array
    {
        $api = new Api\GroupsApi;
        $callback = [$api, 'v30GroupsGet'];
        return $this->depaginate($callback, $limit, $published, $folder_id, $member_id, $socie_app_id, $term, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\GroupWithMemberships
     * @throws ApiException
     */
    public function retrieveGroup(int $obj_id): Model\GroupWithMemberships
    {
        $api = new Api\GroupsApi;
        return $api->v30GroupsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\GroupWithMemberships
     * @throws ApiException
     */
    public function updateGroup(int $obj_id, Model\GroupWithMemberships $obj): Model\GroupWithMemberships
    {
        $api = new Api\GroupsApi;
        return $api->v30GroupsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteGroup(int $obj_id): null
    {
        $api = new Api\GroupsApi;
        return $api->v30GroupsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string[] $group_id Filter by Group
     * @param string[] $member_id Filter by Member
     * @param string $order 
     * @return Model\GroupMembership[]
     * @throws ApiException
     */
    public function listGroupMemberships(int $limit, ?array $group_id = null, ?array $member_id = null, ?string $order = null): array
    {
        $api = new Api\GroupsApi;
        $callback = [$api, 'v30GroupsMembershipsGet'];
        return $this->depaginate($callback, $limit, $group_id, $member_id, $order);
    }

    /**
     * @generated
    
     * @return Model\GroupMembership
     * @throws ApiException
     */
    public function createGroupMembership(Model\GroupMembership $obj): Model\GroupMembership
    {
        $api = new Api\GroupsApi;
        return $api->v30GroupsMembershipsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\GroupMembership
     * @throws ApiException
     */
    public function retrieveGroupMembership(int $obj_id): Model\GroupMembership
    {
        $api = new Api\GroupsApi;
        return $api->v30GroupsMembershipsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\GroupMembership
     * @throws ApiException
     */
    public function updateGroupMembership(int $obj_id, Model\GroupMembership $obj): Model\GroupMembership
    {
        $api = new Api\GroupsApi;
        return $api->v30GroupsMembershipsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteGroupMembership(int $obj_id): null
    {
        $api = new Api\GroupsApi;
        return $api->v30GroupsMembershipsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int[] $author_id Filter by None
     * @param int[] $assignee_id Filter by None
     * @param string[] $subject_type Filter by None
     * @param string $is_completed Filter on `is_completed`
     * @param string $order 
     * @return Model\Task[]
     * @throws ApiException
     */
    public function listTasks(int $limit, ?array $author_id = null, ?array $assignee_id = null, ?array $subject_type = null, ?string $is_completed = null, ?string $order = null): array
    {
        $api = new Api\LogsApi;
        $callback = [$api, 'v30TasksGet'];
        return $this->depaginate($callback, $limit, $author_id, $assignee_id, $subject_type, $is_completed, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Task
     * @throws ApiException
     */
    public function updateTask(int $obj_id, Model\UpdateTask $obj): Model\Task
    {
        $api = new Api\LogsApi;
        return $api->v30TasksObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
    
     * @return Model\MagicLink
     * @throws ApiException
     */
    public function createMagicLink(Model\MagicLink $obj): Model\MagicLink
    {
        $api = new Api\MagicLinksApi;
        return $api->v30MagicLinksPost($obj);
    }

    /**
     * @generated
     * @param string $archived Filter on `archived`
     * @param string $hidden Filter on `hidden`
     * @param string $deceased Filter on `is_deceased`
     * @param string $order 
     * @return Model\MemberStatusList[]
     * @throws ApiException
     */
    public function listMemberStatuses(int $limit, ?string $archived = null, ?string $hidden = null, ?string $deceased = null, ?string $order = null): array
    {
        $api = new Api\MemberStatusesApi;
        $callback = [$api, 'v30MemberStatusesGet'];
        return $this->depaginate($callback, $limit, $archived, $hidden, $deceased, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\MemberStatusWithFieldSettings
     * @throws ApiException
     */
    public function retrieveMemberStatus(int $obj_id): Model\MemberStatusWithFieldSettings
    {
        $api = new Api\MemberStatusesApi;
        return $api->v30MemberStatusesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\MemberStatusWithFieldSettings
     * @throws ApiException
     */
    public function updateMemberStatus(int $obj_id, Model\MemberStatusWithFieldSettings $obj): Model\MemberStatusWithFieldSettings
    {
        $api = new Api\MemberStatusesApi;
        return $api->v30MemberStatusesObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteMemberStatus(int $obj_id): null
    {
        $api = new Api\MemberStatusesApi;
        return $api->v30MemberStatusesObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\CustomField[]
     * @throws ApiException
     */
    public function listCustomFields(int $limit, ?string $order = null): array
    {
        $api = new Api\MembersApi;
        $callback = [$api, 'v30MembersCustomFieldsGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\MemberField
     * @throws ApiException
     */
    public function retrieveCustomFieldByID(int $obj_id): Model\MemberField
    {
        $api = new Api\MembersApi;
        return $api->v30MembersCustomFieldsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param string $ref 
     * @return Model\MemberField
     * @throws ApiException
     */
    public function retrieveCustomFieldByRef(string $ref): Model\MemberField
    {
        $api = new Api\MembersApi;
        return $api->v30MembersCustomFieldsRefGet($ref);
    }

    /**
     * @generated
     * @param int $member_id 
     * @param int[] $author_id Filter by None
     * @param string[] $type Filter by None
     * @param string $order 
     * @return Model\LogEntry[]
     * @throws ApiException
     */
    public function listMemberLogEntries(int $limit, int $member_id, ?array $author_id = null, ?array $type = null, ?string $order = null): array
    {
        $api = new Api\MembersApi;
        $callback = [$api, 'v30MembersMemberIdLogsGet'];
        return $this->depaginate($callback, $limit, $member_id, $author_id, $type, $order);
    }

    /**
     * @generated
     * @param int $member_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function createMemberLogEntry(int $member_id, Model\CreateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\MembersApi;
        return $api->v30MembersMemberIdLogsPost($member_id, $obj);
    }

    /**
     * @generated
     * @param int $member_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function retrieveMemberLogEntry(int $member_id, int $log_entry_id): Model\LogEntry
    {
        $api = new Api\MembersApi;
        return $api->v30MembersMemberIdLogsLogEntryIdGet($member_id, $log_entry_id);
    }

    /**
     * @generated
     * @param int $member_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function updateMemberLogEntry(int $member_id, int $log_entry_id, Model\UpdateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\MembersApi;
        return $api->v30MembersMemberIdLogsLogEntryIdPut($member_id, $log_entry_id, $obj);
    }

    /**
     * @generated
     * @param int $member_id 
     * @param int $log_entry_id 
     * @return null
     * @throws ApiException
     */
    public function deleteMemberLogEntry(int $member_id, int $log_entry_id): null
    {
        $api = new Api\MembersApi;
        return $api->v30MembersMemberIdLogsLogEntryIdDelete($member_id, $log_entry_id);
    }

    /**
     * @generated
     * @param string[] $username Filter by Username
     * @param string[] $status_id Filter by None
     * @param string[] $socie_app_id Filter by None
     * @param string $order 
     * @param string[] $context Filter by None
     * @return Model\Member[]
     * @throws ApiException
     */
    public function listMembers(int $limit, ?array $username = null, ?array $status_id = null, ?array $socie_app_id = null, ?string $order = null, ?array $context = null): array
    {
        $api = new Api\MembersApi;
        $callback = [$api, 'v30MembersGet'];
        return $this->depaginate($callback, $limit, $username, $status_id, $socie_app_id, $order, $context);
    }

    /**
     * @generated
     * @param string[] $context Filter by None
     * @return Model\Member
     * @throws ApiException
     */
    public function createMember(?array $context = null, Model\CreateMember $obj): Model\Member
    {
        $api = new Api\MembersApi;
        return $api->v30MembersPost($context, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string[] $context Filter by None
     * @return Model\MemberWithCustomFields
     * @throws ApiException
     */
    public function retrieveMember(int $obj_id, ?array $context = null): Model\MemberWithCustomFields
    {
        $api = new Api\MembersApi;
        return $api->v30MembersObjIdGet($obj_id, $context);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string[] $context Filter by None
     * @return Model\MemberWithCustomFields
     * @throws ApiException
     */
    public function updateMember(int $obj_id, ?array $context = null, Model\MemberWithCustomFields $obj): Model\MemberWithCustomFields
    {
        $api = new Api\MembersApi;
        return $api->v30MembersObjIdPut($obj_id, $context, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteMember(int $obj_id): null
    {
        $api = new Api\MembersApi;
        return $api->v30MembersObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string $order 
     * @return Model\MembershipStatus[]
     * @throws ApiException
     */
    public function listMembershipStatuses(int $limit, int $obj_id, ?string $order = null): array
    {
        $api = new Api\MembersApi;
        $callback = [$api, 'v30MembersObjIdStatusesGet'];
        return $this->depaginate($callback, $limit, $obj_id, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\MembershipStatus
     * @throws ApiException
     */
    public function createMembershipStatus(int $obj_id, Model\MembershipStatus $obj): Model\MembershipStatus
    {
        $api = new Api\MembersApi;
        return $api->v30MembersObjIdStatusesPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $membership_status_id 
     * @param int $obj_id 
     * @return Model\MembershipStatus
     * @throws ApiException
     */
    public function retrieveMembershipStatus(int $membership_status_id, int $obj_id): Model\MembershipStatus
    {
        $api = new Api\MembersApi;
        return $api->v30MembersObjIdStatusesMembershipStatusIdGet($membership_status_id, $obj_id);
    }

    /**
     * @generated
     * @param int $membership_status_id 
     * @param int $obj_id 
     * @return Model\MembershipStatus
     * @throws ApiException
     */
    public function updateMembershipStatus(int $membership_status_id, int $obj_id, Model\MembershipStatus $obj): Model\MembershipStatus
    {
        $api = new Api\MembersApi;
        return $api->v30MembersObjIdStatusesMembershipStatusIdPut($membership_status_id, $obj_id, $obj);
    }

    /**
     * @generated
     * @param int $membership_status_id 
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteMembershipStatus(int $membership_status_id, int $obj_id): null
    {
        $api = new Api\MembersApi;
        return $api->v30MembersObjIdStatusesMembershipStatusIdDelete($membership_status_id, $obj_id);
    }

    /**
     * @generated
     * @param string $term 
     * @param string $order 
     * @return Model\MemberSearch[]
     * @throws ApiException
     */
    public function searchMembers(int $limit, string $term, ?string $order = null): array
    {
        $api = new Api\MembersApi;
        $callback = [$api, 'v30MembersSearchGet'];
        return $this->depaginate($callback, $limit, $term, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int[] $author_id Filter by None
     * @param string[] $type Filter by None
     * @param string $order 
     * @return Model\LogEntry[]
     * @throws ApiException
     */
    public function listNewsLogEntries(int $limit, int $obj_id, ?array $author_id = null, ?array $type = null, ?string $order = null): array
    {
        $api = new Api\NewsApi;
        $callback = [$api, 'v30NewsObjIdLogsGet'];
        return $this->depaginate($callback, $limit, $obj_id, $author_id, $type, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function createNewsLogEntry(int $obj_id, Model\CreateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\NewsApi;
        return $api->v30NewsObjIdLogsPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function retrieveNewsLogEntry(int $obj_id, int $log_entry_id): Model\LogEntry
    {
        $api = new Api\NewsApi;
        return $api->v30NewsObjIdLogsLogEntryIdGet($obj_id, $log_entry_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function updateNewsLogEntry(int $obj_id, int $log_entry_id, Model\UpdateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\NewsApi;
        return $api->v30NewsObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return null
     * @throws ApiException
     */
    public function deleteNewsLogEntry(int $obj_id, int $log_entry_id): null
    {
        $api = new Api\NewsApi;
        return $api->v30NewsObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id);
    }

    /**
     * @generated
     * @param string $period_filter Filter period on `published_from`
     * @param string $actual Filter on `actual`
     * @param string $comments_open Filter on `comments_open`
     * @param string[] $visibility Filter by Visibility
     * @param string $order 
     * @return Model\News[]
     * @throws ApiException
     */
    public function listNews(int $limit, ?string $period_filter = null, ?string $actual = null, ?string $comments_open = null, ?array $visibility = null, ?string $order = null): array
    {
        $api = new Api\NewsApi;
        $callback = [$api, 'v30NewsGet'];
        return $this->depaginate($callback, $limit, $period_filter, $actual, $comments_open, $visibility, $order);
    }

    /**
     * @generated
    
     * @return Model\News
     * @throws ApiException
     */
    public function createNews(Model\News $obj): Model\News
    {
        $api = new Api\NewsApi;
        return $api->v30NewsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\News
     * @throws ApiException
     */
    public function retrieveNews(int $obj_id): Model\News
    {
        $api = new Api\NewsApi;
        return $api->v30NewsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\News
     * @throws ApiException
     */
    public function updateNews(int $obj_id, Model\News $obj): Model\News
    {
        $api = new Api\NewsApi;
        return $api->v30NewsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteNews(int $obj_id): null
    {
        $api = new Api\NewsApi;
        return $api->v30NewsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\Notification[]
     * @throws ApiException
     */
    public function listNotifications(int $limit, ?string $order = null): array
    {
        $api = new Api\NotificationsApi;
        $callback = [$api, 'v30NotificationsGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\OrganisationCategory[]
     * @throws ApiException
     */
    public function listOrganisationCategories(int $limit, ?string $order = null): array
    {
        $api = new Api\OrganisationsApi;
        $callback = [$api, 'v30OrganisationsCategoriesGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\OrganisationCategory
     * @throws ApiException
     */
    public function createOrganisationCategory(Model\OrganisationCategory $obj): Model\OrganisationCategory
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsCategoriesPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\OrganisationCategoryWithCustomFieldMetadata
     * @throws ApiException
     */
    public function retrieveOrganisationCategory(int $obj_id): Model\OrganisationCategoryWithCustomFieldMetadata
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsCategoriesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\OrganisationCategoryWithCustomFieldMetadata
     * @throws ApiException
     */
    public function updateOrganisationCategory(int $obj_id, Model\OrganisationCategoryWithCustomFieldMetadata $obj): Model\OrganisationCategoryWithCustomFieldMetadata
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsCategoriesObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteOrganisationCategory(int $obj_id): null
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsCategoriesObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string[] $category_id Filter by Category
     * @param string[] $sbi_code Filter by SBI code
     * @param string[] $legal_form Filter by Legal form
     * @param string[] $member_id Filter by Member
     * @param string $publication Filter on `publication`
     * @param string $order 
     * @return Model\Organisation[]
     * @throws ApiException
     */
    public function listOrganisations(int $limit, ?array $category_id = null, ?array $sbi_code = null, ?array $legal_form = null, ?array $member_id = null, ?string $publication = null, ?string $order = null): array
    {
        $api = new Api\OrganisationsApi;
        $callback = [$api, 'v30OrganisationsGet'];
        return $this->depaginate($callback, $limit, $category_id, $sbi_code, $legal_form, $member_id, $publication, $order);
    }

    /**
     * @generated
    
     * @return Model\Organisation
     * @throws ApiException
     */
    public function createOrganisation(Model\Organisation $obj): Model\Organisation
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\OrganisationWithCustomFields
     * @throws ApiException
     */
    public function retrieveOrganisation(int $obj_id): Model\OrganisationWithCustomFields
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\OrganisationWithCustomFields
     * @throws ApiException
     */
    public function updateOrganisation(int $obj_id, Model\OrganisationWithCustomFields $obj): Model\OrganisationWithCustomFields
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteOrganisation(int $obj_id): null
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string[] $organisation_id Filter by Organisation
     * @param string[] $member_id Filter by Member
     * @param string $order 
     * @return Model\OrganisationMembership[]
     * @throws ApiException
     */
    public function listOrganisationMemberships(int $limit, ?array $organisation_id = null, ?array $member_id = null, ?string $order = null): array
    {
        $api = new Api\OrganisationsApi;
        $callback = [$api, 'v30OrganisationsMembershipsGet'];
        return $this->depaginate($callback, $limit, $organisation_id, $member_id, $order);
    }

    /**
     * @generated
    
     * @return Model\OrganisationMembership
     * @throws ApiException
     */
    public function createOrganisationMembership(Model\OrganisationMembership $obj): Model\OrganisationMembership
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsMembershipsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\OrganisationMembership
     * @throws ApiException
     */
    public function retrieveOrganisationMembership(int $obj_id): Model\OrganisationMembership
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsMembershipsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\OrganisationMembership
     * @throws ApiException
     */
    public function updateOrganisationMembership(int $obj_id, Model\OrganisationMembership $obj): Model\OrganisationMembership
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsMembershipsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteOrganisationMembership(int $obj_id): null
    {
        $api = new Api\OrganisationsApi;
        return $api->v30OrganisationsMembershipsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string $parent_id 
     * @param string $order 
     * @return Model\ProductFolderListRecursive[]
     * @throws ApiException
     */
    public function listProductFoldersRecursive(int $limit, ?string $published = null, ?string $parent_id = null, ?string $order = null): array
    {
        $api = new Api\ProductFoldersApi;
        $callback = [$api, 'v30ProductFoldersRecursiveGet'];
        return $this->depaginate($callback, $limit, $published, $parent_id, $order);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string $parent_id 
     * @param string $order 
     * @return Model\ProductFolder[]
     * @throws ApiException
     */
    public function listProductFolders(int $limit, ?string $published = null, ?string $parent_id = null, ?string $order = null): array
    {
        $api = new Api\ProductFoldersApi;
        $callback = [$api, 'v30ProductFoldersGet'];
        return $this->depaginate($callback, $limit, $published, $parent_id, $order);
    }

    /**
     * @generated
    
     * @return Model\ProductFolder
     * @throws ApiException
     */
    public function createProductFolder(Model\ProductFolder $obj): Model\ProductFolder
    {
        $api = new Api\ProductFoldersApi;
        return $api->v30ProductFoldersPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\ProductFolder
     * @throws ApiException
     */
    public function retrieveProductFolder(int $obj_id): Model\ProductFolder
    {
        $api = new Api\ProductFoldersApi;
        return $api->v30ProductFoldersObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\ProductFolder
     * @throws ApiException
     */
    public function updateProductFolder(int $obj_id, Model\ProductFolder $obj): Model\ProductFolder
    {
        $api = new Api\ProductFoldersApi;
        return $api->v30ProductFoldersObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteProductFolder(int $obj_id): null
    {
        $api = new Api\ProductFoldersApi;
        return $api->v30ProductFoldersObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int[] $author_id Filter by None
     * @param string[] $type Filter by None
     * @param string $order 
     * @return Model\LogEntry[]
     * @throws ApiException
     */
    public function listProductLogEntries(int $limit, int $obj_id, ?array $author_id = null, ?array $type = null, ?string $order = null): array
    {
        $api = new Api\ProductsApi;
        $callback = [$api, 'v30ProductsObjIdLogsGet'];
        return $this->depaginate($callback, $limit, $obj_id, $author_id, $type, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function createProductLogEntry(int $obj_id, Model\CreateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsObjIdLogsPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function retrieveProductLogEntry(int $obj_id, int $log_entry_id): Model\LogEntry
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsObjIdLogsLogEntryIdGet($obj_id, $log_entry_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function updateProductLogEntry(int $obj_id, int $log_entry_id, Model\UpdateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return null
     * @throws ApiException
     */
    public function deleteProductLogEntry(int $obj_id, int $log_entry_id): null
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string $status Filter on `status`
     * @param string[] $folder_id Filter by Folder
     * @param string $order 
     * @return Model\Product[]
     * @throws ApiException
     */
    public function listProducts(int $limit, ?string $published = null, ?string $status = null, ?array $folder_id = null, ?string $order = null): array
    {
        $api = new Api\ProductsApi;
        $callback = [$api, 'v30ProductsGet'];
        return $this->depaginate($callback, $limit, $published, $status, $folder_id, $order);
    }

    /**
     * @generated
    
     * @return Model\Product
     * @throws ApiException
     */
    public function createProduct(Model\Product $obj): Model\Product
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Product
     * @throws ApiException
     */
    public function retrieveProduct(int $obj_id): Model\Product
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Product
     * @throws ApiException
     */
    public function updateProduct(int $obj_id, Model\Product $obj): Model\Product
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteProduct(int $obj_id): null
    {
        $api = new Api\ProductsApi;
        return $api->v30ProductsObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int[] $author_id Filter by None
     * @param string[] $type Filter by None
     * @param string $order 
     * @return Model\LogEntry[]
     * @throws ApiException
     */
    public function listSaleInvoiceLogEntries(int $limit, int $obj_id, ?array $author_id = null, ?array $type = null, ?string $order = null): array
    {
        $api = new Api\SaleInvoicesApi;
        $callback = [$api, 'v30SaleInvoicesObjIdLogsGet'];
        return $this->depaginate($callback, $limit, $obj_id, $author_id, $type, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function createSaleInvoiceLogEntry(int $obj_id, Model\CreateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdLogsPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function retrieveSaleInvoiceLogEntry(int $obj_id, int $log_entry_id): Model\LogEntry
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdLogsLogEntryIdGet($obj_id, $log_entry_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return Model\LogEntry
     * @throws ApiException
     */
    public function updateSaleInvoiceLogEntry(int $obj_id, int $log_entry_id, Model\UpdateLogEntry $obj): Model\LogEntry
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdLogsLogEntryIdPut($obj_id, $log_entry_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param int $log_entry_id 
     * @return null
     * @throws ApiException
     */
    public function deleteSaleInvoiceLogEntry(int $obj_id, int $log_entry_id): null
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdLogsLogEntryIdDelete($obj_id, $log_entry_id);
    }

    /**
     * @generated
     * @param string $entity_id 
     * @param string $period_filter Filter period on `invoice_date`
     * @param string[] $invoice_status Filter by Invoice status
     * @param string[] $invoice_num_reminders_send Filter by # Reminders
     * @param string[] $invoice_type Filter by Invoice type
     * @param string[] $category Filter by Category
     * @param string[] $product_offer_id Filter by Product
     * @param string[] $member_id Filter by Member
     * @param string[] $collection_id Filter by Collection
     * @param string $use_direct_debit Filter on `use_direct_debit`
     * @param string $contribution_start Filter period on `contribution_start`
     * @param string $contribution_end Filter period on `contribution_end`
     * @param string[] $direct_debit_file_id Filter by Direct debit file
     * @param string $order 
     * @return Model\SaleInvoice[]
     * @throws ApiException
     */
    public function listSaleInvoices(int $limit, ?string $entity_id = null, ?string $period_filter = null, ?array $invoice_status = null, ?array $invoice_num_reminders_send = null, ?array $invoice_type = null, ?array $category = null, ?array $product_offer_id = null, ?array $member_id = null, ?array $collection_id = null, ?string $use_direct_debit = null, ?string $contribution_start = null, ?string $contribution_end = null, ?array $direct_debit_file_id = null, ?string $order = null): array
    {
        $api = new Api\SaleInvoicesApi;
        $callback = [$api, 'v30SaleInvoicesGet'];
        return $this->depaginate($callback, $limit, $entity_id, $period_filter, $invoice_status, $invoice_num_reminders_send, $invoice_type, $category, $product_offer_id, $member_id, $collection_id, $use_direct_debit, $contribution_start, $contribution_end, $direct_debit_file_id, $order);
    }

    /**
     * @generated
    
     * @return Model\SaleInvoice
     * @throws ApiException
     */
    public function createSaleInvoice(Model\SaleInvoice $obj): Model\SaleInvoice
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\SaleInvoice
     * @throws ApiException
     */
    public function retrieveSaleInvoice(int $obj_id): Model\SaleInvoice
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\SaleInvoice
     * @throws ApiException
     */
    public function updateSaleInvoice(int $obj_id, Model\SaleInvoice $obj): Model\SaleInvoice
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteSaleInvoice(int $obj_id): null
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function sendASaleInvoice(int $obj_id, Model\SaleInvoiceSend $obj): null
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdSendPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function remindASaleInvoice(int $obj_id): null
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdRemindPost($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function markSaleInvoiceAsUncollectible(int $obj_id): null
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdMarkUncollectiblePost($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function markSaleInvoiceAsCollectible(int $obj_id): null
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdMarkCollectiblePost($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function downloadASaleInvoiceAsPDFFile(int $obj_id): null
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdDownloadGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string $order 
     * @return Model\SaleInvoiceItem[]
     * @throws ApiException
     */
    public function listSaleInvoiceItems(int $limit, int $obj_id, ?string $order = null): array
    {
        $api = new Api\SaleInvoicesApi;
        $callback = [$api, 'v30SaleInvoicesObjIdItemsGet'];
        return $this->depaginate($callback, $limit, $obj_id, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\SaleInvoiceItem
     * @throws ApiException
     */
    public function createSaleInvoiceItem(int $obj_id, Model\SaleInvoiceItem $obj): Model\SaleInvoiceItem
    {
        $api = new Api\SaleInvoicesApi;
        return $api->v30SaleInvoicesObjIdItemsPost($obj_id, $obj);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\SaleInvoiceWorkflow[]
     * @throws ApiException
     */
    public function listSaleInvoiceWorkflows(int $limit, ?string $order = null): array
    {
        $api = new Api\SaleInvoicesApi;
        $callback = [$api, 'v30SaleInvoicesWorkflowsGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
     * @param string[] $folder_id Filter by Folder
     * @param string $order 
     * @return Model\StorageObject[]
     * @throws ApiException
     */
    public function listStorageObjects(int $limit, ?array $folder_id = null, ?string $order = null): array
    {
        $api = new Api\StorageApi;
        $callback = [$api, 'v30StorageGet'];
        return $this->depaginate($callback, $limit, $folder_id, $order);
    }

    /**
     * @generated
    
     * @return Model\StorageObject
     * @throws ApiException
     */
    public function createStorageObject(Model\StorageObject $obj): Model\StorageObject
    {
        $api = new Api\StorageApi;
        return $api->v30StoragePost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\StorageObject
     * @throws ApiException
     */
    public function retrieveStorageObject(int $obj_id): Model\StorageObject
    {
        $api = new Api\StorageApi;
        return $api->v30StorageObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\StorageObject
     * @throws ApiException
     */
    public function updateStorageObject(int $obj_id, Model\StorageObject $obj): Model\StorageObject
    {
        $api = new Api\StorageApi;
        return $api->v30StorageObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteStorageObject(int $obj_id): null
    {
        $api = new Api\StorageApi;
        return $api->v30StorageObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function uploadAFileToAnExistingStorageObject(int $obj_id, mixed $obj): null
    {
        $api = new Api\StorageApi;
        return $api->v30StorageObjIdFileContentPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string $parent_id 
     * @param string $term 
     * @param string $order 
     * @return Model\StorageFolderListRecursive[]
     * @throws ApiException
     */
    public function listStorageFoldersRecursive(int $limit, ?string $published = null, ?string $parent_id = null, ?string $term = null, ?string $order = null): array
    {
        $api = new Api\StorageFoldersApi;
        $callback = [$api, 'v30StorageFoldersRecursiveGet'];
        return $this->depaginate($callback, $limit, $published, $parent_id, $term, $order);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string $parent_id 
     * @param string $term 
     * @param string $order 
     * @return Model\StorageFolder[]
     * @throws ApiException
     */
    public function listStorageFolders(int $limit, ?string $published = null, ?string $parent_id = null, ?string $term = null, ?string $order = null): array
    {
        $api = new Api\StorageFoldersApi;
        $callback = [$api, 'v30StorageFoldersGet'];
        return $this->depaginate($callback, $limit, $published, $parent_id, $term, $order);
    }

    /**
     * @generated
    
     * @return Model\StorageFolder
     * @throws ApiException
     */
    public function createStorageFolder(Model\StorageFolder $obj): Model\StorageFolder
    {
        $api = new Api\StorageFoldersApi;
        return $api->v30StorageFoldersPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\StorageFolder
     * @throws ApiException
     */
    public function retrieveStorageFolder(int $obj_id): Model\StorageFolder
    {
        $api = new Api\StorageFoldersApi;
        return $api->v30StorageFoldersObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\StorageFolder
     * @throws ApiException
     */
    public function updateStorageFolder(int $obj_id, Model\StorageFolder $obj): Model\StorageFolder
    {
        $api = new Api\StorageFoldersApi;
        return $api->v30StorageFoldersObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteStorageFolder(int $obj_id): null
    {
        $api = new Api\StorageFoldersApi;
        return $api->v30StorageFoldersObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param string $iban 
     * @return Model\IBANValidatorResponse
     * @throws ApiException
     */
    public function returnAJSONFileWithTheStatusOfTheIBAN(string $iban): Model\IBANValidatorResponse
    {
        $api = new Api\ToolsApi;
        return $api->v30IbanValidatorGet($iban);
    }

    /**
     * @generated
     * @param string $order 
     * @return Model\Webhook[]
     * @throws ApiException
     */
    public function listWebhooks(int $limit, ?string $order = null): array
    {
        $api = new Api\WebhooksApi;
        $callback = [$api, 'v30WebhooksGet'];
        return $this->depaginate($callback, $limit, $order);
    }

    /**
     * @generated
    
     * @return Model\Webhook
     * @throws ApiException
     */
    public function createWebhook(Model\Webhook $obj): Model\Webhook
    {
        $api = new Api\WebhooksApi;
        return $api->v30WebhooksPost($obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Webhook
     * @throws ApiException
     */
    public function retrieveWebhook(int $obj_id): Model\Webhook
    {
        $api = new Api\WebhooksApi;
        return $api->v30WebhooksObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Webhook
     * @throws ApiException
     */
    public function updateWebhook(int $obj_id, Model\Webhook $obj): Model\Webhook
    {
        $api = new Api\WebhooksApi;
        return $api->v30WebhooksObjIdPut($obj_id, $obj);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return null
     * @throws ApiException
     */
    public function deleteWebhook(int $obj_id): null
    {
        $api = new Api\WebhooksApi;
        return $api->v30WebhooksObjIdDelete($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string $period_filter Filter period on `requested_at`
     * @param string[] $status_code Filter by Status code
     * @param string $order 
     * @return Model\WebhookCall[]
     * @throws ApiException
     */
    public function listWebhookCalls(int $limit, int $obj_id, ?string $period_filter = null, ?array $status_code = null, ?string $order = null): array
    {
        $api = new Api\WebhooksApi;
        $callback = [$api, 'v30WebhooksObjIdCallsGet'];
        return $this->depaginate($callback, $limit, $obj_id, $period_filter, $status_code, $order);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string[] $website_id Filter by Website
     * @param string[] $template_id Filter by Template
     * @param string $order 
     * @return Model\Webpage[]
     * @throws ApiException
     */
    public function listWebpages(int $limit, ?string $published = null, ?array $website_id = null, ?array $template_id = null, ?string $order = null): array
    {
        $api = new Api\WebpagesApi;
        $callback = [$api, 'v30WebpagesGet'];
        return $this->depaginate($callback, $limit, $published, $website_id, $template_id, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\WebpageWithContent
     * @throws ApiException
     */
    public function retrieveWebpage(int $obj_id): Model\WebpageWithContent
    {
        $api = new Api\WebpagesApi;
        return $api->v30WebpagesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param string $published Filter on `published`
     * @param string[] $template_id Filter by Website template
     * @param string $order 
     * @return Model\Website[]
     * @throws ApiException
     */
    public function listWebsites(int $limit, ?string $published = null, ?array $template_id = null, ?string $order = null): array
    {
        $api = new Api\WebsitesApi;
        $callback = [$api, 'v30WebsitesGet'];
        return $this->depaginate($callback, $limit, $published, $template_id, $order);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @return Model\Website
     * @throws ApiException
     */
    public function retrieveWebsite(int $obj_id): Model\Website
    {
        $api = new Api\WebsitesApi;
        return $api->v30WebsitesObjIdGet($obj_id);
    }

    /**
     * @generated
     * @param int $obj_id 
     * @param string $published Filter on `published`
     * @param string[] $website_id Filter by Website
     * @param string[] $template_id Filter by Template
     * @param string $order 
     * @return Model\Webpage[]
     * @throws ApiException
     */
    public function listWebsiteWebpages(int $limit, int $obj_id, ?string $published = null, ?array $website_id = null, ?array $template_id = null, ?string $order = null): array
    {
        $api = new Api\WebsitesApi;
        $callback = [$api, 'v30WebsitesObjIdWebpagesGet'];
        return $this->depaginate($callback, $limit, $obj_id, $published, $website_id, $template_id, $order);
    }
}
