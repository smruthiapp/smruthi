<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Numbers
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Numbers\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Version;


class PortingPortInList extends ListResource
    {
    /**
     * Construct the PortingPortInList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(
        Version $version
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        ];

        $this->uri = '/Porting/PortIn';
    }

    /**
     * Create the PortingPortInInstance
     *
     * @return PortingPortInInstance Created PortingPortInInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(): PortingPortInInstance
    {

        $data = $body->toArray();
        $headers['Content-Type'] = 'application/json';
        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new PortingPortInInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Constructs a PortingPortInContext
     *
     * @param string $portInRequestSid The SID of the Port In request. This is a unique identifier of the port in request.
     */
    public function getContext(
        string $portInRequestSid
        
    ): PortingPortInContext
    {
        return new PortingPortInContext(
            $this->version,
            $portInRequestSid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Numbers.V1.PortingPortInList]';
    }
}
