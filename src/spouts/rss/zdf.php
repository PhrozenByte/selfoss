<?php

declare(strict_types=1);

namespace spouts\rss;

/**
 * Plugin for fetching media from the ZDF Mediathek
 *
 * @copyright  Copyright (c) Daniel Rudolf
 * @license    GPLv3 (http://www.gnu.org/licenses/gpl-3.0.html)
 * @author     Daniel Rudolf <https://daniel-rudolf.de/>
 */
class zdf extends feed {
    public string $name = 'ZDF Mediathek';

    public string $description = 'This feed fetches media items from the ZDF Mediathek.';

    /**
     * @return \Generator<\spouts\Item<\SimplePie\Item>> list of items
     */
    public function getItems(): iterable {
        $now = time();
        foreach (parent::getItems() as $item) {
            // remove future items
            $date = $item->getDate();
            if (($date === null) || ($date->getTimestamp() <= $now)) {
                yield $item;
            }
        }
    }
}
