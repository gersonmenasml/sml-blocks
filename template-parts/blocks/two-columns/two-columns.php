<?php

/**
 * Two columns Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'two-columns' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Two columns of text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$text = get_field('text') ?: 'Text here...';
$title = get_field('title') ?: 'Text here...';
$subtitle = get_field('subtitle') ?: 'Text here...';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="py-0 md:py-12 mb-24 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mt-12">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-7 md:gap-y-10">
                    <div class="relative">
                        <div>
                        <?php if ($title) : ?>
                            <h3 class="pt-1 mt-40 mr-0 lg:mr-44 text-3xl leading-6 font-semibold text-gray-900 text-left md:text-center"><?php echo $title; ?></h3>
                            <?php endif;?>
                        </div>
                        <div class="mt-8 mr-0 lg:mr-44 text-xs text-black text-left md:text-center">
                        <?php echo $subtitle; ?>
                        </div>
                    </div>

                    <div class="relative">

                        <div class="visible md:visible mt-6 mr-0 lg:mr-44 text-xs text-black text-left md:text-center">
                            <InnerBlocks />
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>