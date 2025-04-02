<?php

namespace App\Factory;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\Persistence\RepositoryDecorator;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Persistence\Proxy;

/**
 * @method \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy create(array|callable $attributes = [])
 * @method static \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy createOne(array $attributes = [])
 * @method static \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy find(object|array|mixed $criteria)
 * @method static \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy findOrCreate(array $attributes)
 * @method static \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy first(string $sortedField = 'id')
 * @method static \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy last(string $sortedField = 'id')
 * @method static \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy random(array $attributes = [])
 * @method static \App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy randomOrCreate(array $attributes = [])
 * @method static \App\Entity\User[]|\Zenstruck\Foundry\Persistence\Proxy[] all()
 * @method static \App\Entity\User[]|\Zenstruck\Foundry\Persistence\Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static \App\Entity\User[]|\Zenstruck\Foundry\Persistence\Proxy[] createSequence(iterable|callable $sequence)
 * @method static \App\Entity\User[]|\Zenstruck\Foundry\Persistence\Proxy[] findBy(array $attributes)
 * @method static \App\Entity\User[]|\Zenstruck\Foundry\Persistence\Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static \App\Entity\User[]|\Zenstruck\Foundry\Persistence\Proxy[] randomSet(int $number, array $attributes = [])
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy> many(int $min, int|null $max = null)
 * @method \Zenstruck\Foundry\FactoryCollection<\App\Entity\User|\Zenstruck\Foundry\Persistence\Proxy> sequence(iterable|callable $sequence)
 * @method static \Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator<\App\Entity\User, \App\Repository\UserRepository> repository()
 *
 * @phpstan-method \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> create(array|callable $attributes = [])
 * @phpstan-method static \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> createOne(array $attributes = [])
 * @phpstan-method static \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> find(object|array|mixed $criteria)
 * @phpstan-method static \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> findOrCreate(array $attributes)
 * @phpstan-method static \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> first(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> last(string $sortedField = 'id')
 * @phpstan-method static \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> random(array $attributes = [])
 * @phpstan-method static \App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User> randomOrCreate(array $attributes = [])
 * @phpstan-method static list<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> all()
 * @phpstan-method static list<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> findBy(array $attributes)
 * @phpstan-method static list<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> randomSet(int $number, array $attributes = [])
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> many(int $min, int|null $max = null)
 * @phpstan-method \Zenstruck\Foundry\FactoryCollection<\App\Entity\User&\Zenstruck\Foundry\Persistence\Proxy<\App\Entity\User>> sequence(iterable|callable $sequence)
 * @extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory<\App\Entity\User>
 */
final class UserFactory extends \Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory
{
    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();
    }

    public function promoteRole(string $role): self
    {
        $defaults = $this->defaults();

        $roles = array_merge($defaults['roles'], [
            $role
        ]);

        return $this->with([
            'roles' => $roles,
        ]);
    }

    protected function defaults(): array
    {
        return [
            // add your default values here (https://github.com/zenstruck/foundry#model-factories)
            'email' => self::faker()->email(),
            'roles' => [
                'ROLE_USER',
            ],
            'plainPassword' => 'userpass',
            'firstName' => self::faker()->firstName(),
            'lastName' => self::faker()->lastName(),
            'avatar' => 'default.png',
        ];
    }

    #[\Override]
    protected function initialize(): static
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
             ->afterInstantiate(function(User $user): void {
                 $hashedPassword = $this->passwordHasher
                     ->hashPassword($user, $user->getPlainPassword());

                 $user->setPassword($hashedPassword);

                 $fs = new Filesystem();
                 $newAvatarFilename = self::faker()->slug(2).'.png';
                 $fs->copy(
                     __DIR__.'/../../assets/images/'.$user->getAvatar(),
                     __DIR__.'/../../public/uploads/avatars/'.$newAvatarFilename
                 );
                 $user->setAvatar($newAvatarFilename);
             });
    }

    public static function class(): string
    {
        return User::class;
    }
}
