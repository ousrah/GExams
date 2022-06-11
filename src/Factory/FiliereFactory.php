<?php

namespace App\Factory;

use App\Entity\Filiere;
use App\Repository\FiliereRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Filiere>
 *
 * @method static Filiere|Proxy createOne(array $attributes = [])
 * @method static Filiere[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Filiere|Proxy find(object|array|mixed $criteria)
 * @method static Filiere|Proxy findOrCreate(array $attributes)
 * @method static Filiere|Proxy first(string $sortedField = 'id')
 * @method static Filiere|Proxy last(string $sortedField = 'id')
 * @method static Filiere|Proxy random(array $attributes = [])
 * @method static Filiere|Proxy randomOrCreate(array $attributes = [])
 * @method static Filiere[]|Proxy[] all()
 * @method static Filiere[]|Proxy[] findBy(array $attributes)
 * @method static Filiere[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Filiere[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static FiliereRepository|RepositoryProxy repository()
 * @method Filiere|Proxy create(array|callable $attributes = [])
 */
final class FiliereFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'nom' => self::faker()->realtext(10),
            
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Filiere $filiere): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Filiere::class;
    }
}
