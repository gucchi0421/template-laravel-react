<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__ . '/app')
    ->in(__DIR__ . '/database')
    ->in(__DIR__ . '/routes')
    ->name('*.php')
    ->notName('*.blade.php');

return (new Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12'                       => true,
        'declare_strict_types'         => true,
        'array_syntax'                 => ['syntax' => 'short'],
        'no_unused_imports'            => true,
        'single_quote'                 => true,
        'ordered_imports'              => ['sort_algorithm' => 'alpha'],
        'binary_operator_spaces'       => [
            'default'   => 'single_space',
            'operators' => ['=>' => 'align'],
        ],
    ])
    ->setFinder($finder);
