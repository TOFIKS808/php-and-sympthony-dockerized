<?php

declare(strict_types=1);

use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\AssignmentInConditionSniff;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use Symplify\CodingStandard\Fixer\Strict\BlankLineAfterStrictTypesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff;
use PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([__DIR__ . '/src', __DIR__ . '/tests',]);
    $ecsConfig->skip([
        __DIR__  . '/tests/Unit/Routines',
        __DIR__  . '/src/AppInterface.php',
    ]);

    $ecsConfig->rules([
        BlankLineAfterStrictTypesFixer::class,
        DeclareStrictTypesFixer::class,
        AssignmentInConditionSniff::class,
    ]);

    $ecsConfig->sets([
        SetList::SPACES,
        SetList::ARRAY,
        SetList::DOCBLOCK,
        SetList::PSR_12,
        SetList::STRICT,
        SetList::PHPUNIT,
        SetList::NAMESPACES,
        SetList::CONTROL_STRUCTURES,
        SetList::COMMENTS,
        SetList::CLEAN_CODE,
        SetList::COMMON,
        SetList::DOCTRINE_ANNOTATIONS,
        SetList::SYMPLIFY
    ]);

    $ecsConfig->ruleWithConfiguration(ClassDefinitionFixer::class, ['single_line' => false]);
    $ecsConfig->ruleWithConfiguration(LineLengthSniff::class, ['absoluteLineLimit' => 120]);

    $ecsConfig->parallel();
};
