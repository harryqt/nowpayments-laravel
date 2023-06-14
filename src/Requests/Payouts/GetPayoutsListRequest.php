<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Payouts;

use Harry\NowPaymentsLaravel\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPayoutsListRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $id = null,
        protected ?string $status = null,
        protected ?string $orderBy = null,
        protected ?string $order = null,
        protected ?string $dateFrom = null,
        protected ?string $dateTo = null,
        protected ?int $limit = null,
        protected ?int $page = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/payout';
    }

    protected function defaultQuery(): array
    {
        $queries = [];

        $this->id ? $queries['id'] = $this->id : '';
        $this->status ? $queries['status'] = $this->status : '';
        $this->orderBy ? $queries['order_by'] = $this->orderBy : '';
        $this->order ? $queries['order'] = $this->order : '';
        $this->dateFrom ? $queries['date_from'] = $this->dateFrom : '';
        $this->dateTo ? $queries['date_to'] = $this->dateTo : '';
        $this->limit ? $queries['limit'] = $this->limit : '';
        $this->page ? $queries['page'] = $this->page : '';

        return $queries;
    }
}
