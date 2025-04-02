<?php

namespace App\Factory;

use App\Entity\Topic;
use App\Repository\TopicRepository;
use Zenstruck\Foundry\Persistence\RepositoryDecorator;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Persistence\Proxy;

/**
 * @method \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy create(array|callable $attributes = [])
 * @method static \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy createOne(array $attributes = [])
 * @method static \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy find(object|array|mixed $criteria)
 * @method static \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy findOrCreate(array $attributes)
 * @method static \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy first(string $sortedField = 'id')
 * @method static \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy last(string $sortedField = 'id')
 * @method static \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy random(array $attributes = [])
 * @method static \App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy randomOrCreate(array $attributes = [])
 * @method static \App\Entity\Topic[]|\Zenstruck\Foundry\Persistence\Proxy[] all()
 * @method static \App\Entity\Topic[]|\Zenstruck\Foundry\Persistence\Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static \App\Entity\Topic[]|\Zenstruck\Foundry\Persistence\Proxy[] createSequence(iterable|callable $sequence)
 * @method static \App\Entity\Topic[]|\Zenstruck\Foundry\Persistence\Proxy[] findBy(array $attributes)
 * @method static \App\Entity\Topic[]|\Zenstruck\Foundry\Persistence\Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static \App\Entity\Topic[]|\Zenstruck\Foundry\Persistence\Proxy[] randomSet(int $number, array $attributes = [])
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy> many(int $min, int|null $max = null)
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Topic|\Zenstruck\Foundry\Persistence\Proxy> sequence(iterable|callable $sequence)
 * @method static \Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator<\App\Entity\Topic, \App\Repository\TopicRepository> repository()
 *
 * @phpstan-method \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> create(array|callable $attributes = [])
 * @phpstan-method static \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> createOne(array $attributes = [])
 * @phpstan-method static \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> find(object|array|mixed $criteria)
 * @phpstan-method static \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> findOrCreate(array $attributes)
 * @phpstan-method static \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> first(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> last(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> random(array $attributes = [])
 * @phpstan-method static \App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic> randomOrCreate(array $attributes = [])
 * @phpstan-method static list<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> all()
 * @phpstan-method static list<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> findBy(array $attributes)
 * @phpstan-method static list<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> randomSet(int $number, array $attributes = [])
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> many(int $min, int|null $max = null)
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Topic&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Topic>> sequence(iterable|callable $sequence)
 * @extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory<\App\Entity\Topic>
 */
final class TopicFactory extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory
{
    protected function defaults(): array
    {
        return [
            'name' => ucfirst(self::faker()->words(3, true)),
        ];
    }

    #[\Override]
    protected function initialize(): static
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Topic $topic) {})
        ;
    }

    public static function class(): string
    {
        return Topic::class;
    }
}
