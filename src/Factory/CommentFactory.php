<?php

namespace App\Factory;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static        Comment|Proxy createOne(array $attributes = [])
 * @method static        Comment[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static        Comment|Proxy find($criteria)
 * @method static        Comment|Proxy findOrCreate(array $attributes)
 * @method static        Comment|Proxy first(string $sortedField = 'id')
 * @method static        Comment|Proxy last(string $sortedField = 'id')
 * @method static        Comment|Proxy random(array $attributes = [])
 * @method static        Comment|Proxy randomOrCreate(array $attributes = [])
 * @method static        Comment[]|Proxy[] all()
 * @method static        Comment[]|Proxy[] findBy(array $attributes)
 * @method static        Comment[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static        Comment[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static        CommentRepository|RepositoryProxy repository()
 * @method Comment|Proxy create($attributes = [])
 */
final class CommentFactory extends ModelFactory
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
            // ->afterInstantiate(function(Comment $comment) {})
        ;
    }

    protected static function getClass(): string
    {
        return Comment::class;
    }
}
