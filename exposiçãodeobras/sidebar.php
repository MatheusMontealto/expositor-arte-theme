<?php get_search_form() ?>
</br>
</br>
<h3>Técnicas</h3>
<ul class="list-group">
    <?php
        $categories = get_categories();
        foreach($categories as $category):
            printf('<li class="list-group-item"><a href="%s" title="%s">%s</a></li>',
                get_category_link($category->term_id),
                sprintf("Ver post de %s", $category->name),
                $category->name);
        endforeach;
    ?>
</ul>
<br/>
