<?php
namespace App\Org;

class Page
{

    public $total;
 // 总条数
    public $num;
 // 每页显示多少条
    public $page;
 // 当前页
    public $prev;
 // 上一页
    public $next;
 // 下一页
    public $first;
 // 首页
    public $last;
 // 尾页 = 总共多少页

    /**
     * 分页构造函数初始化
     *
     * @param int $total
     *            分页总条数
     * @param int $num
     *            每页显示多少条
     * @param int $page
     *            当前页
     */
    public function __construct(int $total, int $num = 10, int $page = 1)
    {
        $this->total = $total;
        $this->num = $num;
        $this->page = $page;
        $this->getFirstPage();
        $this->getLastPage();
        $this->getPrevPage();
        $this->getNextPage();
    }

    // 获取首页
    private function getFirstPage()
    {
        $this->first = 1;
    }

    // 获取尾页
    private function getLastPage()
    {
        $this->last = ceil($this->total / $this->num);
        if ($this->last == 0) {
            $this->last = 1;
        }
    }

    // 获取上一页
    private function getPrevPage()
    {
        if ($this->page == 1) {
            $this->prev = 1;
        } else {
            $this->prev = $this->page - 1;
        }
    }

    // 获取下一页
    private function getNextPage()
    {
        if ($this->page >= $this->last) {
            if ($this->last == 0) {
                $this->next = 1;
            } else {
                $this->next = $this->last;
            }
        } else {
            $this->next = $this->page + 1;
        }
    }
}