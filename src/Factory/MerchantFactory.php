<?php

namespace App\Factory;

use App\Entity\Merchant;
use App\Repository\MerchantRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static         Merchant|Proxy createOne(array $attributes = [])
 * @method static         Merchant[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static         Merchant|Proxy find($criteria)
 * @method static         Merchant|Proxy findOrCreate(array $attributes)
 * @method static         Merchant|Proxy first(string $sortedField = 'id')
 * @method static         Merchant|Proxy last(string $sortedField = 'id')
 * @method static         Merchant|Proxy random(array $attributes = [])
 * @method static         Merchant|Proxy randomOrCreate(array $attributes = [])
 * @method static         Merchant[]|Proxy[] all()
 * @method static         Merchant[]|Proxy[] findBy(array $attributes)
 * @method static         Merchant[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static         Merchant[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static         MerchantRepository|RepositoryProxy repository()
 * @method Merchant|Proxy create($attributes = [])
 */
final class MerchantFactory extends ModelFactory
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        parent::__construct();

        $this->passwordEncoder = $passwordEncoder;
    }

    protected function getDefaults(): array
    {
        return [
        ];
    }

    protected function initialize(): self
    {
        return $this->afterInstantiate(function (Merchant $merchant) {
            $merchant->setPassword($this->passwordEncoder->encodePassword($merchant, $merchant->getPassword()));
        })
            ;
    }

    protected static function getClass(): string
    {
        return Merchant::class;
    }
}
