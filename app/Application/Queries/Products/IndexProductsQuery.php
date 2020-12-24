<?php


namespace App\Application\Queries\Products;


class IndexProductsQuery
{
    private ?int $page;
    private ?int $size;

    /**
     * IndexProvidersQuery constructor.
     * @param int|null $page
     * @param int|null $size
     */
    public function __construct(?int $page, ?int $size)
    {
        $this->page = $page;
        $this->size = $size;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

}
