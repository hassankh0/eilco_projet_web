<?php

require_once '../../../DAL/joinRequestRepository.php';

function sendRequest($request) {
    return insertRequest($request);
}