<div id="call-to-action" class="relative">
    <div class="overlay"></div>
    <div class="container">
        <?php if ( ! empty( $instance['description'] ) ) : ?>
            <p class="entry-description">
                <?php echo esc_attr( $instance['description'] ); ?>
            </p>
        <?php endif; ?>

        <?php if ( ! empty( $instance['title'] ) ) : ?>
            <header class="entry-header">
    			<h2 class="entry-title">
    				<?php echo esc_attr( $instance['title'] ); ?>
    			</h2>
            </header>
        <?php endif; ?>

        <div class="buttons">
            <?php if( !empty($instance['buttonOne_title']) ): ?>
                <?php if( !empty( $instance['buttonOne_url'] ) ) echo '<a href="' . sow_esc_url( $instance['buttonOne_url'] ) . '" class="btn btn-primary">'; ?>
                <?php echo esc_attr( $instance['buttonOne_title'] ) ?>
                <?php if( !empty( $instance['buttonOne_url'] ) ) echo '</a>'; ?>
            <?php endif; ?>
        </div><!-- .buttons -->
    </div><!--.container -->
</div><!-- #call-to-action -->