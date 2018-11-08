<form action="<?php echo home_url('/'); ?>" role="search" method="get">
    <input type="search" class="form-control" placeholder="Search" value="<?php // echo get_search_query() ?>" name="s" title="Search" autocomplete="off"></input>
    <input class="concept-header__project-category__search__icon" type='submit'></input>
    <div class="concept-header__project-category__search__ghost"></div>
</form>