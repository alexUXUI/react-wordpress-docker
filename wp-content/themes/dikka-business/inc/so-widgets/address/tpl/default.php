<div id="address" class="widget widget_address">
    <?php if( ! empty( $instance['title'] ) ): ?>
    	<h2 class="widget-title"><?php echo esc_html( $instance['title'] ); ?></h2>
	<?php endif; ?>

    <ul class="address-block">
    	<?php if ( ! empty( $instance['location'] ) ) : ?>
        	<li><i class="fa fa-map-marker"></i><?php echo esc_html( $instance['location'] ); ?></li>
        <?php endif; ?>

        <?php if ( ! empty( $instance['phone'] ) ) : ?>
        	<li><a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><i class="fa fa-phone"></i><?php echo esc_html( $instance['phone'] ); ?></a></li>
        <?php endif; ?>

        <?php if ( ! empty( $instance['email'] ) ) : ?>
        	<li><a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><i class="fa fa-envelope"></i><?php echo esc_html( $instance['email'] ); ?></a></li>
        <?php endif; ?>
    </ul>
</div><!-- #address -->