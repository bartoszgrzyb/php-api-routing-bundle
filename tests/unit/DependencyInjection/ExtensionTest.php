<?php declare(strict_types=1);
/*
 * This file is part of the KleijnWeb\PhpApi\RoutingBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KleijnWeb\PhpApi\RoutingBundle\Tests\DependencyInjection;

use KleijnWeb\PhpApi\RoutingBundle\DependencyInjection\PhpApiRoutingExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use PHPUnit\Framework\TestCase;

class ExtensionTest extends TestCase
{
    /**
     * @var PhpApiRoutingExtension
     */
    protected $extension;

    protected function setUp(): void
    {
        $this->extension = new PhpApiRoutingExtension();
    }

    /**
     * @test
     */
    public function hasRouteLoaderTag()
    {
        $container = new ContainerBuilder();
        $this->extension->load([], $container);
        $this->assertTrue($container->hasDefinition('openapi.route_loader'));
        $routeLoader = $container->getDefinition('openapi.route_loader');
        $this->assertSame([[]], $routeLoader->getTag('routing.loader'));
    }

    /**
     * @test
     */
    public function hasAlias()
    {
        $this->assertSame('api_routing', $this->extension->getAlias());
    }
}
