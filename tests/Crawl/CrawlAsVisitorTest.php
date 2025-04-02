<?php

namespace App\Tests\Crawl;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\TestWith;
use Survos\CrawlerBundle\Tests\BaseVisitLinksTest;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CrawlAsVisitorTest extends BaseVisitLinksTest
{
	#[TestDox('/$method $url ($route)')]
	#[TestWith(['', 'App\Entity\User', '/', 200])]
	#[TestWith(['', 'App\Entity\User', '/login', 200])]
	#[TestWith(['', 'App\Entity\User', '/questions/heads-below-a-loud-crash-now-who-did', 200])]
	#[TestWith(['', 'App\Entity\User', '/questions/alice-was-not-going-to-begin-with-and-being-so', 200])]
	#[TestWith(['', 'App\Entity\User', '/questions/queen-will-hear-you-you-see-she-came-upon-a', 200])]
	public function testRoute(string $username, string $userClassName, string $url, string|int|null $expected): void
	{
		parent::testWithLogin($username, $userClassName, $url, (int)$expected);
	}
}
