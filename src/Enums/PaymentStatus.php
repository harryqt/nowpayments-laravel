<?php

declare(strict_types=1);

namespace Harry\NowPayments\Enums;

enum PaymentStatus: string
{
    case WAITING = 'waiting';
    case CONFIRMING = 'confirming';
    case CONFIRMED = 'confirmed';
    case SENDING = 'sending';
    case PARTIALLY_PAID = 'partially_paid';
    case FINISHED = 'finished';
    case FAILED = 'failed';
    case REFUNDED = 'refunded';
    case EXPIRED = 'expired';
}
