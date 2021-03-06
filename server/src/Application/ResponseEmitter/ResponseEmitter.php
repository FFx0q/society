<?php
    namespace Society\Application\ResponseEmitter;

    use Slim\ResponseEmitter as SlimResponseEmitter;
    use Psr\Http\Message\ResponseInterface;

    class ResponseEmitter extends SlimResponseEmitter
    {
        public function emit(ResponseInterface $response): void
        {
            $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
            $response  = $response
                ->withHeader('Access-Control-Allow-Credentials', 'true')
                ->withHeader('Access-Control-Allow-Origin', $origin)
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
                ->withHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->withAddedHeader('Cache-Control', 'post-check=0, pre-check=0')
                ->withHeader('Pragma', 'no-cache');

            if (ob_get_clean()) {
                ob_clean();
            }

            parent::emit($response);
        }
    }
