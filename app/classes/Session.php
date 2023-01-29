<?php
class Session
{
    static public function set($type, $message)
    {
        ob_start();
        // tout votre code ...

        if (!headers_sent()) {
            setcookie($type, $message, time() + 5, "/");
        }

        ob_end_flush();
    }
}
