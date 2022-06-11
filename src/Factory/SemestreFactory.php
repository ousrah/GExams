<?php

namespace App\Factory;

use App\Entity\Semestre;
use App\Repository\SemestreRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Semestre>
 *
 * @method static Semestre|Proxy createOne(array $attributes = [])
 * @method static Semestre[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Semestre|Proxy find(object|array|mixed $criteria)
 * @method static Semestre|Proxy findOrCreate(array $attributes)
 * @method static Semestre|Proxy first(string $sortedField = 'id')
 * @method static Semestre|Proxy last(string $sortedField = 'id')
 * @method static Semestre|Proxy random(array $attributes = [])
 * @method static Semestre|Proxy randomOrCreate(array $attributes = [])
 * @method static Semestre[]|Proxy[] all()
 * @method static Semestre[]|Proxy[] findBy(array $attributes)
 * @method static Semestre[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Semestre[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SemestreRepository|RepositoryProxy repository()
 * @method Semestre|Proxy create(array|callable $attributes = [])
 */
final class SemestreFactory extends ModelFactory
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
            // ->afterInstantiate(function(Semestre $semestre): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Semestre::class;
    }
}
