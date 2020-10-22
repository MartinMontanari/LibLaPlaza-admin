<?php


namespace App\Application\Queries\Categories;


class IndexCategoryQuery
{
    private int $page;
    private int $size;

    public function __construct(int $page, int $size)
    {
        $this->page = $page;
        $this->size = $size;
    }

    /**
     * @return int|null
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int|null
     */
    public function getSize(): int
    {
        return $this->size;
    }

}
