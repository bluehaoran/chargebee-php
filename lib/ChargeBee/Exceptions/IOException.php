<?php

namespace ChargeBee\ChargeBee\Exceptions;

use ChargeBee\ChargeBee\Exceptions\APIError;

use Exception;

class IOException extends Exception {

    private $errorNo;

    public function __construct($message, $errorNo) {
        parent::__construct($message);

        $this->errorNo = $errorNo;
    }

    /**
     * @return mixed
     *
     * @deprecated
     */
    public function getCurlErrorCode() {
        trigger_error('Use ' . IOException::class . '::getErrorCode() instead', E_USER_DEPRECATED);
        return $this->getErrorCode();
    }

    public function getErrorCode() {
        return $this->errorNo;
    }
}
