<?php
namespace App\Core;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\Common\Annotations\AnnotationReader;

/**
 * Custom complier pass to ignore all Swagger annotations as these never do not need to be processed by the framework
 *
 * @author Brian Slezak <brian@theslezaks.com>
 *
 */
class IgnoreSwaggerCompilerPass implements CompilerPassInterface
{

    /**
     * Process this complier pass
     *
     * {@inheritdoc}
     * @see \Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface::process()
     */
    public function process(ContainerBuilder $container)
    {
        // Ignore all Swagger Annotations
        AnnotationReader::addGlobalIgnoredName('SWG\AbstractAnnotation');
        AnnotationReader::addGlobalIgnoredName('SWG\Contact');
        AnnotationReader::addGlobalIgnoredName('SWG\Definition');
        AnnotationReader::addGlobalIgnoredName('SWG\Delete');
        AnnotationReader::addGlobalIgnoredName('SWG\ExternalDocumentation');
        AnnotationReader::addGlobalIgnoredName('SWG\Get');
        AnnotationReader::addGlobalIgnoredName('SWG\Head');
        AnnotationReader::addGlobalIgnoredName('SWG\Header');
        AnnotationReader::addGlobalIgnoredName('SWG\Info');
        AnnotationReader::addGlobalIgnoredName('SWG\Items');
        AnnotationReader::addGlobalIgnoredName('SWG\License');
        AnnotationReader::addGlobalIgnoredName('SWG\Operation');
        AnnotationReader::addGlobalIgnoredName('SWG\Options');
        AnnotationReader::addGlobalIgnoredName('SWG\Parameter');
        AnnotationReader::addGlobalIgnoredName('SWG\Patch');
        AnnotationReader::addGlobalIgnoredName('SWG\Post');
        AnnotationReader::addGlobalIgnoredName('SWG\Property');
        AnnotationReader::addGlobalIgnoredName('SWG\Put');
        AnnotationReader::addGlobalIgnoredName('SWG\Response');
        AnnotationReader::addGlobalIgnoredName('SWG\Schema');
        AnnotationReader::addGlobalIgnoredName('SWG\SecurityScheme');
        AnnotationReader::addGlobalIgnoredName('SWG\Swagger');
        AnnotationReader::addGlobalIgnoredName('SWG\Tag');
        AnnotationReader::addGlobalIgnoredName('SWG\Xml');
    }
}
