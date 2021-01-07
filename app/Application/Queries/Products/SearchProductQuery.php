<?php


namespace App\Application\Queries\Products;


class SearchProductQuery
{
    private ?string $search;

    /**
     * SearchProductQuery constructor.
     * @param ?string $search
     */
    public function __construct(?string $search)
    {
        $this->search = $search;
    }

    /**
     * @return string|null
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

}
