<?php
declare(strict_types=1);

use Arkitect\ClassSet;
use Arkitect\CLI\Config;
use Arkitect\Expression\ForClasses\DependsOnlyOnTheseNamespaces;
use Arkitect\Expression\ForClasses\HaveNameMatching;
use Arkitect\Expression\ForClasses\IsA;
use Arkitect\Expression\ForClasses\IsInterface;
use Arkitect\Expression\ForClasses\IsTrait;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\Rule;

return static function (Config $config): void {
    $classSet = ClassSet::fromDir(__DIR__.'/src');

    $rules = [];

    /* API Client Rules */
    $rules[] = Rule::allClasses()
        ->that(new ResideInOneOfTheseNamespaces('Phparch\SpaceTradersRest\Client'))
        ->should(new IsA('Phparch\SpaceTradersRest\Client'))
        ->because('we want to ensure clients behave consistently.');

    /* Traits Rules */
    $rules[] = Rule::allClasses()
        ->that(new ResideInOneOfTheseNamespaces('Phparch\SpaceTradersRest\Trait'))
        ->should(new IsTrait())
        ->because('we want to be sure that there are only traits in a specific namespace');

    /* Value Object Rules */
    $rules[] = Rule::allClasses()
        ->that(new ResideInOneOfTheseNamespaces('Phparch\SpaceTradersRest\Value'))
        ->should(new DependsOnlyOnTheseNamespaces(['Phparch\SpaceTradersRest\Value'], []))
        ->because('we want to protect our domain from external dependencies except for Ramsey\Uuid');


    $config->add($classSet, ...$rules);
};