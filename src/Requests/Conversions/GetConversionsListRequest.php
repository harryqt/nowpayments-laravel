<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Conversions;

use App\Http\Integrations\NowPayments\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetConversionsListRequest extends Request
{
    use UseJwtAuth;

    protected Method $method = Method::GET;

    /**
     * @param  int[]  $id
     * @param  string[]  $status
     */
    public function __construct(
        protected int|array $id,
        protected string|array $status,
        protected string $fromCurrency,
        protected string $toCurrency,
        protected \DateTime $createdAtFrom,
        protected \DateTime $createdAtTo,
        protected int $limit,
        protected int $offset,
        protected string $order,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/conversion';
    }

    protected function defaultQuery(): array
    {
        $queries = [];

        $this->id ? $queries['id'] = $this->id : '';
        $this->status ? $queries['status'] = $this->status : '';
        $this->fromCurrency ? $queries['from_currency'] = $this->fromCurrency : '';
        $this->toCurrency ? $queries['to_currency'] = $this->toCurrency : '';
        $this->createdAtFrom ? $queries['created_at_from'] = $this->createdAtFrom : '';
        $this->createdAtTo ? $queries['created_at_to'] = $this->createdAtTo : '';
        $this->limit ? $queries['limit'] = $this->limit : '';
        $this->offset ? $queries['offset'] = $this->offset : '';
        $this->order ? $queries['order'] = $this->order : '';

        return $queries;
    }
}
