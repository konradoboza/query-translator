<?php

namespace QueryTranslator\Languages\Galach\Generators\Native;

use LogicException;
use QueryTranslator\Languages\Galach\Generators\Common\Visitor;
use QueryTranslator\Languages\Galach\Values\Node\Term;
use QueryTranslator\Languages\Galach\Values\Token\User as UserToken;
use QueryTranslator\Values\Node;

/**
 * User Node Visitor implementation.
 */
final class User extends Visitor
{
    public function accept(Node $node)
    {
        return $node instanceof Term && $node->token instanceof UserToken;
    }

    public function visit(Node $node, Visitor $subVisitor = null)
    {
        if (!$node instanceof Term) {
            throw new LogicException(
                'Implementation accepts instance of Term Node'
            );
        }

        $token = $node->token;

        if (!$token instanceof UserToken) {
            throw new LogicException(
                'Implementation accepts instance of User Token'
            );
        }

        return "{$token->marker}{$token->user}";
    }
}
