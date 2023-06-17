<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Conversions;

use Harry\NowPayments\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetConversionsListRequest extends Request
{
    use UseJwtAuth;

    protected Method $method = Method::GET;

    /**
     * @param  null|int|int[]  $id
     * @param  null|string|string[]  $status
     */
    public function __construct(
        protected mixed $id = null,
        protected mixed $status = null,
        protected ?string $fromCurrency = null,
        protected ?string $toCurrency = null,
        protected ?string $createdAtFrom = null,
        protected ?string $createdAtTo = null,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?string $order = null,
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
