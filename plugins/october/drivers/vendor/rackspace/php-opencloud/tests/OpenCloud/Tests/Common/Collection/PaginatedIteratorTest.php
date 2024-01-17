<?php
/**
 * Copyright 2012-2014 Rackspace US, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace OpenCloud\Tests\Common\Collection;

use OpenCloud\Common\Collection\PaginatedIterator;
use OpenCloud\Tests\OpenCloudTestCase;

class PaginatedIteratorTest extends OpenCloudTestCase
{
    public function setupObjects()
    {
        $this->service = $this->getClient()->computeService();
    }

    /**
     * @mockFile Flavor_List
     * @mockPath Compute
     */
    public function test_Factory()
    {
        $iterator = PaginatedIterator::factory($this->service, array(
            'resourceClass'  => 'Flavor',
            'baseUrl'        => $this->service->getUrl('flavors'),
            'key.collection' => 'flavors',
            'key.marker'     => 'id'
        ));

        $iterator->setOption('linksKey', 'flavors_key');
        $this->assertEquals('flavors_key', $iterator->getOption('linksKey'));

        $item = $iterator->getElement(0);

        $this->assertInstanceOf('OpenCloud\Compute\Resource\Flavor', $item);
        $this->assertEquals('512MB Standard Instance', $item->getName());
        $this->assertEquals(16, $iterator->count());
    }

    /**
     * @mockFile Flavor_List
     * @mockPath Compute
     */
    public function test_Iterations()
    {
        $iterator = PaginatedIterator::factory($this->service, array(
            'resourceClass'  => 'Flavor',
            'key.collection' => 'flavors',
            'key.marker'     => 'id',
            'baseUrl'        => $this->service->getUrl('flavors'),
        ));

        $i = 0;

        foreach ($iterator as $val) {
            $i++;
        }

        $j = 0;

        $iterator->rewind();

        while ($iterator->valid()) {
            $j++;
            $iterator->next();
            $this->assertEquals($j, $iterator->key());
        }

        $this->assertEquals($i, $j);
        $this->assertGreaterThan(0, $i);
        $this->assertGreaterThan(0, $j);
    }

    /**
     * @mockFile Flavor_List
     * @mockPath Compute
     */
    public function test_Functions()
    {
        $iterator = PaginatedIterator::factory($this->service, array(
            'resourceClass'  => 'Flavor',
            'key.collection' => 'flavors',
            'key.marker'     => 'id',
            'limit.total'    => 2,
            'baseUrl'        => $this->service->getUrl('flavors'),
        ));

        while ($iterator->valid()) {
            $this->assertInstanceOf('OpenCloud\Compute\Resource\Flavor', $iterator->current());
            $this->assertInstanceOf('stdClass', $iterator->currentElement());
            $iterator->next();
        }
    }

    /**
     * @expectedException OpenCloud\Common\Exceptions\InvalidArgumentError
     */
    public function test_Missing_Options()
    {
        PaginatedIterator::factory($this->service, array());
    }

    public function test_Labelled_Elements()
    {
        $response = $this->makeResponse('{"keypairs":[{"keypair":{"fingerprint":"15:b0:f8:b3:f9:48:63:71:cf:7b:5b:38:6d:44:2d:4a","name":"name_of_keypair-601a2305-4f25-41ed-89c6-2a966fc8027a","public_key":"ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAAAgQC+Eo/RZRngaGTkFs7I62ZjsIlO79KklKbMXi8F+KITD4bVQHHn+kV+4gRgkgCRbdoDqoGfpaDFs877DYX9n4z6FrAIZ4PES8TNKhatifpn9NdQYWA+IkU8CuvlEKGuFpKRi/k7JLos/gHi2hy7QUwgtRvcefvD/vgQZOVw/mGR9Q== Generated by Nova\n"}}]}');
        $this->addMockSubscriber($response);

        $iterator = PaginatedIterator::factory($this->service, array(
            'resourceClass'         => 'KeyPair',
            'key.collection'        => 'keypairs',
            'key.collectionElement' => 'keypair',
            'baseUrl'               => $this->service->getUrl('os-keypairs')
        ));

        $i = 0;

        while ($iterator->valid()) {
            $i++;
            $iterator->next();
        }

        $iterator->rewind();

        $iterator->populateAll();
        $this->assertEquals($i, $iterator->key());
    }

    /**
     * @mockFile Group_List
     * @mockPath Autoscale
     */
    public function test_Links()
    {
        $service = $this->getClient()->autoscaleService();

        $iterator = PaginatedIterator::factory($service, array(
            'resourceClass'  => 'Group',
            'key.collection' => 'groups',
            'key.links'      => 'groups_links',
            'baseUrl'        => $service->getUrl('groups'),
        ));

        $iterator->populateAll();

        $this->assertInstanceOf('OpenCloud\Autoscale\Resource\Group', $iterator->getElement(1));
    }
}