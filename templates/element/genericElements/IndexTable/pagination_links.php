<?php
$this->Paginator->setTemplates([
    'nextActive' => '<li class="next page-item "><a rel="next" class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="next page-item disabled"><a href="" class="page-link" onclick="return false;">{{text}}</a></li>',
    'prevActive' => '<li class="prev page-item"><a rel="prev" class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="prev page-item disabled"><a href="" class="page-link" onclick="return false;">{{text}}</a></li>',
    'first' => '<li class="first page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'last' => '<li class="last page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
]);
echo sprintf(
    '<nav><ul class="pagination">%s%s%s</ul></nav>',
    $this->Paginator->prev(__('Previous')),
    $this->Paginator->numbers(['first' => 1, 'last' => 1]),
    $this->Paginator->next(__('Next'))
);
