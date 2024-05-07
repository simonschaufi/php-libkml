<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Privatization\Rector\ClassMethod\PrivatizeFinalClassMethodRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddMethodCallBasedStrictParamTypeRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddParamTypeFromPropertyTypeRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNativeCallRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictSetUpRector;
use Rector\TypeDeclaration\Rector\StmtsAwareInterface\DeclareStrictTypesRector;
use Rector\ValueObject\PhpVersion;

return static function (RectorConfig $rectorConfig) {
    $rectorConfig->paths([
        __DIR__ . '/../../src',
        __DIR__ . '/../../tests',
    ]);
    $rectorConfig->phpVersion(PhpVersion::PHP_74);
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_74,
    ]);
    $rectorConfig->rules([
        // Privatization
        PrivatizeFinalClassMethodRector::class,

        // TypeDeclaration
        AddMethodCallBasedStrictParamTypeRector::class,
        AddParamTypeFromPropertyTypeRector::class,
        AddVoidReturnTypeWhereNoReturnRector::class,
        ReturnTypeFromStrictNativeCallRector::class,
        ReturnTypeFromStrictScalarReturnExprRector::class,
        ReturnTypeFromStrictTypedPropertyRector::class,

        TypedPropertyFromAssignsRector::class,
        TypedPropertyFromStrictConstructorRector::class,
        TypedPropertyFromStrictSetUpRector::class,

        DeclareStrictTypesRector::class,
    ]);
    $rectorConfig->ruleWithConfiguration(AddParamTypeDeclarationRector::class, []);
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses(false);
};
