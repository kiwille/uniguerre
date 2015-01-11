<?php

class ChatDAO {
    
    /**
     * Retourne la liste des langues du jeu
     * 
     * @return Langues
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

?>
