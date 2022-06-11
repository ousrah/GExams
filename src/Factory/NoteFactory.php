<?php

namespace App\Factory;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Note>
 *
 * @method static Note|Proxy createOne(array $attributes = [])
 * @method static Note[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Note|Proxy find(object|array|mixed $criteria)
 * @method static Note|Proxy findOrCreate(array $attributes)
 * @method static Note|Proxy first(string $sortedField = 'id')
 * @method static Note|Proxy last(string $sortedField = 'id')
 * @method static Note|Proxy random(array $attributes = [])
 * @method static Note|Proxy randomOrCreate(array $attributes = [])
 * @method static Note[]|Proxy[] all()
 * @method static Note[]|Proxy[] findBy(array $attributes)
 * @method static Note[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Note[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static NoteRepository|RepositoryProxy repository()
 * @method Note|Proxy create(array|callable $attributes = [])
 */
final class NoteFactory extends ModelFactory
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
            'note' => self::faker()->randomFloat(),
            'observation' => self::faker()->realtext(50),
            'etudiant' => EtudiantFactory::randomOrCreate(),  
            'module' => ModuleFactory::randomOrCreate(),  
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Note $note): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Note::class;
    }
}
