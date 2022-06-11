<?php

namespace App\Factory;

use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Etudiant>
 *
 * @method static Etudiant|Proxy createOne(array $attributes = [])
 * @method static Etudiant[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Etudiant|Proxy find(object|array|mixed $criteria)
 * @method static Etudiant|Proxy findOrCreate(array $attributes)
 * @method static Etudiant|Proxy first(string $sortedField = 'id')
 * @method static Etudiant|Proxy last(string $sortedField = 'id')
 * @method static Etudiant|Proxy random(array $attributes = [])
 * @method static Etudiant|Proxy randomOrCreate(array $attributes = [])
 * @method static Etudiant[]|Proxy[] all()
 * @method static Etudiant[]|Proxy[] findBy(array $attributes)
 * @method static Etudiant[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Etudiant[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static EtudiantRepository|RepositoryProxy repository()
 * @method Etudiant|Proxy create(array|callable $attributes = [])
 */
final class EtudiantFactory extends ModelFactory
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
            'nom' => self::faker()->lastname(),
            'prenom' => self::faker()->firstname(),
            'adresse' => self::faker()->address(),
            'cne' => self::faker()->realtext(10),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Etudiant $etudiant): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Etudiant::class;
    }
}
