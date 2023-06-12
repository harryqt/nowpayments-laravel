<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Payments;

use Harry\NowPaymentsLaravel\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPaymentsListRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $limit = null,
        protected ?int $page = null,
        protected ?int $invoiceId = null,
        protected ?string $sortBy = null,
        protected ?string $orderBy = null,
        protected ?int $dateFrom = null,
        protected ?int $dateTo = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/payment';
    }

    protected function defaultQuery(): array
    {
        $queries = [];

        $this->limit ? $queries['limit'] = $this->limit : '';
        $this->page ? $queries['page'] = $this->page : '';
        $this->invoiceId ? $queries['invoiceId'] = $this->invoiceId : '';
        $this->sortBy ? $queries['sortBy'] = $this->sortBy : '';
        $this->orderBy ? $queries['orderBy'] = $this->orderBy : '';
        $this->dateFrom ? $queries['dateFrom'] = $this->dateFrom : '';
        $this->dateTo ? $queries['dateTo'] = $this->dateTo : '';

        return $queries;
    }
}
