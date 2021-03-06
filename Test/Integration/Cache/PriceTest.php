<?php

namespace MageSuite\ProductTile\Test\Integration\Cache;

class PriceTest extends AbstractCacheTest
{
    /**
     * @var \MageSuite\ProductTile\Cache\Price
     */
    protected $priceCacheKeyGenerator;

    public function setUp()
    {
        parent::setUp();

        $this->priceCacheKeyGenerator = $this->objectManager->create(\MageSuite\ProductTile\Cache\Price::class);
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture Magento/Catalog/_files/product_special_price.php
     */
    public function testItReturnsPriceRelatedCacheKeyItems()
    {
       $fragment = $this->getFragmentByProduct('simple');

        $result = $this->priceCacheKeyGenerator->getCacheKeyInfo($fragment);

        $expected = [
            0 => '5.9900',
            1 => '1',
            2 => 'USD',
            3 => 0,
            4 => 'grid'
        ];

        $this->assertEquals($expected, $result);
    }
}