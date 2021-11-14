<?php

namespace TotalCRM\MicrosoftGraph\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package TotalCRM\MicrosoftGraph\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {

        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('microsoft_graph');
        $rootNode
            ->children()
            ->scalarNode('client_id')->end()
            ->scalarNode('client_secret')->end()
            ->scalarNode('redirect_uri')->end()
            ->scalarNode('home_page')->end()
            ->scalarNode('prefer_time_zone')->end()
            ->scalarNode('version')->end()
            ->scalarNode('storage_manager')->end()
            ->scalarNode('stateless')->end()
            ->variableNode('scopes')->end()
            ->end()
            ->end();
        return $treeBuilder;
    }
}
