<?php
class Redirect
{
    static public function to($page)
    {
        ob_start();
        // tout votre code ...

        if (!headers_sent()) {
            header('location:' . $page);
        }

        ob_end_flush();
    }
}
