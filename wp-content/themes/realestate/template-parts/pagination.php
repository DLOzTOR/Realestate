<div class="col-md-12">
    <div class="pull-right">
        <div class="pagination">
            <?php
            the_posts_pagination(
                array(
                    'prev_text' => 'Prev',
                    'next_text' => 'Next',
                    'type' => 'list',
                )
            )
            ?>
        </div>
    </div>
</div>