<?php

namespace Diffy;

class Feedback
{
    const RATINGS = ['useful', 'ok', 'not_useful'];

    /**
     * Send feedback on a comparison (diff) to Diffy support.
     *
     * @param int $diffId
     * @param string $rating One of Feedback::RATINGS.
     * @param string $comment
     * @param string $source Client identifier, e.g. "claude-code/compare-urls".
     * @param string $clientVersion
     *
     * @return mixed
     *
     * @throws InvalidArgumentsException
     */
    public static function create(int $diffId, string $rating, string $comment = '', string $source = '', string $clientVersion = '')
    {
        if (empty($diffId)) {
            throw new InvalidArgumentsException('Diff ID can not be empty');
        }

        if (!in_array($rating, self::RATINGS, true)) {
            throw new InvalidArgumentsException('Rating must be one of: ' . implode(', ', self::RATINGS));
        }

        return Diffy::request('POST', 'feedback', [
            'diffId' => $diffId,
            'rating' => $rating,
            'comment' => $comment,
            'source' => $source,
            'clientVersion' => $clientVersion,
        ]);
    }
}
