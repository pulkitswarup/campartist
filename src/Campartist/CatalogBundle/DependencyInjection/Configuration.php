<?php

namespace Campartist\CatalogBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('campartist_catalog');

        $rootNode
        ->children()
            ->arrayNode('providers')
                ->children()
                    ->arrayNode('Lastfm')
                        ->children()
                            ->scalarNode('api_key')->end()
                            ->arrayNode('geo')
                                ->children()
                                    ->arrayNode('topartists')
                                        ->children()
                                            ->arrayNode('url')
                                                ->children()
                                                    ->scalarNode('json')->end()
                                                ->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('artists')
                                ->children()
                                    ->arrayNode('toptracks')
                                        ->children()
                                            ->arrayNode('url')
                                                ->children()
                                                    ->scalarNode('json')->end()
                                                ->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end()
        ;
        return $treeBuilder;
    }
}