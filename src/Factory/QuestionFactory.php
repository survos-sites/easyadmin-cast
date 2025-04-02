<?php

namespace App\Factory;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Zenstruck\Foundry\Persistence\RepositoryDecorator;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Persistence\Proxy;

/**
 * @method \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy create(array|callable $attributes = [])
 * @method static \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy createOne(array $attributes = [])
 * @method static \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy find(object|array|mixed $criteria)
 * @method static \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy findOrCreate(array $attributes)
 * @method static \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy first(string $sortedField = 'id')
 * @method static \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy last(string $sortedField = 'id')
 * @method static \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy random(array $attributes = [])
 * @method static \App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy randomOrCreate(array $attributes = [])
 * @method static \App\Entity\Question[]|\Zenstruck\Foundry\Persistence\Proxy[] all()
 * @method static \App\Entity\Question[]|\Zenstruck\Foundry\Persistence\Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static \App\Entity\Question[]|\Zenstruck\Foundry\Persistence\Proxy[] createSequence(iterable|callable $sequence)
 * @method static \App\Entity\Question[]|\Zenstruck\Foundry\Persistence\Proxy[] findBy(array $attributes)
 * @method static \App\Entity\Question[]|\Zenstruck\Foundry\Persistence\Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static \App\Entity\Question[]|\Zenstruck\Foundry\Persistence\Proxy[] randomSet(int $number, array $attributes = [])
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy> many(int $min, int|null $max = null)
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Question|\Zenstruck\Foundry\Persistence\Proxy> sequence(iterable|callable $sequence)
 * @method static \Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator<\App\Entity\Question, \App\Repository\QuestionRepository> repository()
 *
 * @phpstan-method \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> create(array|callable $attributes = [])
 * @phpstan-method static \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> createOne(array $attributes = [])
 * @phpstan-method static \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> find(object|array|mixed $criteria)
 * @phpstan-method static \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> findOrCreate(array $attributes)
 * @phpstan-method static \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> first(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> last(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> random(array $attributes = [])
 * @phpstan-method static \App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question> randomOrCreate(array $attributes = [])
 * @phpstan-method static list<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> all()
 * @phpstan-method static list<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> findBy(array $attributes)
 * @phpstan-method static list<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> randomSet(int $number, array $attributes = [])
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> many(int $min, int|null $max = null)
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\Question&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\Question>> sequence(iterable|callable $sequence)
 * @extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory<\App\Entity\Question>
 */
final class QuestionFactory extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory
{
    public function unpublished(): self
    {
        return $this->with(['isApproved' => false]);
    }

    protected function defaults(): array
    {
        return [
            'name' => self::faker()->realText(50),
            'question' => self::faker()->paragraphs(
                self::faker()->numberBetween(1, 4),
                true
            ),
            'createdAt' => self::faker()->dateTimeBetween('-100 days', '-1 minute'),
            'askedBy' => UserFactory::random(),
            'votes' => random_int(-20, 50),
            'topic' => TopicFactory::random(),
            'isApproved' => true,
        ];
    }

    #[\Override]
    protected function initialize(): static
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            //->afterInstantiate(function(Question $question) { });
        ;
    }

    public static function class(): string
    {
        return Question::class;
    }
}
