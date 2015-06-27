<?php

class ChatDAO {
    
    /**
     * Retourne tous les messages du chat 
     * 
     * @return Chat
     * @throws Exception
     */
    public static function selectChat() {
        try {
            $SQLSelectChat = new SQLSelectChat();
            return $SQLSelectChat->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
