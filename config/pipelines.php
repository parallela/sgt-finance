<?php

return [
    /**
     * Pipelines the scrapped response will go through
     * before the saving action
     */
    'store_by_response' => [
        \App\Pipelines\ResponseTranslatorPipeline::class,
        \App\Pipelines\StoreIndexesPipeline::class
    ]
];
