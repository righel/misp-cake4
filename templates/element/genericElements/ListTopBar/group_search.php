<?php
/*
     *  Run a quick filter against the current API endpoint
     *  Result is passed via URL parameters, by default using the searchall key
     *  Valid parameters:
     *  - data: data-* fields
     *  - searchKey: data-search-key, specifying the key to be used (defaults to searchall)
     *  - fa-icon: an icon to use for the lookup $button
     *  - buttong: Text to use for the lookup button
     *  - cancel: Button for quickly removing the filters
     *  - placeholder: optional placeholder for the text field
     *  - id: element ID for the input field - defaults to quickFilterField
     */
if (!isset($data['requirement']) || $data['requirement']) {
    $searchKey = empty($data['searchKey']) ? 'searchall' : $data['searchKey'];
    // Set default value to current search term
    if (empty($data['value']) && !empty($this->request->getQuery($searchKey))) {
        $data['value'] = $this->request->getQuery($searchKey);
    }
    $button = empty($data['button']) && empty($data['fa-icon']) ? '' : sprintf(
        '<button class="btn btn-small btn-dark" %s id="quickFilterButton">%s%s</button>',
        empty($data['data']) ? '' : h($data['data']),
        empty($data['fa-icon']) ? '' : sprintf('<i class="fa fa-%s" title="%s"></i>', h($data['fa-icon']), __('Search')),
        empty($data['button']) ? '' : h($data['button'])
    );
    if (!empty($data['cancel'])) {
        $button .= $this->element('/genericElements/ListTopBar/element_simple', array('data' => $data['cancel']));
    }
    $input = sprintf(
        '<input type="text" class="span3 input-group-text" placeholder="%s" aria-label="%s" id="%s" data-searchkey="%s" value="%s">',
        empty($data['placeholder']) ? '' : h($data['placeholder']),
        empty($data['placeholder']) ? '' : h($data['placeholder']),
        empty($data['id']) ? 'quickFilterField' : h($data['id']),
        h($searchKey),
        empty($data['value']) ? '' : h($data['value'])
    );
    echo sprintf(
        '<div class="btn-toolbar ms-auto mb-2 mb-lg-0"><div class="input-group-append">%s</div>%s</div>',
        $input,
        $button
    );
}
