<?php

use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\Psr6CacheStorage;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use Phparch\SpaceTraders;
use Phparch\SpaceTraders\Routes;
use Phparch\SpaceTraders\ServiceContainer;
use Phparch\SpaceTraders\TwigExtensions;
use Symfony\Component\Cache\Adapter\RedisAdapter;

/** Sample config for your dependency injection container */
return [
    Predis\Client::class => static function () {
        return new Predis\Client($_ENV['REDIS_URI']);
    },
    GuzzleHttp\Client::class => static function () {
        $adapter = new RedisAdapter(
            redis: ServiceContainer::get(Predis\Client::class),
            namespace: '',
            defaultLifetime: $_ENV['REDIS_CACHE_TTL'] ?? 900,
        );

        $strategy = new GreedyCacheStrategy(
            new Psr6CacheStorage($adapter),
            $_ENV['GUZZLE_REQUEST_CACHE_TTL'] ?? 900,
        );
        $stack = GuzzleHttp\HandlerStack::create();
        $stack->push(new CacheMiddleware($strategy), 'cache');
        return new GuzzleHttp\Client(['handler' => $stack]);
    },
];