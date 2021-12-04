<?php
/**
 * @Paginator class limits number of articles per page
 */
class Paginator
{
    public $limit;
    public $offset;
    public $previous;
    public $next;
    /**
     * @param integer $page page number
     * @integer $records_per_page number of records per page
     * 
     * @return void
     */
    public function __construct($page,$records_per_page,$total_count)
    {
        $this->limit=$records_per_page;
        $page=filter_var($page, FILTER_VALIDATE_INT,[
            'options' => [
                'default' => 1,
                'min_range' => 1
            ]
        ]);

        $nextlimit=$total_count / $records_per_page;
            if($page>1){
                $this->previous=$page-1;
            }
            if($page< $nextlimit){
                $this->next=$page+1;
            }

        $this->offset=$records_per_page * ($page-1);
    }
}