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
$id = 'Photo-cards' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Photo-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$heading = get_field('heading') ?: 'Heading here...';
$heading_2 = get_field('heading_2') ?: 'Heading here...';
$text = get_field('text') ?: 'Text here...';
$text_2 = get_field('text_2') ?: 'Text here...';
$left_image = get_field('left_image');
$left_image_2 = get_field('left_image_2');
$right_image = get_field('right_image');
$right_image_2 = get_field('right_image_2');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="py-12">
        <div class="md:container md:mx-auto">

            <div class="mt-20">

                <!-- left column -->

                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-7 md:gap-y-10">
                    <div class="relative">
                        <div class="w-full shadow-lg mb-4">
                            <figure>
                            <img class="object-center object-cover" src="<?php echo $left_image; ?>" alt="photo">
</figure>
                        </div>
                        <div class="w-full shadow-lg">
                            <figure>
                            <img class="object-center object-cover w-full h-full" src="<?php echo $left_image_2; ?>" alt="photo">
</figure>
                        </div>
                        <div>
                            <h3 class="pt-1 mt-8 mr-44 ml-2 text-3xl leading-6 font-semibold text-gray-900 text-left md:text-left"><?php echo $heading_2; ?></h3>
                        </div>
                        <div class="mt-7 ml-2 mb-2 text-xs text-black text-left md:text-left">
                        <?php if ($text_2) : ?>
                            <?php echo $text_2; ?>
                        <?php endif?>
                        </div>
                    </div>

                <!-- left column end -->

                <!-- right column -->

                    <div class="relative">
                        <div class="mt-1 ml-2 mb-6 text-xs text-black text-center md:text-left">
                            <div class="invisible md:visible mt-1 ml-2 mb-6 text-xs text-black text-left md:text-left">
                            <?php echo $text; ?>
                            </div>
                        </div>
                        <div>
                            <h3 class="invisible md:visible pt-1 mt-2 mb-8 mr-44 ml-2 text-3xl leading-6 font-black text-gray-900 text-left md:text-left"><?php echo $heading; ?></h3>
                        </div>

                        <div class="w-full shadow-lg mb-4">
                        <figure>
                            <img class="object-center object-cover w-full h-full" src="<?php echo $right_image; ?>" alt="photo">
                            </figure>
                        </div>

                        <div class="w-full shadow-lg">
                        <figure>
                            <img class="object-center object-cover w-full h-full" src="<?php echo $right_image_2; ?>" alt="photo">
</figure>
                        </div>

                    <!-- right column end -->

                    <!-- Mobile version for Left column -->

                        <div>
                            <h3 class="visible md:invisible pt-1 mt-2 mb-8 mr-44 ml-2 text-3xl leading-6 font-black text-gray-900 text-left md:text-left"><?php echo $heading; ?></h3>
                        </div>

                        <div class="mt-1 ml-2 mb-6 text-xs text-black text-center md:text-left">
                            <div class="visible md:invisible mt-1 ml-2 mb-6 text-xs text-black text-left md:text-left">
                            <?php echo $text; ?>
                            </div>
                        </div>
                    </div>

                    <!-- left column end -->
                </div>
            </div>
        </div>
    </div>