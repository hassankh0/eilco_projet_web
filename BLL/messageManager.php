<?php

require_once '../../DAL/messageRepository.php';

function sendMessage($message) {
    return insertMessageQuer($message);
}
function getMessages(){
    return getAllMessages();
        
}

function getMessageById($id){
    return getMessage($id);
        
}

function deleteMessage($MessageReq){
   return deletemessageQuer($MessageReq);
}
