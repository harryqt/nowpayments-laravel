<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Custody;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllTransfersRequest extends Request
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
        protected ?int $offset = null,
        protected ?int $limit = null,
        protected ?int $order = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/transfers';
    }

    protected function defaultQuery(): array
    {
        $queries = [];

        $this->id ? $queries['id'] = $this->id : '';
        $this->status ? $queries['status'] = $this->status : '';
        $this->offset ? $queries['offset'] = $this->offset : '';
        $this->limit ? $queries['limit'] = $this->limit : '';
        $this->order ? $queries['order'] = $this->order : '';

        return $queries;
    }
}
