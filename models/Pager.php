<?php

class Pager
{

    public $links = array();
    public $offset = 0;
    public $page_number = 1;
    public $start = 1;
    public $end = 1;

    function __construct($limit = 10, $extras = 1)
    {
        $page_number = filter_input(INPUT_POST, 'page', FILTER_VALIDATE_INT);
        $page_number = $page_number ?: 1;
    
        $this->end = $page_number + $extras;
        $this->start = $page_number - $extras;
    
        if($this->start < 1){
            $this->start = 1;
        }
        
        $this->offset = ($page_number - 1) * $limit;
        $this->page_number = $page_number;
    
        $current_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $first_link = preg_replace('/page=[0-9]+/', "page=1", $current_link);
        $next_link = preg_replace('/page=[0-9]+/', "page=" . ($page_number + 1), $current_link);
    
        $this->links['first'] = $first_link;
        $this->links['current'] = $current_link;
        $this->links['next'] = $next_link;
    }
    

    public function display()
    {
?>
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="<?= $this->links['first'] ?>">First</a>
                    </li>
                    <?php for($x = $this->start; $x <= $this->end; $x++): ?>
                    <li class="page-item <?= ($x== $this->page_number)?'active' :''; ?>">
                        <a class="page-link" href="<?= preg_replace('/page=[0-9]+/',"page".$x,$this->links['current']) ?>"><?= $x ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $this->links['next'] ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
<?php
    }
}
