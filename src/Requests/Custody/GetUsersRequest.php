<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Custody;

use Harry\NowPayments\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUsersRequest extends Request
{
    use UseJwtAuth;

    protected Method $method = Method::GET;

    /**
     * @param  null|int|int[]  $id
     */
    public function __construct(
        protected mixed $id = null,
        protected ?int $offset = null,
        protected ?int $limit = null,
        protected ?int $order = null,
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
