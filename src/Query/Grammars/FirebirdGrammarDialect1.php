<?php

namespace onezerotrash\Firebird\Query\Grammars;

class FirebirdGrammarDialect1 extends FirebirdGrammarDialect3
{
    /**
     * Wrap a single string in keyword identifiers.
     *
     * @param  string  $value
     * @return string
     */
    protected function wrapValue($value)
    {
        // Dialect 1 not support keyword identifiers
        // so we must return unwrapped value.
        return $value;
    }
}
