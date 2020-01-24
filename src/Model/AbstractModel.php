<?php

/*
 * Disclaimer: This source code is protected by copyright law and by
 * international conventions.
 *
 * Any reproduction or partial or total distribution of the source code, by any
 * means whatsoever, is strictly forbidden.
 *
 * Anyone not complying with these provisions will be guilty of the offense of
 * infringement and the penal sanctions provided for by law.
 *
 * (c) 2019 All rights reserved.
 */

namespace WBW\Library\XMLTV\Model;

use JsonSerializable;

/**
 * Abstract model.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\XMLTV\Model
 * @abstract
 */
abstract class AbstractModel implements JsonSerializable {

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Serialize an array.
     *
     * @param AbstractModel[] $models The models.
     * @return array Returns the serialized array.
     */
    public static function serializeArray(array $models) {

        $output = [];

        foreach ($models as $current) {
            $output[] = static::serializeModel($current);
        }

        return $output;
    }

    /**
     * Serialize a model.
     *
     * @param AbstractModel|null $model The model.
     * @return array Returns the serialized model.
     */
    public static function serializeModel(AbstractModel $model = null) {

        if (null === $model) {
            return null;
        }

        return $model->jsonSerialize();
    }
}
