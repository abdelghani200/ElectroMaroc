<?php

namespace App\Models;

class Pager extends Model
{
    public $links = array();
    public $offset = 0;

    public function __construct($limit = 10)
    {

        $page_number = isset($_GET['page']) ? (int)$_GET['page']: 1;
        $page_number = $page_number < 1 ? 1:$page_number;
        $this->offset = ($page_number - 1) * $limit;
        
        echo "hhhhh"; 
    }

    public function display()
    {
        ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        <?php
    }
}
