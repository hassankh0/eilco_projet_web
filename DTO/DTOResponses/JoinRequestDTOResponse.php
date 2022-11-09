<?php


class JoinRequestDTOResponse
{
    private $status;

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}