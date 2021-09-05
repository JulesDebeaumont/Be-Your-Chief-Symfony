<?php

namespace App\Factory;

use App\Entity\Schedule;
use App\Repository\ScheduleRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static         Schedule|Proxy createOne(array $attributes = [])
 * @method static         Schedule[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static         Schedule|Proxy find($criteria)
 * @method static         Schedule|Proxy findOrCreate(array $attributes)
 * @method static         Schedule|Proxy first(string $sortedField = 'id')
 * @method static         Schedule|Proxy last(string $sortedField = 'id')
 * @method static         Schedule|Proxy random(array $attributes = [])
 * @method static         Schedule|Proxy randomOrCreate(array $attributes = [])
 * @method static         Schedule[]|Proxy[] all()
 * @method static         Schedule[]|Proxy[] findBy(array $attributes)
 * @method static         Schedule[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static         Schedule[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static         ScheduleRepository|RepositoryProxy repository()
 * @method Schedule|Proxy create($attributes = [])
 */
final class ScheduleFactory extends ModelFactory
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
            // ->afterInstantiate(function(Schedule $schedule) {})
        ;
    }

    protected static function getClass(): string
    {
        return Schedule::class;
    }
}
