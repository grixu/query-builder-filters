<?php

$finder = PhpCsFixer\Finder::create()->
    exclude('build')->
    exclude('vendor')->
    in(__DIR__);

$config = new PhpCsFixer\Config();
return $config->setRules([
                             '@PSR12' => true,
                             '@PHP80Migration' => true,
                             'array_syntax' => ['syntax' => 'short'],
                             'no_trailing_comma_in_singleline_array' => true,
                             'no_whitespace_before_comma_in_array' => true,
                             'no_short_bool_cast' => true,
                             'no_alternative_syntax' => true,
                             'no_useless_else' => true,
                             'simplified_if_return' => true,
                             'no_unused_imports' => true,
                             'combine_consecutive_issets' => true,
                             'explicit_indirect_variable' => true,
                             'single_space_after_construct' => true,
                             'operator_linebreak' => [
                                 'position' => 'beginning',
                             ],
                             'no_extra_blank_lines' => true,
                             'standardize_not_equals' => true,
                         ])->
    setFinder($finder);
