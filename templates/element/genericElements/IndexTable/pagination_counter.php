<p>
    <?php
    $this->Paginator->setTemplates([
        'counterRange' => __('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}'),
    ]);
    echo $this->Paginator->counter('range');
    ?>
</p>