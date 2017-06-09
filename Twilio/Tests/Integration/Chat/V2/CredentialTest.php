<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Chat\V2;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CredentialTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->chat->v2->credentials->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://chat.twilio.com/v2/Credentials'
        ));
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "credentials": [
                    {
                        "sid": "CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "Test slow create",
                        "type": "apn",
                        "sandbox": "False",
                        "date_created": "2015-10-07T17:50:01Z",
                        "date_updated": "2015-10-07T17:50:01Z",
                        "url": "https://chat.twilio.com/v2/Credentials/CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                    }
                ],
                "meta": {
                    "page": 0,
                    "count": 1,
                    "page_size": 1,
                    "first_page_url": "https://chat.twilio.com/v2/Credentials?PageSize=1&Page=0",
                    "previous_page_url": null,
                    "url": "https://chat.twilio.com/v2/Credentials?PageSize=1&Page=0",
                    "next_page_url": null,
                    "key": "credentials"
                }
            }
            '
        ));

        $actual = $this->twilio->chat->v2->credentials->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "credentials": [],
                "meta": {
                    "page": 0,
                    "count": 0,
                    "page_size": 1,
                    "first_page_url": "https://chat.twilio.com/v2/Credentials?PageSize=1&Page=0",
                    "previous_page_url": null,
                    "url": "https://chat.twilio.com/v2/Credentials?PageSize=1&Page=0",
                    "next_page_url": null,
                    "key": "credentials"
                }
            }
            '
        ));

        $actual = $this->twilio->chat->v2->credentials->read();

        $this->assertNotNull($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->chat->v2->credentials->create("gcm");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array(
            'Type' => "gcm",
        );

        $this->assertRequest(new Request(
            'post',
            'https://chat.twilio.com/v2/Credentials',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "Test slow create",
                "type": "apn",
                "sandbox": "False",
                "date_created": "2015-10-07T17:50:01Z",
                "date_updated": "2015-10-07T17:50:01Z",
                "url": "https://chat.twilio.com/v2/Credentials/CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->chat->v2->credentials->create("gcm");

        $this->assertNotNull($actual);
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->chat->v2->credentials("CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://chat.twilio.com/v2/Credentials/CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "Test slow create",
                "type": "apn",
                "sandbox": "False",
                "date_created": "2015-10-07T17:50:01Z",
                "date_updated": "2015-10-07T17:50:01Z",
                "url": "https://chat.twilio.com/v2/Credentials/CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->chat->v2->credentials("CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->chat->v2->credentials("CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://chat.twilio.com/v2/Credentials/CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "Test slow create",
                "type": "apn",
                "sandbox": "False",
                "date_created": "2015-10-07T17:50:01Z",
                "date_updated": "2015-10-07T17:50:01Z",
                "url": "https://chat.twilio.com/v2/Credentials/CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
            }
            '
        ));

        $actual = $this->twilio->chat->v2->credentials("CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->chat->v2->credentials("CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://chat.twilio.com/v2/Credentials/CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->chat->v2->credentials("CRaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }
}