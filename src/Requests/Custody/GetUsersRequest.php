<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Custody;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUsersRequest extends Request
{
    use UseJwtAuth;

    protected Method $method = Method::GET;

    /**
     * @param  int[]  $id
     */
    public function __construct(
        protected int|array $id = null,
        protected int $offset = null,
        protected int $limit = null,
        protected int $order = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner';
    }

    protected function defaultQuery(): array
    {
        $queries = [];

        $this->id ? $queries['id'] = $this->id : '';
        $this->offset ? $queries['offset'] = $this->offset : '';
        $this->limit ? $queries['limit'] = $this->limit : '';
        $this->order ? $queries['order'] = $this->order : '';

        return $queries;
    }
}
