<?php
declare(strict_types=1);

namespace Supabase\Client\Interfaces;

use Supabase\Client\Interfaces;

require_once(__dir__.'/ThrowableInterface.php');

interface HttpExceptionInterface extends ThrowableInterface {
    public function getStatusCode(): int;
    public function getReasonPhrase(): string;
}
