<?php  
    $allArticleTaxonomies = \App\Models\Taxonomy::where('type', 'article')->get();
?>
@if (count($allArticleTaxonomies) > 0)
<div class="search_bottom_left">
    <ul>
    @foreach($allArticleTaxonomies as $item)
        <li>
            <a href="/static/{{ $item['slug'] }}" class="{{ (isset($active) && $active == $item['slug']) ? 'active' : '' }}">{{ $item['tax_name'] }}</a>
        </li>
    @endforeach
    </ul>
</div>
@endif