<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Chat\V2\Service;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class RoleList extends ListResource {
    /**
     * Construct the RoleList
     * 
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @return \Twilio\Rest\Chat\V2\Service\RoleList 
     */
    public function __construct(Version $version, $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
        );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Roles';
    }

    /**
     * Create a new RoleInstance
     * 
     * @param string $friendlyName The friendly_name
     * @param string $type The type
     * @param string $permission The permission
     * @return RoleInstance Newly created RoleInstance
     */
    public function create($friendlyName, $type, $permission) {
        $data = Values::of(array(
            'FriendlyName' => $friendlyName,
            'Type' => $type,
            'Permission' => $permission,
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new RoleInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid']
        );
    }

    /**
     * Streams RoleInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     * 
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request
     * @return \Twilio\Stream stream of results
     */
    public function stream($limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads RoleInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request
     * @return RoleInstance[] Array of results
     */
    public function read($limit = null, $pageSize = null) {
        return iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of RoleInstance records from the API.
     * Request is executed immediately
     * 
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of RoleInstance
     */
    public function page($pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $params = Values::of(array(
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new RolePage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a RoleContext
     * 
     * @param string $sid The sid
     * @return \Twilio\Rest\Chat\V2\Service\RoleContext 
     */
    public function getContext($sid) {
        return new RoleContext(
            $this->version,
            $this->solution['serviceSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Chat.V2.RoleList]';
    }
}