<?php

namespace App\Factory;

use App\Entity\Step;
use App\Repository\StepRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static     Step|Proxy createOne(array $attributes = [])
 * @method static     Step[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static     Step|Proxy find($criteria)
 * @method static     Step|Proxy findOrCreate(array $attributes)
 * @method static     Step|Proxy first(string $sortedField = 'id')
 * @method static     Step|Proxy last(string $sortedField = 'id')
 * @method static     Step|Proxy random(array $attributes = [])
 * @method static     Step|Proxy randomOrCreate(array $attributes = [])
 * @method static     Step[]|Proxy[] all()
 * @method static     Step[]|Proxy[] findBy(array $attributes)
 * @method static     Step[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static     Step[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static     StepRepository|RepositoryProxy repository()
 * @method Step|Proxy create($attributes = [])
 */
final class StepFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Step $step) {})
        ;
    }

    protected static function getClass(): string
    {
        return Step::class;
    }
}
