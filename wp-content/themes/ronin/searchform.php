<form action="<?php print esc_url( home_url( '/' ) );?>" method="get">
    <div class="input-group">
        <input placeholder="Search Posts" type="text" name="s" class="form-control" id="search" value="<?php the_search_query(); ?>" />
        <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
        </span>
    </div>
</form>