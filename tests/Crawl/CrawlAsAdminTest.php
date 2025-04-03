<?php

namespace App\Tests\Crawl;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\TestWith;
use Survos\CrawlerBundle\Tests\BaseVisitLinksTest;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CrawlAsAdminTest extends BaseVisitLinksTest
{
	#[TestDox('/$method $url ($route)')]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/admin', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/profile/show', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/questions/was-kindly-permitted-to-pocket-the-spoon-while', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/questions/alices-right-foot-esq-hearthrug-near-the', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/questions/queens-hedgehog-just-now-only-it-ran-away-when', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/topic', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/user', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/questions/can-all-that-green-stuff-be-said-alice-ive', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/questions/alice-could-only-see-her-she-is-such-a-thing', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/questions/alice-had-got-burnt-and-eaten-up-by-a-very', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', '/questions/alice-but-she-thought-it-would-feel-very-sleepy', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/new', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=1&sort%5Bid%5D=ASC', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=1&sort%5Banswer%5D=DESC', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=1&sort%5Bvotes%5D=DESC', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=1&sort%5BansweredBy%5D=DESC', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=1&sort%5BcreatedAt%5D=DESC', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/user/38', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/1000', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/1000/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/user/40', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/999', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/999/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/user/39', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/998', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/998/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/user/37', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/997', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/997/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/996', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/996/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/995', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/995/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/994', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/994/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/993', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/993/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/992', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/992/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/991', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/991/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/990', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/990/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/989', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/989/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/988', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/988/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/987', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/987/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/986', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/986/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/985', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/985/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/984', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/984/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/983', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/983/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/982', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/982/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/981', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer/981/edit', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=1', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=2', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=3', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=4', 200])]
	#[TestWith(['admin@example.com', 'App\Entity\User', 'admin/answer?page=5', 200])]
	public function testRoute(string $username, string $userClassName, string $url, string|int|null $expected): void
	{
		parent::testWithLogin($username, $userClassName, $url, (int)$expected);
	}
}
