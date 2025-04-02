<?php

namespace App\Tests;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\TestWith;
use Pierstoval\SmokeTesting\FunctionalSmokeTester;
use Pierstoval\SmokeTesting\FunctionalTestData;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTest extends WebTestCase
{
    use FunctionalSmokeTester;

    #[TestWith(['GET', '/crawler/crawlerdata', 'survos_crawler_data'])]
    #[TestWith(['GET', '/admin', 'admin'])]
    #[TestWith(['GET', '/profile/show', 'app_profile_show'])]
    #[TestWith(['GET', '/', 'app_homepage'])]
    #[TestWith(['GET', '/questions/new', 'app_question_new'])]
    #[TestWith(['GET', '/login', 'app_login'])]
    #[TestWith(['GET', '/logout', 'app_logout'])]
    #[TestDox('$method $url ($route)')]
    public function testRoute(string $method, string $url, string $route): void
    {
        $this->runFunctionalTest(
            FunctionalTestData::withUrl($url)
                ->withMethod($method)
                ->expectRouteName($route)
                ->appendCallableExpectation($this->assertStatusCodeLessThan500($method, $url))
        );
    }

    public function assertStatusCodeLessThan500(string $method, string $url): \Closure
    {
        return static function (KernelBrowser $browser) use ($method, $url) {
            $statusCode = $browser->getResponse()->getStatusCode();
            $routeName = $browser->getRequest()->attributes->get('_route', 'unknown');

            static::assertLessThan(
                500,
                $statusCode,
                sprintf('Request "%s %s" for %s route returned an internal error.', $method, $url, $routeName),
            );
        };
    }
}
