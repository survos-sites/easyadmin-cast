<?php

namespace App\Factory;

use App\Entity\Answer;
use App\Repository\AnswerRepository;
use Zenstruck\Foundry\Persistence\RepositoryDecorator;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Persistence\Proxy;

/**
 * @method \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy create(array|callable $attributes = [])
 * @method static \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy createOne(array $attributes = [])
 * @method static \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy find(object|array|mixed $criteria)
 * @method static \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy findOrCreate(array $attributes)
 * @method static \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy first(string $sortedField = 'id')
 * @method static \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy last(string $sortedField = 'id')
 * @method static \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy random(array $attributes = [])
 * @method static \App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy randomOrCreate(array $attributes = [])
 * @method static \App\Entity\Answer[]|\Zenstruck\Foundry\Persistence\Proxy[] all()
 * @method static \App\Entity\Answer[]|\Zenstruck\Foundry\Persistence\Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static \App\Entity\Answer[]|\Zenstruck\Foundry\Persistence\Proxy[] createSequence(iterable|callable $sequence)
 * @method static \App\Entity\Answer[]|\Zenstruck\Foundry\Persistence\Proxy[] findBy(array $attributes)
 * @method static \App\Entity\Answer[]|\Zenstruck\Foundry\Persistence\Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static \App\Entity\Answer[]|\Zenstruck\Foundry\Persistence\Proxy[] randomSet(int $number, array $attributes = [])
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy> many(int $min, int|null $max = null)
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Answer|\Zenstruck\Foundry\Persistence\Proxy> sequence(iterable|callable $sequence)
 * @method static \Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator<\App\Entity\Answer, \App\Repository\AnswerRepository> repository()
 *
 * @phpstan-method \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> create(array|callable $attributes = [])
 * @phpstan-method static \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> createOne(array $attributes = [])
 * @phpstan-method static \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> find(object|array|mixed $criteria)
 * @phpstan-method static \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> findOrCreate(array $attributes)
 * @phpstan-method static \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> first(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> last(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> random(array $attributes = [])
 * @phpstan-method static \App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer> randomOrCreate(array $attributes = [])
 * @phpstan-method static list<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> all()
 * @phpstan-method static list<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> findBy(array $attributes)
 * @phpstan-method static list<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> randomSet(int $number, array $attributes = [])
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> many(int $min, int|null $max = null)
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Answer&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Answer>> sequence(iterable|callable $sequence)
 * @extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory<\App\Entity\Answer>
 */
final class AnswerFactory extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory
{
    protected function defaults(): array
    {
        return [
            'answer' => self::faker()->sentence(),
            'question' => QuestionFactory::random(),
            'createdAt' => self::faker()->dateTimeBetween('-100 days', '-1 minute'),
            'answeredBy' => UserFactory::random(),
            'votes' => random_int(-5, 10),
        ];
    }

    #[\Override]
    protected function initialize(): static
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Answer $answer) {})
        ;
    }

    public static function class(): string
    {
        return Answer::class;
    }
}
