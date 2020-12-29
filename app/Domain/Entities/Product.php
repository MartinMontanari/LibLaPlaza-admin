<?php


namespace App\Domain\Entities;


use Illuminate\Database\Eloquent\Model;
use Money\Currency;
use Money\Money;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Money
     */
    public function getPrice(): Money
    {
        return new Money($this->price_amount, new Currency($this->price_currency));
    }

    /**
     * @param int $price
     */
    public function setPrice(Money $price): void
    {
        $this->price_amount = $price->getAmount();
        $this->price_currency = $price->getCurrency()->getCode();
    }

    /**
     * @return Provider
     */
    public function getProvider() : Provider
    {
        return $this->provider;
    }

    /**
     * @param int $provider_id
     */
    public function setProviderId(int $provider_id): void
    {
        $this->provider_id = $provider_id;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

}
