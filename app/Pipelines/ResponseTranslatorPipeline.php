<?php

namespace App\Pipelines;

use App\Http\Translators\SerpIndexResponseTranslator;
use Closure;

class ResponseTranslatorPipeline
{
    public function handle(array $response, Closure $next)
    {
        // Translate the response to response suitable for us
        return $next(SerpIndexResponseTranslator::translate($response));
    }
}
