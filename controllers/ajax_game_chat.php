<?php

(defined("EXEC") && (int)$_SESSION["id"] > 0) or die();

echo Page::construirePagePartielle('part_game_vuechat', $parse);
