<?php

declare(strict_types=1);

namespace App\Orchid\src\Layouts;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Collection;
use Orchid\Screen\Layout;
use Orchid\Screen\Repository;
use Orchid\Screen\TD;

/**
 * Class Table.
 */
abstract class Table extends Layout
{
    /**
     * @var string
     */
    protected $template = 'platform::layouts.table';

    /**
     * @var Repository
     */
    protected $query;

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target;

    /**
     * Table title.
     *
     * The string to be displayed on top of the table.
     *
     * @var string
     */
    protected $title;

    /**
     * @param Repository $repository
     *
     * @return Factory|\Illuminate\View\View
     */
    public function build(Repository $repository)
    {
        $this->query = $repository;

        if (!$this->isSee()) {
            return;
        }

        $columns = collect($this->columns())->filter(static fn (TD $column) => $column->isSee());

        $total = collect($this->total())->filter(static fn (TD $column) => $column->isSee());

        $rows = $repository->getContent($this->target);
        $rows = is_array($rows) ? collect($rows) : $rows;

        return view($this->template, [
            'repository'   => $repository,
            'rows'         => $rows,
            'columns'      => $columns,
            'total'        => $total,
            'iconNotFound' => $this->iconNotFound(),
            'textNotFound' => $this->textNotFound(),
            'subNotFound'  => $this->subNotFound(),
            'striped'      => $this->striped(),
            'compact'      => $this->compact(),
            'bordered'     => $this->bordered(),
            'hoverable'    => $this->hoverable(),
            'slug'         => $this->getSlug(),
            'onEachSide'   => $this->onEachSide(),
            'showHeader'   => $this->hasHeader($columns, $rows),
            'title'        => $this->title,
        ]);
    }

    /**
     * @param string|null $title
     *
     * @return Table
     */
    public function title(string $title = null): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    protected function iconNotFound(): string
    {
        return 'table';
    }

    /**
     * @return string
     */
    protected function textNotFound(): string
    {
        if (count(request()->query()) !== 0) {
            return __('No results found for your current filters');
        }

        return __('There are no objects currently displayed');
    }

    /**
     * @return string
     */
    protected function subNotFound(): string
    {
        if (count(request()->query()) !== 0) {
            return __('Try adjusting your filter settings or removing it altogether to see more data');
        }

        return __('Import or create objects, or check back later for updates');
    }

    /**
     * Usage for zebra-striping to any table row.
     *
     * @return bool
     */
    protected function striped(): bool
    {
        return false;
    }

    /**
     * Usage for compact display of table rows.
     *
     * @return bool
     */
    protected function compact(): bool
    {
        return false;
    }

    /**
     * Usage for borders on all sides of the table and cells.
     *
     * @return bool
     */
    protected function bordered(): bool
    {
        return false;
    }

    /**
     * Enable a hover state on table rows.
     *
     * @return bool
     */
    protected function hoverable(): bool
    {
        return false;
    }

    /**
     * The number of links to display on each side of current page link.
     *
     * @return int
     */
    protected function onEachSide(): int
    {
        return 3;
    }

    /**
     * @param \Illuminate\Support\Collection                                  $columns
     * @param \Illuminate\Support\Collection|\Illuminate\Pagination\Paginator $row
     *
     * @return bool
     */
    protected function hasHeader(Collection $columns, Collection|Paginator $row): bool
    {
        if ($columns->count() < 2) {
            return false;
        }

        return !empty(request()->query()) || $row->isNotEmpty();
    }

    /**
     * @return array
     */
    abstract protected function columns(): iterable;

    /**
     * @return array
     */
    protected function total(): array
    {
        return [];
    }
}